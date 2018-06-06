<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
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

    public function mapping()
    {
        return $this->belongsTo('App\Models\Mapping');
    }
}
