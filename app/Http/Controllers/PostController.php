<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Validator;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255|min:10',
            'content' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('create')
                        ->withErrors($validator)
                        ->withInput();
        }
        $data = $request->toArray();
        $data['created_at'] = Carbon::now();
        DB::table('posts')->insert([
            'title' => $data['title'],
            'content' => $data['content'],
            'created_at' => $data['created_at']
        ]);
        return redirect('list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $get_post = DB::table('posts')->where('id', $id)->select('id', 'title', 'content')->get();
        $post = json_decode($get_post, true);
        $get_comments = DB::table('comments')->where('post_id', $id)->get();
        $comments = json_decode($get_comments, true);
        return view('detail',['post' => $post[0],'comments' =>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->toArray();
        $data['updated_at'] = Carbon::now();
        DB::table('posts')->where('id',$id)->update([
            'title' => $data['title'],
            'content' => $data['content'],
            'updated_at' => $data['updated_at']
        ]);
        return redirect('detail/'.$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $get_posts = DB::table('posts')->where('id', $id)->delete();
        return redirect('list');
    }

    public function list(){
        $get_posts = DB::table('posts')->select('id', 'title')->get();
        $posts = json_decode($get_posts, true);
        return view('list',['posts' => $posts]);
    }

    public function showUpdate($id){
        $get_post = DB::table('posts')->where('id', $id)->select('id', 'title', 'content')->get();
        $post = json_decode($get_post, true);
        return view('update',['post' => $post[0]]);
    }
}
