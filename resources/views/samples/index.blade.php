indexです。<br>
{{-- LaravelのBladeでforeach --}}

@if(session('flash_message'))
  <div>{{ session('flash_message') }}</div>
@endif


@foreach($samples as $sample)
{{ $sample->name }} : {{ $sample->email }} <br>
@endforeach

