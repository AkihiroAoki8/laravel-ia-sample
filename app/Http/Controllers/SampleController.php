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

        // viewもLaravelのヘルパ関数
        // resources/views/の中の
        // フォルダ名.ファイル名
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

    // 20220511追加
    public function show($id)
    {
        // dd($id);
        
        // PHPでかくなら
        // where id = x
        $sample = Sample::findOrFail($id);
        
        // dd($sample);

        return view('samples.show', compact('sample'));
    }

    public function edit($id)
    {
        $sample = Sample::findOrFail($id);

        return view('samples.edit', compact('sample'));
    }

    // 引数 Request
    // インスタンス化されている
    // DI(依存性注入)
    // Dependency Injection
    public function update(Request $request, $id)
    {
        // バリデーション

        // DB内の情報を1件取得
        $sample = Sample::findOrFail($id);

        // DB内の情報 = フォームに入力された値
        $sample->name = $request['name'];
        $sample->email = $request['email'];

        // 保存時はsaveが必須
        $sample->save();

        // セッションメッセージ

        return redirect()->route('samples.index');

    }

    public function delete($id)
    {
        $sample = Sample::findOrFail($id)->delete();

        return redirect()->route('samples.index');
    }
}
