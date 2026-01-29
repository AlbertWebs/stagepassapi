<?php

namespace App\Console\Commands;

use App\Models\InstagramMedia;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FetchInstagramMedia extends Command
{
    protected $signature = 'instagram:fetch-media {--limit=50}';
    protected $description = 'Fetch Instagram media and store it in the database.';

    public function handle(): int
    {
        $accessToken = config('services.instagram.access_token')
            ?: DB::table('site_settings')->where('key', 'instagram_access_token')->value('value');
        if (!$accessToken) {
            $this->error('Instagram access token is not configured.');
            return self::FAILURE;
        }

        $limit = (int) $this->option('limit');
        if ($limit < 1) {
            $limit = 50;
        }
        if ($limit > 50) {
            $limit = 50;
        }

        $response = Http::get('https://graph.instagram.com/me/media', [
            'fields' => 'id,caption,media_type,media_url,thumbnail_url,permalink,timestamp',
            'access_token' => $accessToken,
            'limit' => $limit,
        ]);

        if ($response->failed()) {
            Log::warning('Instagram fetch failed.', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);
            $this->error('Failed to fetch Instagram media.');
            return self::FAILURE;
        }

        $items = $response->json('data') ?? [];
        $now = now();

        $payload = array_map(function (array $item) use ($now) {
            return [
                'instagram_id' => $item['id'] ?? null,
                'media_type' => $item['media_type'] ?? 'IMAGE',
                'media_url' => $item['media_url'] ?? '',
                'thumbnail_url' => $item['thumbnail_url'] ?? null,
                'permalink' => $item['permalink'] ?? null,
                'caption' => $item['caption'] ?? null,
                'posted_at' => isset($item['timestamp']) ? Carbon::parse($item['timestamp']) : null,
                'fetched_at' => $now,
                'raw_payload' => $item,
                'updated_at' => $now,
                'created_at' => $now,
            ];
        }, $items);

        $payload = array_filter($payload, fn ($row) => !empty($row['instagram_id']));

        InstagramMedia::upsert(
            $payload,
            ['instagram_id'],
            [
                'media_type',
                'media_url',
                'thumbnail_url',
                'permalink',
                'caption',
                'posted_at',
                'fetched_at',
                'raw_payload',
                'updated_at',
            ]
        );

        $this->info('Instagram media fetched: ' . count($payload));
        return self::SUCCESS;
    }
}
