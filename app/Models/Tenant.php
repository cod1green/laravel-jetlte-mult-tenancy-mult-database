<?php

namespace App\Models;

use App\Events\TenantCreated;
use App\Events\TenantDeleted;
use App\Events\TenantUpdated;
use Spatie\Multitenancy\Models\Tenant AS SpatieTenant;

class Tenant extends SpatieTenant
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'domain',
        'database',
        'active'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => TenantCreated::class,
    ];

}
