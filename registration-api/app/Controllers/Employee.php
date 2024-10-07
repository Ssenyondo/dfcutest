<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use \Firebase\JWT\JWT;
use CodeIgniter\Core\Security;

class Employee extends ResourceController
{

    protected $modelName = 'App\Models\EmployeeRegistration';
    protected $format    = 'json';
    private $security;

    public function __construct()
    {
        $this->security = service('security');
    }

    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $request = \Config\Services::request();
        $response = \Config\Services::response();

        //Receive JSON data
        $json = $request->getJSON();

        if (empty($json)) {
            return $response->setStatusCode(400)->setJSON(['error' => 'Invalid JSON data']);
        }

        // Get the key and values from the stdClass Object
        $data_json = [];
        foreach ($json as $key => $value) {
            if (is_object($value)) {
                foreach ($value as $subKey => $subValue) {
                    $data_json[$subKey] = $subValue;
                }
            } else {
                $data_json[$key] = $value;
            }
        }

        // Validate the API key and token
        if ($data_json['api_key'] !== 'williamssenyondo' || $data_json['api_token'] !== '256779610327') {
            return $response->setStatusCode(401)->setJSON(['error' => 'Invalid API key or token']);
        }

        $response = [
            'message' => 'success',
            'all_employees_data' => $this->model->findAll()
        ];
        
        return $this->respond($response, 200);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        $data = $this->model->find($id);
        if(is_null($data)) {
            return $this->fail(['error' => 'Employee does not exist'], 404);
        }
 
        return $this->respond($data, 200);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create2()
    {
        $request = \Config\Services::request();
        $response = \Config\Services::response();

        $validation = \Config\Services::validation();

        if ($request->getMethod() !== 'POST') {
            return $response->setStatusCode(405)->setJSON(['error' => 'Method not allowed']);
        }
         
        $json = $this->request->getJSON();
        if (empty($json)) {
            return $response->setStatusCode(400)->setJSON(['error' => 'Invalid JSON data']);
        }

        $rules = [
			'surname' => 'required|min_length[3]',
			'othername' => 'required|min_length[3]',
			'dob' => 'required|regex_match[/^\d{4}-\d{2}-\d{2}$/]'
		];

        $messages = [
			'surname' => [
                'label' => 'Surname',
				'required' => 'Surname is required',
                'min_length' => 'Surname must be at least 3 characters long'
			],
            'othername' => [
                'label' => 'Other name(s)',
				'required' => 'Other name is required',
                'min_length' => 'Other name must be at least 3 characters long'
			],
			'dob' => [
                'label' => 'Date of birth',
                'required' => 'Date of birth is required',
                'regex_match' => 'Invalid date format. Please use YYYY-MM-DD'
			],
		];

        if (!$this->validate($rules, $messages)) {

			$response = [
				'status' => 200,
				'error' => true,
				'message' => 'Errors',
				'data' => $this->validator->getErrors()
			];
		} else {

            $staffnumber = substr(uniqid(), 0, 10);

            $data = [
                'staff_surname' =>  $json->surname,
                'staff_othername' => $json->othername,
                'staff_dob' => $json->dob,
                'staff_number' => $staffnumber,
                'staff_photo' => !empty($json->photo) ? $json->photo : 'N/A'
            ];

            if ($this->model->insert($data) === false){
             
                $response = [
                    'errors' => $this->model->errors(),
                    'message' => 'Invalid Inputs'
                ];
     
                return $this->fail($response , 409);
            }

            $response = [
				'status' => 201,
				'error' => false,
				'message' => $staffnumber,
			];

        }

        return $this->respond($response);

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
				'status' => 200,
				'error' => true,
				'message' => 'Errors',
				'data' => $this->validator->getErrors()
			];
		} else {

            $data = [
                'staff_dob' => $this->request->getVar('dob'),
                'staff_photo' => $this->request->getVar('photo')
            ];

            if ($this->model->where('id', $id)->set($data)->update() === false)
            {
                $response = [
                    'errors' => $this->model->errors(),
                    'message' => 'Invalid Inputs'
                ];
                return $this->fail($response , 409);
            }

            $response = [
				'status' => 201,
				'error' => false,
				'message' => 'Employee date of birth & photo updated',
			];

        }

        return $this->respond($response);
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        $this->model->delete($id);
        return $this->respond(['message' => 'Deleted Successfully'], 200);
    }

    //Api endpoint to receive data and save
    public function create(){

        $request = \Config\Services::request();
        $response = \Config\Services::response();

        if ($request->getMethod() !== 'POST') {
            return $response->setStatusCode(405)->setJSON(['error' => 'Method not allowed']);
        }

        //Receive JSON data
        $json = $request->getJSON();

        if (empty($json)) {
            return $response->setStatusCode(400)->setJSON(['error' => 'Invalid JSON data']);
        }

        // Get the key and values from the stdClass Object
        $data_json = [];
        foreach ($json as $key => $value) {
            if (is_object($value)) {
                foreach ($value as $subKey => $subValue) {
                    $data_json[$subKey] = $subValue;
                }
            } else {
                $data_json[$key] = $value;
            }
        }

        // Validate the API key and token
        if ($data_json['api_key'] !== 'williamssenyondo' || $data_json['api_token'] !== '256779610327') {
            return $response->setStatusCode(401)->setJSON(['error' => 'Invalid API key or token']);
        }

        // Process the JSON data here
        $staffnumber = substr(uniqid(), 0, 10);

        // Date ISO-8601
        $date_format = date('Y-m-d', strtotime($data_json['dob'])); 

        $data = [
            'staff_surname' =>  $data_json['surname'],
            'staff_othername' => $data_json['othername'],
            'staff_dob' => $date_format,
            'staff_number' => $staffnumber,
            'staff_photo' => !empty($data_json['photo']) ? $data_json['photo'] : 'N/A'
        ];

         // Save the data to the database
        if ($this->model->insert($data) === false){
            $response = [
                'errors' => $this->model->errors(),
                'message' => 'Invalid Inputs'
            ];
 
            return $this->fail($response , 409);
        }

        // Return a response
        return $response->setStatusCode(200)->setJSON(['message' => 'Employee number: '.$staffnumber]);
    }
}
