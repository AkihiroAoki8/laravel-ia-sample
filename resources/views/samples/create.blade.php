create

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('samples.store') }}" method="post">
@csrf
<label for="name">名前</label>
<input id="name" type="text" name="name" value="{{ old('name') }}">
<br>
<label for="email">メールアドレス</label>
<input id="email" type="text" name="email" value="{{ old('email') }}">
<br>
<button>送信</button>

</form>