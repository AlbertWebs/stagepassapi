# Cron Jobs Setup for StagePass API

## Server Information
- **PHP Binary**: `/usr/local/bin/php`
- **Application Path**: `/home/stagepassco/public_html/api.stagepass.co.ke`
- **Domain**: `https://api.stagepass.co.ke/`

## Main Laravel Scheduler (Recommended)

This single cron job runs Laravel's scheduler every minute, which will then execute all scheduled tasks at their specified times.

```bash
* * * * * /usr/local/bin/php /home/stagepassco/public_html/api.stagepass.co.ke/artisan schedule:run >> /dev/null 2>&1
```

## Individual Command Cron Jobs (Alternative)

If you prefer to run commands directly via cron instead of using Laravel's scheduler:

### 1. Instagram Media Fetch (Every Hour)
```bash
0 * * * * /usr/local/bin/php /home/stagepassco/public_html/api.stagepass.co.ke/artisan instagram:fetch-media >> /dev/null 2>&1
```

### 2. Instagram Status Email (Daily at Midnight - Nairobi Time)
```bash
0 0 * * * /usr/local/bin/php /home/stagepassco/public_html/api.stagepass.co.ke/artisan instagram:send-status-email >> /dev/null 2>&1
```

### 3. Update Events Stat (Monthly on 1st at 1:00 AM - Nairobi Time)
```bash
0 1 1 * * /usr/local/bin/php /home/stagepassco/public_html/api.stagepass.co.ke/artisan stats:update-events >> /dev/null 2>&1
```

## How to Add Cron Jobs

### Via cPanel:
1. Log into cPanel
2. Navigate to **Cron Jobs** or **Advanced** → **Cron Jobs**
3. Click **Add New Cron Job**
4. Select **Standard (cPanel vixie-cron)** or **Advanced (Unix Style)**
5. Paste one of the commands above
6. Click **Add New Cron Job**

### Via SSH:
1. Connect to your server via SSH
2. Run: `crontab -e`
3. Add the cron job line(s)
4. Save and exit (usually `:wq` in vi/vim or `Ctrl+X` then `Y` in nano)

## Scheduled Tasks Summary

| Task | Frequency | Command | Description |
|------|-----------|---------|-------------|
| Instagram Fetch | Every Hour | `instagram:fetch-media` | Fetches new Instagram media posts |
| Status Email | Daily at 00:00 | `instagram:send-status-email` | Sends daily status email to albertmuhatia@gmail.com |
| Events Stat Update | Monthly (1st at 01:00) | `stats:update-events` | Updates Events stat by adding 1-4 events |

## Notes

- **Recommended Approach**: Use the main Laravel scheduler cron job (first option) as it's more efficient and allows Laravel to manage task scheduling internally.
- **Logging**: The `>> /dev/null 2>&1` redirects output to null. To log output, replace with:
  ```bash
  >> /home/stagepassco/public_html/api.stagepass.co.ke/storage/logs/cron.log 2>&1
  ```
- **Timezone**: The scheduled tasks use `Africa/Nairobi` timezone. Adjust cron times if your server uses a different timezone.
- **Testing**: Test commands manually first:
  ```bash
  /usr/local/bin/php /home/stagepassco/public_html/api.stagepass.co.ke/artisan instagram:fetch-media
  /usr/local/bin/php /home/stagepassco/public_html/api.stagepass.co.ke/artisan instagram:send-status-email
  /usr/local/bin/php /home/stagepassco/public_html/api.stagepass.co.ke/artisan stats:update-events
  ```

## Verification

After setting up cron jobs, verify they're running:
1. Check cron logs: `tail -f /var/log/cron` (if accessible)
2. Check Laravel logs: `tail -f storage/logs/laravel.log`
3. Monitor database for Instagram media updates
4. Check email inbox for daily status emails
