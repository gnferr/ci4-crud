<?php

namespace App\Controllers;


class User extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Homepage'
        ];
        return view('pages/user/home', $data);
    }
}
