<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Services\Users\UserService;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;    
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            $users = $this->userService->getAllUsers();
            return view('users.index', ['users' => $users]);
        }

        return redirect()->route('posts.index')->with('error', 'У вас нет доступа к этой странице.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('users.create');
        }

        return redirect()->route('posts.index')->with('error', 'У вас нет доступа к этой странице.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        if (auth()->user()->hasRole('admin')) {
            $this->userService->createUser($request->validated());
            return redirect()->route('users.index');
        }

        return redirect()->route('posts.index')->with('error', 'У вас нет доступа к этой странице.');
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
        if (auth()->user()->hasRole('admin')) {
            $user = $this->userService->getUserById($id);
            return view('users.edit', compact('user'));
        }

        return redirect()->route('posts.index')->with('error', 'У вас нет доступа к этой странице.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        if (auth()->user()->hasRole('admin')) {
            $this->userService->updateUser($id, $request->validated());
            return redirect()->route('users.index');
        }

        return redirect()->route('posts.index')->with('error', 'У вас нет доступа к этой странице.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // $this->userService->deleteUser($user);
        // return redirect()->route('users.index');
    }
}
