<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        $data = [
            'user_id' => Auth::user()->id,
            'post_id' => $id,
            'body' => $request->body 
             
        ];
        Comment::insert($data);
        return redirect()->back();
    }

    /**
     * Reply to a specific comment
     * @param  Request $request   [description]
     * @param  [int]  $parent_id [comment_id]
     * @return [void]             [description]
     */
    public function storeReply(Request $request, $post_id, $id) {
        $data = $request->all();
        $data = [
           'user_id' => Auth::user()->id,
           'post_id' => $post_id,
           'parent_id' => $id, 
           'body' => $request->body
        ];
        Comment::insert($data);
        $replyID = Comment::where('parent_id', $id)->latest('id')->first()->id;
        return redirect()->back();
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
        //
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
    }
}
