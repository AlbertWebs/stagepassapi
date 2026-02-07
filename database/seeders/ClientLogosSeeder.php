<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientLogosSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Clear existing records
        DB::table('client_logos')->delete();

        $records = [
            [
                'clients_section_id' => 1,
                'logo_path' => 'https://api.stagepass.co.ke/storage/admin/client_logos/Y5bPgBH6xu5tS5ORcupRBHK0UbEU2joeOnh15HEW.png',
                'alt_text' => 'Client 1',
                'sort_order' => 1,
            ],
            [
                'clients_section_id' => 1,
                'logo_path' => 'https://api.stagepass.co.ke/storage/admin/client_logos/tf8iuGtgkYJFBVbTYadYCYZ9vGjFrEHYWBRU4ley.png',
                'alt_text' => 'Client 2',
                'sort_order' => 2,
            ],
            [
                'clients_section_id' => 1,
                'logo_path' => 'https://api.stagepass.co.ke/storage/admin/client_logos/808nXXBL1SbRPBssAqMhrhsCx1WUmB4QPmb6BiJ0.png',
                'alt_text' => 'Client 3',
                'sort_order' => 3,
            ],
            [
                'clients_section_id' => 1,
                'logo_path' => 'https://api.stagepass.co.ke/storage/admin/client_logos/B9GE3rHB3z5kgU8EjqK8IACzWWZ4i16MSBzLmTfR.png',
                'alt_text' => 'Client 4',
                'sort_order' => 4,
            ],
            [
                'clients_section_id' => 1,
                'logo_path' => 'https://api.stagepass.co.ke/storage/admin/client_logos/VSUp7ZYRp104VW4wHmbhbeMFB3RH0yyUJlXsnJ9t.png',
                'alt_text' => 'Client 5',
                'sort_order' => 5,
            ],
            [
                'clients_section_id' => 1,
                'logo_path' => 'https://api.stagepass.co.ke/storage/admin/client_logos/LjXW7zCA3J9GYvLt5Tu1sBFlJUAW1dugv67W6KiC.png',
                'alt_text' => 'Client 6',
                'sort_order' => 6,
            ],
            [
                'clients_section_id' => 1,
                'logo_path' => 'https://api.stagepass.co.ke/storage/admin/client_logos/MsRXFCd2QUifM1mHgUHYBJXNnBEhqxkLLVRV9Y7h.png',
                'alt_text' => 'Client 7',
                'sort_order' => 7,
            ],
            [
                'clients_section_id' => 1,
                'logo_path' => 'https://api.stagepass.co.ke/storage/admin/client_logos/nusEbmXvAuQMPx1l4jtTMXVWUMxjueC9FaCrcjZ1.png',
                'alt_text' => 'Client 8',
                'sort_order' => 8,
            ],
            [
                'clients_section_id' => 1,
                'logo_path' => 'https://api.stagepass.co.ke/storage/admin/client_logos/E6YZvi0FpUTrxKhItGADJkLkYCAbydB6qpt2VR7P.png',
                'alt_text' => 'Client 9',
                'sort_order' => 9,
            ],
            [
                'clients_section_id' => 1,
                'logo_path' => 'https://api.stagepass.co.ke/storage/admin/client_logos/t8rN1njoHyAXJC8fq6fcQYnJO47h1iDML2pGD5do.png',
                'alt_text' => 'Client 10',
                'sort_order' => 10,
            ],
            [
                'clients_section_id' => 1,
                'logo_path' => 'https://api.stagepass.co.ke/storage/admin/client_logos/dWIs5iDIWhVUUXMM1A7UlqwHR8Jew47vv5DRllkj.png',
                'alt_text' => 'Client 11',
                'sort_order' => 11,
            ],
            [
                'clients_section_id' => 1,
                'logo_path' => 'https://api.stagepass.co.ke/storage/admin/client_logos/hKqeg6mos38dmyqAoiqYW33TUAlqHeMNnEUFYk3T.png',
                'alt_text' => 'Client 12',
                'sort_order' => 12,
            ],
            [
                'clients_section_id' => 1,
                'logo_path' => 'https://api.stagepass.co.ke/storage/admin/client_logos/IKfCWzNikGeuQjJloQNBSWoKGn2NqvGBSiAxq6av.png',
                'alt_text' => 'Client 13',
                'sort_order' => 13,
            ],
            [
                'clients_section_id' => 1,
                'logo_path' => 'https://api.stagepass.co.ke/storage/admin/client_logos/PZlrzu5jK43oBvqrubLQ4FYLI1L0qabvnno0bujP.png',
                'alt_text' => 'Client 14',
                'sort_order' => 14,
            ],
            [
                'clients_section_id' => 1,
                'logo_path' => 'https://api.stagepass.co.ke/storage/admin/client_logos/UyysjVoV44dCaFiteJGxkybdYS4ahuXUBtgWUQXg.png',
                'alt_text' => 'Client 15',
                'sort_order' => 15,
            ],
            [
                'clients_section_id' => 1,
                'logo_path' => 'https://api.stagepass.co.ke/storage/admin/client_logos/IQAyywDjkCq9rUFcfVhrnWpqyQ38DTxtd9hkBk5R.png',
                'alt_text' => 'Client 16',
                'sort_order' => 16,
            ],
            [
                'clients_section_id' => 1,
                'logo_path' => 'https://api.stagepass.co.ke/storage/admin/client_logos/bx49tNCId8z2bhkV8lPFpqBYP0cKMkSizghAdOpi.png',
                'alt_text' => 'Client 17',
                'sort_order' => 17,
            ],
            [
                'clients_section_id' => 1,
                'logo_path' => 'https://api.stagepass.co.ke/storage/admin/client_logos/vZSM3fYYqK3qQrNMTfqd11uRK4tGLE6MR4m2vjzO.png',
                'alt_text' => 'Client 18',
                'sort_order' => 18,
            ],
            [
                'clients_section_id' => 1,
                'logo_path' => 'https://api.stagepass.co.ke/storage/admin/client_logos/4vcdeMydf73Bh4IZhWJ4hGfTDMZyJBHzHo8MfiNt.png',
                'alt_text' => 'Client 19',
                'sort_order' => 19,
            ],
            [
                'clients_section_id' => 1,
                'logo_path' => 'https://api.stagepass.co.ke/storage/admin/client_logos/DSvdJSKVidATBciZUUMJIctaxoWdGp5fri9lU0Ds.png',
                'alt_text' => 'Client 20',
                'sort_order' => 20,
            ],
            [
                'clients_section_id' => 1,
                'logo_path' => 'https://api.stagepass.co.ke/storage/admin/client_logos/x6sroKL05w2cd6vs4B1a037iXNyZ1G0wQpnFuE5G.png',
                'alt_text' => null,
                'sort_order' => 0,
            ],
            [
                'clients_section_id' => 1,
                'logo_path' => 'https://api.stagepass.co.ke/storage/admin/client_logos/2HtnVHPoOGPtNP6kOEYhVaf2L1CIfPBy7Zriyz9M.png',
                'alt_text' => null,
                'sort_order' => 0,
            ],
            [
                'clients_section_id' => 1,
                'logo_path' => 'https://api.stagepass.co.ke/storage/admin/client_logos/i37jGItefRdQS7dvCuMv0KjEr5xxSGywXavOa6z9.png',
                'alt_text' => null,
                'sort_order' => 0,
            ],
        ];

        foreach ($records as $record) {
            DB::table('client_logos')->insert(array_merge($record, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
