<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
      $data = [
        'title' => 'Home Page'
      ];
      echo view('layouts/header', $data);
      echo view('pages/index');
      echo view('layouts/footer');
    }
    public function about() {
      $data = [
        'title' => 'About Page'
      ];
      echo view('layouts/header', $data);
      echo view('pages/about');
      echo view('layouts/footer');
    }
}
