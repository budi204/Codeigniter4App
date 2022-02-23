<?php

namespace App\Controllers;
use App\Models\BookModel;

class Books extends BaseController
{
    protected $books;

    public function __construct() {
        $this->books = new BookModel;
    }

    public function index()
    {
        $books = $this->books->findAll();

        $data = [
            'title' => 'Book',
            'books' => $books,
        ];

        //cara konek tanpa model
        // $db = \Config\Database::connect();
        // $books = $db->query("SELECT * FROM books");
        // foreach($books->getResultArray() as $book) {
        //     d($book);
        // }

        return view('books/index', $data);
    }
}
