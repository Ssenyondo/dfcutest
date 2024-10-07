<?php

/**
 * @author William Ssenyondo
 * @email sseywilliam@gmail.com
 * @create date 2024-10-05 13:45:11
 * @modify date 2024-10-05 13:45:11
 * @desc [description]
 */

 namespace App\Helpers;

 if (!function_exists('check_base64_image')) {
     function check_base64_image($image)
     {
        try {
            $imageData = base64_decode($image);
            $f = finfo_open();
            $mime_type = finfo_buffer($f, $imageData, FILEINFO_MIME_TYPE);
            finfo_close($f);
    
            if (strpos($mime_type, 'image/') !== 0) {
                throw new \Exception('Invalid image format');
            }
    
            return true;
        } catch (\Exception $e) {
            log_message('error', 'Error validating base64 image: ' . $e->getMessage());
            return false;
        }
     }
 }

if (!function_exists('employeeNumber')) {
    function employeeNumber()
    {
        $length = 10;
        $password = '';
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        for ($i = 0; $i < $length; $i++) {
            $randomIndex = rand(0, strlen($characters) - 1);
            $password .= $characters[$randomIndex];
        }

        return $password;
    }
}



