<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::orderBy('id','desc')->paginate(3);
        return view('post.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'category' => 'required',
        'image' => 'required',
    ]);

    $postData = new Post();
    $postData->title = $request->title;
    $postData->category = $request->category;
    $postData->content = $request->content;

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $postData->image = $profileImage;
        }
    $postData->save();

    return redirect('/post')->with(['message' => 'Post created 👌']);
}


// $imageName= time() . '.' .$request->file->extension();
// $request->file->storeAs('public/images',$imageName);
// $postData=['title'=>$request->title,'category'=>$request->category,'content'=>$request->content,'image'=>$imageName];
// Post::create($postData);


    /**
     * Display the specified resource.
     */
    // public function show(Post $post)
    // {
    //     return view('post.show',['post=>$post']);
    // }

    public function show($postId)
{
    $post = Post::findOrFail($postId);

    return view('post.show',['post'=>$post]);
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($postId)
    {
        $post = Post::findOrFail($postId);
        return view('post.edit', compact('post'));

    }

    /**
     * Update the specified resource in storage.
     */
// Assuming this function is inside a controller class
public function update(Request $request, $id)
{
    // Validate the incoming request data
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'category' => 'required',
        'image' => 'required',
    ]);

    // Find the post in the database based on the given ID
    $postData = Post::find($id);

    // Update the post properties with the new values from the request
    $postData->title = $request->title;
    $postData->category = $request->category;
    $postData->content = $request->content;

    // Handle the image upload and update the post's image property
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $destinationPath = 'image/';
        $image->move($destinationPath, $profileImage);
        $postData->image = $profileImage;
    }

    // Save the updated post to the database
    $postData->save();

    // Redirect the user to the /post route with a success message
    return redirect('/post')->with(['message' => 'Post Updated 👌']);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/post')->with('message', ' deleted successfully');
    }
}

