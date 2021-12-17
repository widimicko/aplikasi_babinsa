<?php

namespace App\Controllers;

use \Myth\Auth\Models\UserModel;

class Home extends BaseController
{

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Babinsa',
            'babinsas' =>  $this->userModel->getAllMember()

        ];
        return view('babinsa/index', $data);
    }
    
}
