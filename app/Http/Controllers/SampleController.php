<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sample;
// マニュアルからコピペ
use Illuminate\Support\Facades\DB;

// update時にuniqueを無視するために読み込ませる
use Illuminate\Validation\Rule;

use App\Http\Requests\SampleRequest;


class SampleController extends Controller
{
    //
    public function index()
    {
        // 20220511 追記
        // PHPでDBから情報とってきたとき FETCH_ASSOC
        // 連想配列 key:value

        // Laravelの場合は
        // 連想配列を拡張したような情報を取得
        // コレクション (Collection型)

        // mysqlにつないでいますが、
        // 環境によっては別のDB
        // ex) postgreSQL, amazon Aurora, MS SQL, oracle
        // DBが変わるとクエリを変更が必要(本来は)

        // O/Rマッパー（ORM)
        // DBに問わず、共通でかける仕組み
        // O/RマッパーのLaravelで用意されてるのが
        // Eloquent(エロクアント)
        
        // DBから情報を取得する方法が2種類
        // 1. Eloquent(エロクアント)
        // ->オリジナルのメソッドが追加
        $eloquent = Sample::all();
        

        // 2. クエリビルダ(Query Builder)
        // -> selectとかwhereとか
        // SQL分に近い
        $queryBuilderGet = DB::table('samples')->get();
        $queryBuilderFirst = DB::table('samples')->first();

        // コレクション型
        $collection = collect(['aaa', 'bbb']);

        // 4つのパターンの違いを見てみる
        // dd($eloquent, 
        // $queryBuilderGet, 
        // $queryBuilderFirst, 
        // $collection);

        // Model::all() で全件取得
        $samples = Sample::all();

        // エロクアントでいろいろやってみる
        // $samples = Sample::where('name', 'コーラ')
        // ->where('email', 'like', '%@test.com')
        // ->get();

        // dd($samples);
        
 
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

    // フォームリクエストを使うときは
    // 引数を Requestから SampleRequestなど、
    // つくったリクエストクラスに書き換える
    public function store(SampleRequest $request)
    {
        // バリデーションの書き方はマニュアルそのままコピペでok
        // フォームリクエスト(SampleRequest)に移動
        // $validated = $request->validate([
        //     'name' => 'required|min:2|max:255',
        //     'email' => 'required|email|unique:samples'
        // ]);

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

        // こう書くと弾かれる
        // 'email' => 'required|unique:texts|email', 

        // Rule::unique(テーブル名)->ignore とすれば更新時でも登録できる
        // 'email' => ['required', Rule::unique('texts')->ignore($request->id)],

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
