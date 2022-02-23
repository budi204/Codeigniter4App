<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
      $data = [
        'title' => 'Home Page'
      ];
      return view('pages/index', $data);
    }
    public function about() {
      $data = [
        'title' => 'About Page'
      ];
      return view('pages/about', $data);
    }
    public function contact() {
      $data = [
        'title' => 'Contact Us',
        'alamat' => [
          [
            'alamat' => 'Rumah',
            'jalan' => 'Jl. abc No. 123',
            'kota' => 'Serang'
          ],
          [
            'alamat' => 'Kantor',
            'jalan' => 'Jl. def No. 456',
            'kota' => 'Jakarta'
          ]
        ]
      ];

      return view('pages/contact', $data);

    }
}
