<?php

namespace App\Controllers;

use App\Models\BookModel;

class Book extends BaseController
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
        return view('pages/home', $data);
    }

    public function getBook()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'dataBook' => $this->bookModel->getBook()
            ];

            $msg = [
                'data' => view('pages/databook', $data)
            ];
            echo json_encode($msg);
        } else {
            exit("Access denied");
        }
    }
    public function addBook()
    {

        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'titleInput' => [
                    'label' => 'Title',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'authorInput' => [
                    'label' => 'Author',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'publisherInput' => [
                    'label' => 'Publisher',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
            ]);

            // $rules = [
            //     'coverInput' => [
            //         'label' => 'Cover',
            //         'rules' => 'uploaded[coverInput]|is_image[coverInput]|max_size[coverInput,1024]',
            //         'errors' => [
            //             'uploaded' => 'Silakan masukan {field}'
            //         ]
            //     ]
            // ];

            if (!$valid) {
                $msg = [
                    'error' => [
                        'titleInput' => $validation->getError('titleInput'),
                        'authorInput' => $validation->getError('authorInput'),
                        'publisherInput' => $validation->getError('publisherInput'),
                    ]
                ];

                echo json_encode($msg);
            } else {

                $file = $this->request->getFile('coverInput');
                if ($file->isValid() && !$file->hasMoved()) {
                    $imageName = $file->getRandomName();
                    $file->move('uploads/', $imageName);
                }
                $filepath = base_url() . "/uploads/" . $imageName;

                $data = [
                    "title" => $this->request->getPost('titleInput'),
                    "writer" => $this->request->getPost('authorInput'),
                    "publisher" => $this->request->getPost('publisherInput'),
                    "cover" =>  $imageName,
                    "sipnosis" => $this->request->getPost('sipnosisInput'),
                ];

                session()->setFlashdata('filepath', $filepath);
                $this->bookModel->save($data);
                // $data = [
                //     "title" => $this->request->getPost('titleInput'),
                //     "writer" => $this->request->getPost('authorInput'),
                //     "publisher" => $this->request->getPost('publisherInput'),
                //     "cover" => $this->request->getPost('coverInput') ?: 'https://d28hgpri8am2if.cloudfront.net/book_images/onix/cvr9781507216514/make-your-own-manga-9781507216514_hr.jpg',
                //     "sipnosis" => $this->request->getPost('sipnosisInput'),
                // ];

                // session()->setFlashdata('message', 'Berhasil menambahkan buku.');
                // $this->bookModel->newBook($data);

                $msg = [
                    'success' => 'Data berhasil tersimpan'
                ];
            }
            echo json_encode($msg);
        }
    }
    public function updateBook()
    {

        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'titleInput' => [
                    'label' => 'Title',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'authorInput' => [
                    'label' => 'Author',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'publisherInput' => [
                    'label' => 'Publisher',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
            ]);

            if (!$valid) {

                $msg = [
                    'error' => [
                        'titleInput' => $validation->getError('titleInput'),
                        'authorInput' => $validation->getError('authorInput'),
                        'publisherInput' => $validation->getError('publisherInput'),
                    ]
                ];

                echo json_encode($msg);
            } else {
                $id = $this->request->getPost('id-book');
                $item = $this->bookModel->find($id);
                $old_image = $item['cover'];

                $file = $this->request->getFile('coverInput');
                if ($file->isValid() && !$file->hasMoved()) {
                    if (file_exists("uploads/" . $old_image)) {
                        unlink("uploads/" . $old_image);
                    }
                    $imageName = $file->getRandomName();
                    $file->move('uploads/', $imageName);
                } else {
                    $imageName = $old_image;
                }

                $data = [
                    "title" => $this->request->getPost('titleInput'),
                    "writer" => $this->request->getPost('authorInput'),
                    "publisher" => $this->request->getPost('publisherInput'),
                    "cover" => $imageName,
                    "sipnosis" => $this->request->getPost('sipnosisInput'),
                ];

                session()->setFlashdata('message', 'Berhasil menambahkan buku.');
                $this->bookModel->updateBook($data, $id);

                $msg = [
                    'success' => 'Data berhasil tersimpan'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $this->bookModel->delete($id);

            $msg = [
                'success' => "Book has been successfully deleted!"
            ];
            echo json_encode($msg);
        }
    }
}
