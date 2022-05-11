show(詳細表示)です<br>

<a href="{{ route('samples.index') }}">一覧に戻る</a><br>


{{ $sample->id }}
<br>
{{ $sample->name }}
<br>
{{ $sample->email }}
<br>

<a href="{{ route('samples.edit', [ 'id' => $sample->id ]) }}" >編集する</a>
<br><br>

<form method="post" action="{{ route('samples.delete', [ 'id' => $sample->id ])}}">
  @csrf
  <button>削除する</button>
</form>  

