<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function registrationapi()
    {
        $data['title'] = 'dfcu HR API | Registration';
        return view('api_welcome');
    }

    
}

