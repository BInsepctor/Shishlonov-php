<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Services\Posts\PostService;
use App\Http\Requests\Posts\StorePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $posts = $this->postService->getAllPosts();
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('editor')) {
            return view('posts.create');
        }

        return redirect()->route('posts.index')->with('error', 'У вас нет доступа к этой странице.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('editor')) {
            $this->postService->createPost($request->validated());
            return redirect()->route('posts.index');
        }

        return redirect()->route('posts.index')->with('error', 'У вас нет доступа к этой странице.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = $this->postService->getPostWithComments($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('editor')) {
            $post = $this->postService->getPostById($id);
            return view('posts.edit', compact('post'));
        }

        return redirect()->route('posts.index')->with('error', 'У вас нет доступа к этой странице.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('editor')) {
            $this->postService->updatePost($id, $request->validated());
            return redirect()->route('posts.index');
        }

        return redirect()->route('posts.index')->with('error', 'У вас нет доступа к этой странице.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
