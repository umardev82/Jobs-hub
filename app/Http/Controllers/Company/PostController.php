<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Company\Company;
use Illuminate\Http\Request;
use App\Models\Company\Post;
use App\Notifications\JobPosted;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewPostNotification;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

           $breadcrumbs = [
            'title' => "Posts",
            'links' => [
                ['name' => "Home", 'url' => route('Company.dashboard')],
                ['name' => "Posts", 'url' => route('Company.post.index')],
            ],
        ];
        $posts = Post::all();
        return view('Company.post.index', compact('posts','breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            'title' => "Posts",
            'links' => [
                ['name' => "Home", 'url' => route('Company.dashboard')],
                ['name' => "Create Posts", 'url' => route('Company.post.create')],
            ],
        ];
        return view('Company.post.create',compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->short_description = $request->short_description;
        $post->description = $request->description;
        $post->designation = $request->designation;
        $post->salary_range = $request->salary_range;
        $post->level = $request->level;
        $post->experiance = $request->experiance;
        $post->type = $request->type;
        $post->company_id = Auth::guard('company')->user()->id;
        // $post->company_id=$request->company_id;
        $post->created_by = 1;
        $post->status = $request->status;
        $post->location = $request->location;
        $post->save();



        return redirect()->route('Company.post.index')->with('success', 'Job posted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return view('Company.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->short_description = $request->short_description;
        $post->description = $request->description;
        $post->designation = $request->designation;
        $post->salary_range = $request->salary_range;
        $post->level = $request->level;
        $post->experiance = $request->experiance;
        $post->type = $request->type;
        $post->company_id = Auth::guard('company')->user()->id;
       // $post->company_id = $request->company_id;
        $post->created_by = 1;
        $post->status = $request->status;
        $post->location = $request->location;
        $post->save();
        return redirect()->route('Company.post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('Company.post.index');
    }
}
