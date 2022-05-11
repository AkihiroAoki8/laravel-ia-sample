edit(一件を編集する)<br>

<a href="{{ route('samples.show', [ 'id' => $sample->id ] )}}">戻る</a>

<form method="post" action="{{ route('samples.update', [ 'id' => $sample->id ] )}}">
  @csrf
  <label>名前</label>
  <input type="text" name="name" value="{{ $sample->name }}"><br>
  <label>メールアドレス</label>
  <input type="email" name="email" value="{{ $sample->email }}"><br>
  <button>更新する</button>
</form>