@extends('layouts.app')
@section('content')
  <div class="container">
    <h2 style="font-weight: bold" id="title-blog">List blog</h2>
        @foreach ($posts as $post)
        <div class="row" style="margin-top: 2%">
            <div class="col col-lg-6">
                <h3 style="color: skyblue">{{$post['title']}}</h3>
            </div>
            <div class="col col-lg-6"><a class="btn btn-success" href="/detail/{{$post['id']}}" role="button">View detail</a></div>
        </div>
        @endforeach
  </div>
@endsection