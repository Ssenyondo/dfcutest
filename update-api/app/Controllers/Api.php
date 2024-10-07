<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use \Firebase\JWT\JWT;
use CodeIgniter\Core\Security;
use App\Models\User;

class Api extends ResourceController
{
    public function index(): string
    {
        return view('api_welcome');
    }

    public function updateData()
    {
        $request = \Config\Services::request();
        $json = $request->getJSON();

        if (!$json) {
            return $this->fail('Invalid JSON data');
        }

        print_r($json);

        $data = [
            'column1' => $json->column1,
            'column2' => $json->column2,
            // Add more columns as needed
        ];

        

        return $this->respond(['message' => 'Data updated successfully']);
    }

    
}
