<?php

class Api
{
    
    public function getData($url)
    {
        // Initialize curl session
        $ch = curl_init();
        
        //set options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return data as a string

        // Execute
        $result = curl_exec($ch);
        // Close curl session
        curl_close($ch);
        //convert in php array
        $final_result = json_decode($result);
        return $final_result;
    }

    public function getUserPost($id)
    {
        $all_post = $this->getData("https://jsonplaceholder.typicode.com/posts");
        $user_post = array();
        foreach ($all_post as $post )
        {
            if ($post->userId == $id)
            {
            array_push($user_post, $post);
            }
        
        }
        return $user_post;

    }
    public function getUserTodo($id)
    {
        $all_do = $this->getData("https://jsonplaceholder.typicode.com/todos");
        $user_do = array();
        foreach ($all_do as $do )
        {
            if ($do->userId == $id)
            {
            array_push($user_do, $do);
            }
        
        }
        return $user_do;
    }
    
    public function addPost($data)
    {
        $sendData = json_encode($data);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://jsonplaceholder.typicode.com/posts");

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        // SET Method as a POST
        curl_setopt($ch, CURLOPT_POST, 1);

        // Pass user data in POST command
        curl_setopt($ch, CURLOPT_POSTFIELDS,$sendData);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response  = curl_exec($ch);

        // Close curl
        curl_close($ch);

        // See response if data is posted successfully or any error
        return $response;
    }

    public function updatePost($id, $data)
    {
        $sendData = json_encode($data);
        $url = "https://jsonplaceholder.typicode.com/posts/".$id;
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($sendData)));

        // SET Method as a PUT
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

        // Pass user data in POST command
        curl_setopt($ch, CURLOPT_POSTFIELDS,$sendData);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute curl and assign returned data
        $response  = curl_exec($ch);

        // Close curl
        curl_close($ch);

        // See response if data is posted successfully or any error
        return $response;


    }

    public function deletePost($id)
    {
        $data = array();
        $sendData =  json_encode($data);
        $url = "https://jsonplaceholder.typicode.com/posts/".$id;

        $ch = curl_init();
        //option delete
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $sendData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // execute
        $response = curl_exec($ch);

        curl_close($ch);
        return $response;
    }

}