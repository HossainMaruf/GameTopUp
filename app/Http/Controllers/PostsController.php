<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::where('user_id', Auth::user()->id)->get();
        return view('admin.post.posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'message' => 'required'
        ];
        $value = [
            'title' => $request->title,
            'message' => $request->message
        ];

        $validator = Validator::make($value, $rules);
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $post = [];
        $filename = '';
        $post['title'] = $request->title;
        $post['body'] = $request->message;
        $post['user_id'] = Auth::user()->id;
        if($file = $request->file('file')) {
            $filename = time().'__'.$file->getClientOriginalName();
            $file->move('images', $filename);
        }
        $post['file'] = $filename;
        Post::insert($post);
        return redirect()->intended('/admin/posts');
        //
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
        $post = Post::where("id", $id)->first();
        $post = ['id' => $id, 'title' => $post->title, 'message' => $post->body, 'file' => $post->file];
        // return $data;
        return view('admin.post.edit', ['post' => $post]);
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
        $post = Post::where("id", $id)->first();

        $post['title'] = $request->title;
        $post['body'] = $request->message;

        if ($request->file) {
            $filename = time().'__'.$request->file->getClientOriginalName();
            $request->file->move('images', $filename);
            $post['file'] = $filename;
        }

        $post->save();

        return redirect('/admin/posts');
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
        $post = Post::where("id", $id)->delete();
        return redirect('/admin/posts');

        return $id;
    }
}
