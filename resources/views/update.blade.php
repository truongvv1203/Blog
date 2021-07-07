@extends('layouts.layout')
    @section('content')
    <div class="container">
        <form action="/update/{{$post['id']}}" method="POST">
            @csrf
            <div class="form-group">
            <label for="email">Titile</label>
            <input type="text" class="form-control" id="email" name="title" value="{{$post['title']}}">
            </div>
            <label for="content">Enter content</label>
            <textarea class="form-control" id="content" rows="6" name="content">{{$post['content']}}</textarea>
            <br><br>
            <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
    @endsection