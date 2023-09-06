<?php

include "Api.php";


function pre($ar)
{

    echo '<pre>';
    print_r($ar);
    echo '</pre>';
}
// RECEIVE USERS, POSTS, TODOS.///////////////////////////////////
$url1 = "https://jsonplaceholder.typicode.com/users";
$url2 = "https://jsonplaceholder.typicode.com/posts";
$url3 = "https://jsonplaceholder.typicode.com/todos";

// get users
$user = new Api();
$result = $user->getData($url1);

pre($result);

// get all user's posts and todos
$data_user = new Api();
$user_post = $data_user->getUserPost(1);
$user_todos = $data_user->getUserTodo(5);

pre($user_post);
pre($user_todos);

//get all post
$post = new Api();
$result = $post->getData($url2);
// get all todos
$todo = new Api();
$result = $todo->getData($url3);

//Create post
$title = 'sunt aut facere repellat provident occaecati excepturi optio reprehenderit';
$content = 'uia et suscipit suscipit recusandae consequuntur expedita et cum reprehenderit molestiae';

$data = array('userId'=>'1','id'=>'101', 'title' => $title, 'body' => $content);

$create = new Api();
$result = $create->addPost($data);
pre($result);

//update post
$update = new Api();
$result = $update->updatePost(3, $data);
pre($result);

//delete post
$delete = new Api();
$result = $delete->deletePost(4);
pre($result);





