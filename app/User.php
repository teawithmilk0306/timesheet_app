<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    //isAdminメソッドを実装
    public function isAdmin(){
        //自身のroleが１かどうかをチェック
        return $this->role == 1;
    }
    public function hasSubmittedHolidayRequestsInThisMonth(){
        $dtFrom = Carbon::now()->startOfMonth()->toDateString();
        $dtTo = Carbon::now()->endOfMonth()->toDateString();
        return $this->holidayRequests()->whereBetween('date', [$dtFrom, $dtTo])->count() > 0;
    }
    
    public function holidayRequests(){
        return $this->hasMany('App\HolidayRequest');
    }
    
}
