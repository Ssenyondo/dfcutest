<?php

/**
 * @author William Ssenyondo
 * @email sseywilliam@gmail.com
 * @create date 2024-10-04 17:08:50
 * @modify date 2024-10-04 17:08:50
 * @desc Home controller to load first views
 */

 namespace App\Controllers;
 use CodeIgniter\HTTP\RequestInterface;
 use CodeIgniter\HTTP\ResponseInterface;

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct()
    {
        helper(['form','url']);
    }

    public function index()
    {
        $data['title'] = 'dfcu HR | Client App';

        return view('register_temp', $data);
    }

    //Make POST to API
    public function sendJsonData()
    {
        // Get the request data
        $requestData = $this->request->getPost();

         // Get the image data from the request
        $image = $this->request->getFile('emp_photo');

        // Add the image data to the request
        $data['image'] = $image;

        // Date ISO-8601
        $date_format = date('Y-m-d', strtotime($requestData['emp_dob'])); 

        //API requests connection & mock keys
        $client = \Config\Services::curlrequest();

        $apiKey = 'williamssenyondo';
        $apiToken = '256779610327';

        $url = env('regapi.baseUrl').'staff';

        // Check if the image is uploaded
        if ($image->isValid() && !$image->hasMoved()) {
            
            // Get the image extension
            $imageExtension = $image->getExtension();

            // Create a unique filename
            $uniqueFilename = uniqid() . '.' . $imageExtension;

            // Move the image to the uploads folder
            $image->move(ROOTPATH . 'uploads', $uniqueFilename);

            // Get the image path
            $imagePath = ROOTPATH . 'uploads/' . $uniqueFilename;

            // Convert the image to base64
            $base64Image = base64_encode($uniqueFilename);

            $data = [
                'api_key' => $apiKey,
                'api_token' => $apiToken,
                'data' => [
                    'surname' => $requestData['emp_surname'],
                    'othername' => $requestData['emp_othername'],
                    'dob' => date('Y-m-d', strtotime($requestData['emp_dob'])),
                    'photo' =>  $base64Image
                ]
            ];

            $response = $client->request('POST', $url, [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'json' => $data
            ]);
    
            // Check if the API request was successful
            if ($response->getStatusCode() == 200) {

                // Return a response
                $responseBody = $response->getBody();
                $data = json_decode($responseBody, true);

                // Access the extracted data
                session()->setFlashdata('message', $data['message']);
                session()->setFlashdata('alert-class', 'alert-info');

                $data['title'] = 'dfcu HR | Client App';

                return view('register_temp', $data);

            } else {
                // API request failed, do something else
            }
        } else {

            $data['title'] = 'dfcu HR | Client App';

            // Handle the case where the image is not uploaded
            $data = [
                'api_key' => $apiKey,
                'api_token' => $apiToken,
                'data' => [
                    'surname' => $requestData['emp_surname'],
                    'othername' => $requestData['emp_othername'],
                    'dob' => date('Y-m-d', strtotime($requestData['emp_dob'])),
                    'photo' =>  'N/A'
                ]
            ];

            $response = $client->request('POST', $url, [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'json' => $data
            ]);
    
            // Check if the API request was successful
            if ($response->getStatusCode() == 200) {

                // Return a response
                $responseBody = $response->getBody();
                $data = json_decode($responseBody, true);

                // Access the extracted data
                session()->setFlashdata('message', $data['message']);
                session()->setFlashdata('alert-class', 'alert-info');
            }


            return view('register_temp', $data);
        }
        
    }

    public function edituser(): string
    {
        $data['title'] = 'dfcu HR | Client App';

        return view('edit_temp', $data);
    }

    public function login_page()
    {
        $data['title'] = 'dfcu HR | API';
        return view('auth_temp', $data);
    }

     //Make PUT to API
     public function editJsonData()
     {
         // Get the request data
         $requestData = $this->request->getPost();
 
          // Get the image data from the request
         $image = $this->request->getFile('emp_photo');
 
         // Add the image data to the request
         $data['image'] = $image;
 
         // Date ISO-8601
         $date_format = date('Y-m-d', strtotime($requestData['emp_dob'])); 
 
         //API requests connection & mock keys
         $client = \Config\Services::curlrequest();
 
         $apiKey = 'williamssenyondo';
         $apiToken = '256779610327';
 
         $url = env('upapi.baseUrl').'staff/'.$requestData['emp_id'];
 
         // Check if the image is uploaded
         if ($image->isValid() && !$image->hasMoved()) {
             
             // Get the image extension
             $imageExtension = $image->getExtension();
 
             // Create a unique filename
             $uniqueFilename = uniqid() . '.' . $imageExtension;
 
             // Move the image to the uploads folder
             $image->move(ROOTPATH . 'uploads', $uniqueFilename);
 
             // Get the image path
             $imagePath = ROOTPATH . 'uploads/' . $uniqueFilename;
 
             // Convert the image to base64
             $base64Image = base64_encode($uniqueFilename);
 
             $data = [
                 'api_key' => $apiKey,
                 'api_token' => $apiToken,
                 'data' => [
                    'id' => $requestData['emp_id'],
                    'dob' => date('Y-m-d', strtotime($requestData['emp_dob'])),
                    'photo' =>  $base64Image
                 ]
             ];

             $response = $client->request('PUT', $url, [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'json' => $data
            ]);
            
            // Check if the API request was successful
            if ($response->getStatusCode() == 200) {
                
                session()->setFlashdata('message', 'Details updated successfully');
                session()->setFlashdata('alert-class', 'alert-info');
    
                $data['title'] = 'dfcu HR | Client App';
    
                return view('edit_temp', $data);
    
            } else {
                // API request failed, do something else
            }
         }else{

            $data['title'] = 'dfcu HR | Client App';

            // Handle the case where the image is not uploaded
            $data = [
                'api_key' => $apiKey,
                'api_token' => $apiToken,
                'data' => [
                    'surname' => $requestData['emp_surname'],
                    'othername' => $requestData['emp_othername'],
                    'dob' => date('Y-m-d', strtotime($requestData['emp_dob'])),
                    'photo' =>  'N/A'
                ]
            ];
    
            $response = $client->request('PUT', $url, [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'json' => $data
            ]);
            
            // Check if the API request was successful
            if ($response->getStatusCode() == 200) {
    
                // Return a response
                $responseBody = $response->getBody();
                $data = json_decode($responseBody, true);
    
                // Access the extracted data
                session()->setFlashdata('message', $data['message']);
                session()->setFlashdata('alert-class', 'alert-info');
            }
    
            return view('edit_temp', $data);

         }
     }
}
