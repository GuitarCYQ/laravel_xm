<?php

namespace App\Model;

use App\Events\BanneritemDeleteEvent;
use Illuminate\Database\Eloquent\Model;

class Banneritem extends Model
{
    public function getIsshowAttribute($value)
    {
        return $value?"显示":"隐藏";
    }
    public function banners(){
        return $this->belongsTo(Banner::class,"banner_id");
    }

    protected $dispatchesEvents =[
        'deleted'=> BanneritemDeleteEvent::class,
    ];
}
