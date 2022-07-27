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
    //ユーザーが今月提出済みかをチェックするメソッド
    public function hasSubmittedHolidayRequestsInThisMonth(){
        //今月の最初の日を取得
        $dtFrom = Carbon::now()->startOfMonth()->toDateString();
        //今月の最後の日を取得
        $dtTo = Carbon::now()->endOfMonth()->toDateString();
        //今月その人が出した休暇申請数を取得
        return $this->holidayRequests()->whereBetween('date', [$dtFrom, $dtTo])->count() > 0;
    }
    
    public function holidayRequests(){
        return $this->hasMany('App\HolidayRequest');
    }
    
}
