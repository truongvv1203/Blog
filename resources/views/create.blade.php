@extends('layouts.layout')
@section('content')
  <div class="container">
    <h2 id="title-blog">Create new blog</h2>
    <form action="/create" method="POST">
      @csrf
      <div class="form-group">
        <label for="exampleInputEmail1">Titile</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Enter title">
        <p style="color: red">{{$errors->first('title')}}</p>
        <br>
      </div>
      <label for="exampleFormControlTextarea1">Content</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="content" placeholder="Enter content"></textarea>
      <p style="color: red">{{$errors->first('content')}}</p>
      <br>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection

