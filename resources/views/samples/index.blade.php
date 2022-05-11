indexです。<br>
{{-- LaravelのBladeでforeach --}}
<a href="{{ route('samples.create') }}">新規登録</a> <br>

@if(session('flash_message'))
  <div>{{ session('flash_message') }}</div>
@endif


@foreach($samples as $sample)
<a href="{{ route('samples.show', [ 'id' => $sample->id ] ) }}">
  {{ $sample->id}}</a>
  
  : {{ $sample->name }} : {{ $sample->email }} <br>
@endforeach

