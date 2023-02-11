<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $user = User::findorfail($id);
        $posts = Post::all();

        // return view('posts.read', compact(['user', 'posts']));
        return view('posts.read')->with('user', $user)->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::id();
        $request->validate([
            'title' => 'required|string|max:50',
            'body' => 'required|string|max:255',
            'file' => 'nullable|image'
        ]);

        $user = User::findorfail($id);
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;

        if ($request->hasFile('file')) {
            $imageWithExtension = $request->file('file')->getClientOriginalName(); //Filename with extension
            $myFileName = pathinfo($imageWithExtension, PATHINFO_FILENAME); //extract only the filename without extension
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileName = $myFileName . '_' . time() . '.' . $extension; //filename
            $uploadPath = 'public/pictures';
            $path = $request->file('file')->storeAs($uploadPath, $fileName);
        }

        $post['image'] = $fileName;

        $user->posts()->save($post);
        return redirect()->route("posts.store")->with('success', 'Post created successfully!');
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
        $post = Post::findorfail($id);
        // return view("posts.edit", compact('post'));
        return view("posts.edit")->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'file' => 'nullable|image'
        ]);

        if ($request->hasFile('file')) {
            $imageWithExtension = $request->file('file')->getClientOriginalName(); //Filename with extension
            $myFileName = pathinfo($imageWithExtension, PATHINFO_FILENAME); //extract only the filename without extension
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileName = $myFileName . '_' . time() . '.' . $extension; //filename
            $uploadPath = 'public/pictures';
            $path = $request->file('file')->storeAs($uploadPath, $fileName);
        }

        $post->update([
            'title' => $request->title,
            'body' => $request->body, //request('body')
            'image' => $fileName ?? null
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findorfail($id);
        $post->delete();
        return redirect()->route("posts.index")->with('success', "Record has been removed");
    }

    public function myDashboard()
    {
        $id = Auth::id();
        $posts = Post::All();

        return view('posts.dashboard')->with('id', $id)->with('posts', $posts);
    }

    public function interface()
    {
        $posts = Post::all();
        return view('index')->with('posts', $posts);
    }
}
