<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sample;

class SampleController extends Controller
{
    //
    public function index()
    {
        // Model::all() で全件取得
        $samples = Sample::all();

        // php 
        // select ** from テーブル;

        //var_dumpみたいなもの
        // dd('テスト');
        // dd($samples);

        // return viewでビューファイルを指定する
        // compactで変数を複数ビューファイルに渡せる
        return view('samples.index', compact('samples'));
    }

    public function create()
    {
        return view('samples.create');
    }
    
    // 引数で(Request $request)とかくと
    // $requestインスタンスを取得できる
    // この中にフォームの情報が入ってる
    public function store(Request $request)
    {
        // バリデーションはマニュアルそのままコピペでok
        $validated = $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|unique:samples'
        ]);

        // dd($request);

        // DBに保存するコード
        Sample::create([
            'name' => $request['name'],
            'email' => $request['email']
        ]);

        // フラッシュメッセージ
        // 登録後1回だけ表示する機能
        session()->flash('flash_message', '登録okです');

        // DB保存後は redirct()->route()
        // とやっとくのが無難
        return redirect()->route('samples.index');

    }
}
