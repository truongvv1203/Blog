@extends('layouts.app')
@section('content')
    <div class="container" id="title-blog">
        <h1>{{$post['title']}}</h1>
        <p>{{$post['content']}}</p>
        <a class="btn btn-primary" href="/update/{{$post['id']}}" role="button">Update</a>
        <a class="btn btn-danger" href="/delete/{{$post['id']}}" role="button">Delete</a>
        </div>
    </div>
    <div class="container" style="margin-top: 20px">
        <form action="/comment/{{$post['id']}}" method="POST">
            @csrf
            <div class="row">
                <div class="col col-lg-10">
                    <label for="comment">Enter comment</label>
                    <textarea class="form-control" id="comment" rows="2" name="content_comment"></textarea>
                </div>
                <div class="col col-lg-2">
                    <button type="submit" class="btn btn-primary" style="position: absolute;top:32px;">Comment</button>
                </div>
            </div>
      </form>
    </div>
    <div style="height: 300px;overflow-y:scroll;margin-top:10px;">
        @foreach ($comments as $comment)
        <div class="container" style="box-shadow: rgba(67, 71, 85, 0.27) 0px 0px 0.25em, rgba(90, 125, 188, 0.05) 0px 0.25em 1em; width:60%;" >
            <div class="row" style="margin: 10px;font-size:10px">{{$comment['created_at']}}</div>
            <div class="row" style="height: 40px;margin-10px:10px;">
                <div class="col col-lg-4">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcReVPCtdfkLhG6Jv3n0a_cNFp5PMgvWCm_r3Q&usqp=CAU" alt="" height="30px" width="30px">
                    <label style="color:green">Anonymous User <span><i style="color:black">commented:</i></span></label>
                </div>
                <div class="col col-lg-8">{{$comment['content_comment']}}</div>
            </div>
        </div>
        @endforeach
    </div>

@endsection