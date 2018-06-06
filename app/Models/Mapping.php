<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapping extends Model
{
    /**
     * @var string
     */
    protected $table = "mapping";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'local_id', 'remote_id', 'remote_client_number'
    ];

    public function tenant()
    {
        return $this->hasOne('App\Models\Tenant');
    }
}