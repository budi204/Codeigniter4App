<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'books';
    protected $useTimestamps = true;
    protected $allowedFields = ['title', 'slug', 'publisher', 'cover'];

    public function getBook($slug = false) {
        if($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}