<?php

namespace App\Controllers;

use App\Models\BookModel;

class Upload extends BaseController
{
    protected $bookModel;
    public function __construct()
    {
        $this->bookModel = new BookModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Home | CRUD'
        ];
        return view('pages/uploadgbr', $data);
    }

    public function upload()
    {
        $file = $this->request->getFile('coverInput');
        if ($file->isValid() && !$file->hasMoved()) {
            $imageName = $file->getRandomName();
            $file->move('uploads/', $imageName);
        }

        $data = [
            "title" => $this->request->getPost('titleInput'),
            "writer" => $this->request->getPost('authorInput'),
            "publisher" => $this->request->getPost('publisherInput'),
            "cover" =>  $imageName,
            "sipnosis" => $this->request->getPost('sipnosisInput'),
        ];

        $this->bookModel->save($data);
        return redirect()->to('/')->with('success', 'Success Add Data');
    }
}
