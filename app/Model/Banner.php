<?php

namespace App\Model;

use App\Events\BannersDeleteEvent;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public $timestamps = false;
    protected $dispatchesEvents =[
        'deleted'=> BannersDeleteEvent::class,
    ];

    protected function banneritem(){
        return $this->hasMany(Banneritem::class,'banner_id');
    }
}
