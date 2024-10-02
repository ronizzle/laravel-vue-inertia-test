<?php

namespace App\Services;

use App\Libraries\TypicodeApi;

class TypicodeService
{
    public function __construct(
        private readonly TypicodeApi $typicodeApi,
        private readonly UserService $userService,
        private readonly PostService $postService
    )
    {

    }

    public function depopulateTypicodeTables()
    {
        $this->postService->truncatePostsTable();;
        $this->userService->truncateUsersTable();
    }

    public function syncUsers()
    {
        $users = $this->typicodeApi->getUsers();
        foreach($users as $user) {
            $this->userService->createUser([
                'name' => $user['name'],
                'username' => $user['username'],
                'email' => $user['email'],
                'address_street' => $user['address']['street'],
                'address_suite' => $user['address']['suite'],
                'address_city' => $user['address']['city'],
                'address_zipcode' => $user['address']['zipcode'],
                'address_geo_lat' => $user['address']['geo']['lat'],
                'address_geo_lng' => $user['address']['geo']['lng'],
                'phone' => $user['phone'],
                'website' => $user['website'],
                'company_name' => $user['company']['name'],
                'company_catch_phrase' => $user['company']['catchPhrase'],
                'company_bs' => $user['company']['bs']
            ]);
        }
    }

    public function syncPosts()
    {
        $posts = $this->typicodeApi->getPosts();
        foreach($posts as $post) {
            $user = $this->userService->getUser($post['userId']);
            $this->postService->createPost($user, [
                'title' => $post['title'],
                'body' => $post['body']
            ]);
        }
    }
}
