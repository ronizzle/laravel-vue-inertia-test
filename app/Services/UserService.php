<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function truncateUsersTable()
    {
        User::truncate();
    }

    public function getUser(int $id) : User
    {
        return User::find($id);
    }

    public function createUser(array $properties) : User
    {
        $user = User::create([
            'name' => $properties['name'],
            'email' => $properties['email'],
            // This is just a placeholder to prevent constraint
            'password' => bcrypt('Welcome1!'),
            'username' => $properties['username'],
            'phone' => $properties['phone'],
            'website' => $properties['website'],
            'company_name' => $properties['company_name'],
            'company_catch_phrase' => $properties['company_catch_phrase'],
            'company_bs' => $properties['company_bs'],
            'address_street' => $properties['address_street'],
            'address_suite' => $properties['address_suite'],
            'address_city' => $properties['address_city'],
            'address_zipcode' => $properties['address_zipcode'],
            'address_geo_lat' => $properties['address_geo_lat'],
            'address_geo_lng' => $properties['address_geo_lng'],
        ]);

        return $user;
    }

    public function getUsers() {
        return User::all();
    }
}
