<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //handleメソッドルーティングとアクションの間で動く
    public function handle($request, Closure $next)
    {
        //$request->user()がnullだったらページを作るか４０４にするか
        if($request->user() == null){
            abort(404);
        }
        
        //ログインユーザーの管理者じゃなかったら404を返す
        //->isAdmin()はモデルのisAdminメソッドを呼んでいる
        if(!$request->user()->isAdmin()){
            abort(404);
        }
        
        return $next($request);
    }
}
