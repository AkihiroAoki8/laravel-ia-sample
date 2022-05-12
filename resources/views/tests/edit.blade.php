ラジオボタンのDBからの持ち越しサンプルコード

<input type="radio" name="is_visible"  id="visible" value="1"  {{ $text->is_visible  == "1" ? 'checked' : '' }}>
  <label for="visible">表示する</label><br>

@if(条件) 処理 @endif
と書いてもok

