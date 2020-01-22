<?php

namespace App\Console;

use App\Console\Commands\ImportLocations;
use App\Console\Commands\ReEncodeCustomFieldNames;
use App\Console\Commands\RestoreDeletedUsers;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
     /* obsolete??? Seems no longer present in latest snipeit release 4.8.0
    protected $commands = [
        Commands\PaveIt::class,
        Commands\CreateAdmin::class,
        Commands\SendExpirationAlerts::class,
        Commands\SendInventoryAlerts::class,
        Commands\SendExpectedCheckinAlerts::class,
        Commands\ObjectImportCommand::class,
        Commands\Version::class,
        Commands\SystemBackup::class,
        Commands\DisableLDAP::class,
        Commands\Purge::class,
        Commands\LdapSync::class,
        Commands\FixDoubleEscape::class,
        Commands\RecryptFromMcrypt::class,
        Commands\ResetDemoSettings::class,
        Commands\SyncAssetLocations::class,
        Commands\RegenerateAssetTags::class,
        Commands\SyncAssetCounters::class,
        Commands\RestoreDeletedUsers::class,
        Commands\SendUpcomingAuditReport::class,
        Commands\ImportLocations::class,
        // KB-MAN - start
        \Modules\Klusbib\Console\UpdateAvatar::class
        // KB-MAN - end
    ];*/


    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->command('snipeit:inventory-alerts')->daily();
        $schedule->command('snipeit:expiring-alerts')->daily();
        $schedule->command('snipeit:expected-checkin')->daily();
        $schedule->command('snipeit:backup')->weekly();
        $schedule->command('backup:clean')->daily();
        $schedule->command('snipeit:upcoming-audits')->daily();
        // KB-MAN - start
//        $schedule->command('klusbib:update-avatar')->daily();
        // KB-MAN - end
    }

    protected function commands()
    {
        require base_path('routes/console.php');
        $this->load(__DIR__.'/Commands');
    }
}
