<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

route::get('/users', function() {
    $users = [
        [
            'id' => 1,
            'firstName' => 'Alice',
            'lastName' => 'Niewl',
            'email' => 'alice@example.com',
            'dateOfBirth' => '2000-01-01',
            'emailVerified' => true,
            'createDate' => now()->format('Y-m-d'),
        ],
        [
            'id' => 2,
            'firstName' => 'Daniel',
            'lastName' => 'Rockfield',
            'email' => 'dan@example.com',
            'dateOfBirth' => '1989-03-03',
            'emailVerified' => false,
            'createDate' => now()->format('Y-m-d'),
        ],
    ];
    return response()->json($users);
});

route::get('/users/{userId}', function(int $userId) {
    $DateOfBirth = new DateTime('2000-1-1 00:00:00');
    $user = [
        'id' => $userId,
        'firstName' => 'Alice',
        'lastName' => 'Niewl',
        'email' => 'alice@example.com',
        'dateOfBirth' => $DateOfBirth->format('Y-m-d'),
        'emailVerified' => true,
        'createDate' => now()->format('Y-m-d'),
    ];
    return response()->json($user);
});

route::get('/posts', function() {
    $createdDate = new DateTime('2022-1-1 9:0:0 Asia/Tokyo');
    $created_at = $createdDate->format('c'); // format('c') でISO 8601 形式の日付フォーマットを指定できる
    $postData1 = [
        'id' => 'xxx-xxxx-xxx-xxxx',
        'title' => 'post title',
        'content' => 'this is post content',
        'user_id' => 42,
        'created_at' => $created_at
    ];

    $postData2 = [
        'id' => 'xxx-xxxx-xxx-xxxx',
        'title' => 'post title2',
        'content' => 'this is post content 2',
        'user_id' => 4242,
        'created_at' => $created_at
    ];
    return response()->json([$postData1, $postData2], 200);
});

route::get('/posts/{postId}', function() {
    $createdDate = new DateTime('2022-1-1 9:0:0 Asia/Tokyo');
    $created_at = $createdDate->format('c'); // format('c') でISO 8601 形式の日付フォーマットを指定できる
    $postData = [
        'id' => 'xxx-xxxx-xxx-xxxx',
        'title' => 'post title',
        'content' => 'this is post content',
        'user_id' => 42,
        'created_at' => $created_at
    ];
    return response()->json($postData, 200);
});