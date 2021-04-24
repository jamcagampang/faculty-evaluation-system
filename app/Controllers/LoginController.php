<?php

namespace App\Controllers;

use App\Models\Admin;
use App\Models\Faculty;
use App\Models\Student;

class LoginController extends BaseController
{

    public function login()
    {

        $type = $this->request->getVar('type');
        $username = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        switch ($type) {
            case '0':

                $Admin = new Admin();

                $record = $Admin->where(array('username' => $username, 'password' => md5($password)))->first();

                if (!isset($record)) {
                    return redirect()->to('home');
                }

                $_SESSION['type'] = $type;
                $_SESSION['id'] = $record['id'];

                return redirect()->to('admin');
            case '1':

                $Faculty = new Faculty();

                $record = $Faculty->where(array('email_address' => $username, 'password' => md5($password)))->first();

                if (!isset($record)) {
                    return redirect()->to('home');
                }

                $_SESSION['type'] = $type;
                $_SESSION['id'] = $record['id'];

                return redirect()->to('faculty');
            case '2':

                $Student = new Student();

                $record = $Student->where(array('email_address' => $username, 'password' => md5($password)))->first();

                if (!isset($record)) {
                    return redirect()->to('home');
                }

                $_SESSION['type'] = $type;
                $_SESSION['id'] = $record['id'];

                return redirect()->to('student');
        }

        return redirect()->to('home');
    }
}
