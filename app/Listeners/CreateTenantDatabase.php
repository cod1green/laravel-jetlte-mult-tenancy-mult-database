<?php

namespace App\Listeners;

use App\Events\TenantCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class CreateTenantDatabase implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function handle(TenantCreated $event)
    {
        $tenant = $event->tenant();

        $databaseName = sprintf('%s%05d',env('DB_DATABASE_TENANT_PREFIX'), $tenant->id);

        DB::unprepared("CREATE DATABASE IF NOT EXISTS $databaseName;");

        Artisan::call("tenants:artisan --tenant={$tenant->id} -- \"migrate --database=tenant\"");

        $tenant->update([
            'database' => $databaseName
        ]);
    }
}
