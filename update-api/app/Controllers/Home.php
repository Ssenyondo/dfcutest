<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use \Firebase\JWT\JWT;
use CodeIgniter\Core\Security;

class Home extends ResourceController
{
    protected $modelName = 'App\Models\User';
    protected $format    = 'json';
    private $security;

    public function __construct()
    {
        $this->security = service('security');
    }

    public function index(): string
    {
        return view('welcome_message');
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
    */

    public function update($id = null)
{
    $validation = \Config\Services::validation();
    $json = $this->request->getJSON();
    $model = model($this->modelName);

    $rules = [
        'dob' => 'required|regex_match[/^\d{4}-\d{2}-\d{2}$/]',
        'photo' => 'required',
        'number' => 'required|min_length[10]|max_length[10]|is_unique[employees.staff_number]'
    ];

    $messages = [
        'dob' => [
            'label' => 'Date of birth',
            'required' => 'Date of birth is required',
            'regex_match' => 'Invalid date format. Please use YYYY-MM-DD'
        ],
        'photo' => [
            'label' => 'Photo',
            'required' => 'Provide a base64 photo string'
        ],
        'number' => [
            'label' => 'Employee number',
            'min_length' => 'Employee number must be at least 10 characters long',
            'max_length' => 'Employee number must not be more than 10 characters long',
            'is_unique' => 'Employee number already exists'
        ],
    ];

    if (!$this->validate($rules, $messages)) {
        $response = [
            'status' => 400,
            'error' => true,
            'message' => 'Validation errors',
            'data' => $this->validator->getErrors()
        ];
        return $this->respond($response, 400);
    } else {
        $data = [
            'staff_dob' => $this->request->getVar('dob'),
            'staff_photo' => $this->request->getVar('photo')
        ];

        if (!$model->where('staff_number', $id)->set($data)->update()) {
            $response = [
                'errors' => $model->errors(),
                'message' => 'Invalid Inputs'
            ];
            return $this->respond($response, 409);
        }

        $response = [
            'status' => 201,
            'error' => false,
            'message' => 'Employee date of birth & photo updated',
        ];
        return $this->respond($response, 201);
    }
}

}
