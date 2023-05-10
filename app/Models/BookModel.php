<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table      = 'book';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'writer', 'publisher', 'cover', 'sipnosis'];

    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    public function getBook($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function newBook($data)
    {
        return $this->db->table('book')->insert($data);
    }
    public function updateBook($data, $id)
    {
        return $this->db->table('book')->update($data, ['id' => $id]);
    }
}
