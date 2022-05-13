<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LifeCycleController extends Controller
{
    public function showServiceContainerTest()
    {
        
        // サービスコンテナ 
        // bind() サービスコンテナに登録ができる
        app()->bind('lifeCycleTest', function(){
            return 'ライフサイクルテスト';
        });

        // dd(app());

        $test = app()->make('lifeCycleTest');
        // dd($test);

        // サービスプロバイダのテスト
        $encrypt = app()->make('encrypter');
        $password = $encrypt->encrypt('password');
        // dd($password, $encrypt->decrypt($password));

        // サービスプロバイダに登録した後に、
        // app()を見ると、登録されているのがわかります
        dd(app()->serviceProviderTest);







    }
}
