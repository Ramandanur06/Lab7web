<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function about()
    {
        return view('about', [
        'title' => 'Halaman About',
        'content' => 'Ini adalah halaman about yang menjelaskan tentang isi halaman ini.'
    ]);
    }
    public function contact()
    {
    return view('contact', [
        'title' => 'Halaman Kontak',
        'content' => 'Ini adalah halaman kontak. Kamu bisa hubungi kami di email@example.com.'
    ]);
    }

    public function faqs()
    {
    return view('faqs', [
        'title' => 'Halaman FAQ',
        'content' => 'Ini adalah halaman FAQ. Pertanyaan yang sering ditanyakan akan muncul di sini.'
    ]);
    }

}

