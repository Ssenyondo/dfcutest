<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Faker\Factory;

use App\Models\EmployeeRegistration;

class FakerController extends BaseController
{
    public function createFakeData()
    {
        $faker = Factory::create();

        $employeeModel = new EmployeeRegistration();

        for ($i = 0; $i < 10; $i++) {

            $data = [
                'staff_surname' => $faker->firstName,
                'staff_othername' => $faker->lastName,
                'staff_date_of_birth' => $faker->date,
                'staff_number' => $faker->randomNumber(5, true)
            ];

            $employeeModel->insert($data);
        }

        return redirect()->to('/')->with('success', 'Fake data created successfully!');
    }
}
