<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssdtSidebar extends Model
{
    protected $table = 'assdt_sidebar';

    protected $primaryKey = 'sidebar_id';

    public $timestamps = false;

    protected $guarded = [];

    public function children()
    {
        return $this->hasMany(AssdtSidebar::class,'parent_id','sidebar_id')
                    ->where('is_active',1)
                    ->orderBy('tab_order');
    }
}