@extends('client.master.master')
@section('title','Error')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/error/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/error/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/error/style-responsive.css') }}">
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3 p404 centered">
      <img src="{{ asset('assets/error/404.png') }}" alt="">
      <h1>DON'T PANIC!!</h1>
      <h3>Trang bạn đang tìm kiếm không tồn tại.</h3>
      <br>
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
        </div>
      </div>
      <h5 class="mt">Hey, Có thể bạn sẽ quan tâm đến những trang này:</h5>
      <p><a href="/">Trang chủ</a> | <a href="/tin-tuc">Tin tức</a></p>
    </div>
  </div>
</div>
@endsection