<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Multitenancy\Models\Tenant;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tenant::create(
            [
                'name' => 'tenant 1',
                'domain' => 'tenant_1.saas.test',
                'database' => 'tenant_1',
                'active' => true,
            ]
        );

        Tenant::create(
            [
                'name' => 'tenant 2',
                'domain' => 'tenant_2.saas.test',
                'database' => 'tenant_2',
                'active' => true,
            ]
        );
    }
}
