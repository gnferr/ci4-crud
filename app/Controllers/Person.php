<?php

namespace App\Controllers;

use App\Models\PersonModel;

class Person extends BaseController
{

    protected $personModel;
    public function __construct()
    {
        $this->personModel = new PersonModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Person Data | CRUD'
        ];
        return view('pages/person/home', $data);
    }
    public function getPerson()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'dataPerson' => $this->personModel->findAll()
            ];

            $msg = [
                'data' => view('pages/person/dataperson', $data)
            ];
            echo json_encode($msg);
        } else {
            exit("Access denied");
        }
    }
}
