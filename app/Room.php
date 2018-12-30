<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'theme_fr',
        'theme_en',
        'pitch_fr',
        'pitch_en',
        'minplayers',
        'maxplayers',
        'lvl',
        'success',
        'timeplay',
        'image',
        'created_at',
        'updated_at',
        'flag'
    ];
    /**
     * @var null
     */
    public $timestamps = null;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company(){
        return $this->belongsTo('App\Company');
    }
    public static function share(){
        $share = Room::where('activ', '=', '1')->count();
        return $share;
    }
    
    public static function noShare(){
        $noShare = Room::where('activ', '=', '0')->count();
        return $noShare;
    }
}
