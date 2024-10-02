<?php

use Illuminate\Support\Facades\Route;
use App\Services\PostService;
use App\Services\UserService;
use Inertia\Inertia;

Route::get('/', function (PostService $postService) {
    return Inertia::render('PostsList', ['posts' => $postService->getPosts()]);
});


/** POSTS ROUTES */
Route::get('/posts', function (PostService $postService) {
    return Inertia::render('PostsList', ['posts' => $postService->getPosts()]);
});
Route::get('/posts/{id}', function ($id, PostService $postService) {
    return Inertia::render('PostDetail', ['post' => $postService->getPostById($id)]);
});
Route::delete('/posts/{id}', function ($id, PostService $postService) {
    $postService->deletePostById($id);
    return Inertia::location('/posts');
});

/** USERS ROUTES */
Route::get('/users', function (UserService $userService) {
    return Inertia::render('UsersList', ['users' => $userService->getUsers()]);
});

Route::delete('/users/{id}', function ($id, UserService $userService) {
    $userService->deleteUserById($id);
    return Inertia::location('/users');
});
