<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceConsumption extends Model
{
    protected $table = 'assdt_service_consumption_table';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];
}