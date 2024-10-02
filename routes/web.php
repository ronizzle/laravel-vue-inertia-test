<?php

use Illuminate\Support\Facades\Route;
use App\Services\PostService;
use App\Services\UserService;
use Inertia\Inertia;

Route::get('/', function (UserService $userService) {
    return Inertia::render('UsersList', ['users' => $userService->getUsers()]);
});
Route::get('/users', function (UserService $userService) {
    return Inertia::render('UsersList', ['users' => $userService->getUsers()]);
});

Route::delete('/users/{id}', function ($id, UserService $userService) {
    $userService->deleteUserById($id);
    return Inertia::location('/users');
});

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
