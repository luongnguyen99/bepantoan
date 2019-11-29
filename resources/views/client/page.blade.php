@extends('client.master.master')
@section('title')
{{ $title }}
@endsection
@section('content')
<div class="product blog">
    <div class="blog-content">
        <div class="text-center">
            <h2 class="page-title" style="color:black;">{{ $db['title'] }}</h2>
        </div>
        <hr>
        <div class="container">
            {!! $db['content'] !!}
        </div>
    </div>
</div>
@stop
