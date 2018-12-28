<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'active',
        'last_login_at',
        'last_login_ip',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function company(){
        return $this->belongsTo('App\Company');
    }

    public static function newUser(){
        $new = User::where('active', '=', '0')->count();
        switch ($new){
            case '0':
                $message = '';
                break;
            case '1':
                $message = '1 new User';
                break;
            default:
                $message = $new . ' new Users';
        }
        return $message;
    }
}
