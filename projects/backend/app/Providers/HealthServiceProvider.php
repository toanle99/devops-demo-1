<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HealthServiceProvider extends ServiceProvider
{
    public function register()
    {
        Health::checks([
		    CpuLoadCheck::new()->failWhenLoadIsHigherInTheLast5Minutes(2.0),
            DebugModeCheck::new(),
            EnvironmentCheck::new(),
            DatabaseCheck::new(),
            HorizonCheck::new(),
            UsedDiskSpaceCheck::new()
                ->warnWhenUsedSpaceIsAbovePercentage(90)
                ->failWhenUsedSpaceIsAbovePercentage(95),
            ScheduleCheck::new()->heartbeatMaxAgeInMinutes(2),
            FlareErrorOccurrenceCountCheck::new()
                ->projectId(config('services.flare.project_id'))
                ->apiToken(config('services.flare.api_token'))
        ]);
    } 

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
