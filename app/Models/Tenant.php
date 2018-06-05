<?php

namespace App\Models;

class Tenant
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'initial_sync', 
        'latest_sync',
    ];
}
