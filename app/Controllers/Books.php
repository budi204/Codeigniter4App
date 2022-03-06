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
        // $books = $this->books->findAll();

        $data = [
            'title' => 'Book',
            'books' => $this->books->getBook(),
        ];

        //cara konek tanpa model
        // $db = \Config\Database::connect();
        // $books = $db->query("SELECT * FROM books");
        // foreach($books->getResultArray() as $book) {
        //     d($book);
        // }

        return view('books/index', $data);
    }

    public function create() {
        $data = [
            'title' => 'Create',
            'validation' => \Config\Services::validation()
        ];

        return view('books/create', $data);
    }

    public function detail($slug) {
        $data = [
            'title' => 'Detail',
            'book' => $this->books->getBook($slug),
        ];

        //jika book tidak ada di table
        if(empty($data['book'])) {
            throw new \CodeIgniter\exceptions\PageNotFoundException('Data not Found');
        }

        return view('books/detail', $data);
    }

    public function save() {
        // validasi input
        if(!$this->validate([
            'title' => [
                'rules' => 'required|is_unique[books.title]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
                ],
            'cover' => [
                'rules' => 'max_size[cover,2048]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar, maksimal 2MB',
                    'is_image' => 'File yang anda pilih bukan gambar',
                    'mime_in' => 'Format gambar tidak sesuai'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to(base_url('/book/create'))->withInput()->with('validation', $validation);
            return redirect()->to(base_url('/book/create'))->withInput();
        }

        //ambil gambar
        $fileImage = $this->request->getFile('cover');
        //cek apakah ada gambar yang diupload
        //code 4 artinya tidak ada file yang diupload
        if($fileImage->getError() == 4) {
            $coverName = 'default.jpg';
        } else {
            //generate nama random
            $coverName = $fileImage->getRandomName();

            //pindah gambar ke folder public/img
            $fileImage->move('img', $coverName);
        }


        $slug = url_title($this->request->getVar('title'), '-', true);

         $this->books->save([
             'title' => $this->request->getVar('title'),
             'slug' => $slug,
             'cover' => $coverName,
             'publisher' => $this->request->getVar('publisher')
         ]);

         session()->setFlashData('message', 'Book added');

         return redirect()->to(base_url('/book'));
    }

    public function delete($id) {
        //cari gambar berdasarkan id
        $bookCover = $this->books->find($id);
        //hapus gambar
        if($bookCover['cover'] != 'default.jpg') {
            unlink('img/' . $bookCover['cover']);
        }

        $this->books->delete($id);

        session()->setFlashdata('message', 'Book deleted');

        return redirect()->to(base_url('/book'));
    }

    public function edit($slug) {
        $data = [
            'title' => 'Edit Book',
            'book' => $this->books->getBook($slug),
            'validation' => \Config\Services::validation()
        ];

        return view('books/edit', $data);
    }

    public function update($id) {
        //cek judul
        $oldData = $this->books->getBook($this->request->getVar('slug'));

        if($oldData['title'] == $this->request->getVar('title')) {
            $rule_title = 'required';
        } else {
            $rule_title = 'required|is_unique[books.title]';
        }

        if(!$this->validate([
            'title' => [
                'rules' => $rule_title,
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
                ],
            'cover' => [
                'rules' => 'max_size[cover,2048]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar, maksimal 2MB',
                    'is_image' => 'File yang anda pilih bukan gambar',
                    'mime_in' => 'Format gambar tidak sesuai'
                ]
            ]
        ])) {
            return redirect()->to('/book/edit/' . $oldData['slug'])->withInput();
        }

        //ambil gambar
        $oldCover = $this->request->getVar('oldCover');
        $newCover = $this->request->getFile('cover');
        //cek apakah gambar berubah
        if($newCover->getError() == 4) {
            $coverName = $oldCover;
        } else {
            //generate nama random
            $coverName = $newCover->getRandomName();
            //pindahkan gambar ke folder public/img
            $newCover->move('img', $coverName);
            //hapus gambar lama
            if($oldCover != 'default.jpg') {
                unlink('img/'. $oldCover);
            }
        }
        

        $slug = url_title($this->request->getVar('title'), '-', true);

        $this->books->save([
            'id' => $id,
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'cover' => $coverName,
            'publisher' => $this->request->getVar('publisher'),
        ]);
        

        session()->setFlashdata('message', 'Book updated');

        return redirect()->to('/book');
    }
}
