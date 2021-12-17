<?php

namespace App\Controllers;

use \Myth\Auth\Models\UserModel;
use App\Models\PiketModel;
class Home extends BaseController
{

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->piketModel = new PiketModel();
    }

    public function babinsa()
    {
        $data = [
            'title' => 'Babinsa',
            'babinsas' =>  $this->userModel->getAllMember()

        ];
        return view('babinsa/index', $data);
    }

    public function piket()
    {
        $data = [
            'title' => 'Piket',
            'pikets' =>  $this->piketModel->getPiketSchedule(),
        ];
        return view('piket/index', $data);
    }
    
}
