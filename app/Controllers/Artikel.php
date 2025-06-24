<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class Artikel extends BaseController
{
    public function index()
    {
        $model = new ArtikelModel();
        $data['artikel'] = $model->findAll();
        $data['title'] = "Daftar Artikel";
        return view('artikel/index', $data);
    }

    public function view($slug)
    {
        $model = new ArtikelModel();
        $artikel = $model->where(['slug' => $slug])->first();

        if (!$artikel) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Artikel tidak ditemukan.');
        }

        $data['title'] = $artikel['judul'];
        $data['artikel'] = $artikel;

        return view('artikel/detail', $data);
    }
    public function admin_index()
    {
        $model = new ArtikelModel();
        $data['artikel'] = $model->findAll();
        $data['title'] = 'Admin - Daftar Artikel';

        return view('artikel/admin_index', $data);
    }
    public function add()
    {
        helper(['form', 'url']);
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'uploaded[gambar]|is_image[gambar]|max_size[gambar,2048]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('artikel/form_add', [
                'title' => 'Tambah Artikel',
                'validation' => $validation
            ]);
        }

        $file = $this->request->getFile('gambar');
        $namaGambar = '';

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $namaGambar = $file->getRandomName();
            $file->move('gambar', $namaGambar);
        }

        $model = new ArtikelModel();
        $model->save([
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'slug' => url_title($this->request->getPost('judul'), '-', true),
            'gambar' => $namaGambar,
            'status' => 1
        ]);

        return redirect()->to('/admin/artikel');
    }


    public function edit($id)
    {
        helper(['form', 'url']);
        $model = new ArtikelModel();
        $data = $model->find($id);

        $validation = \Config\Services::validation();
        $validation->setRules(['judul' => 'required', 'isi' => 'required']);

        if ($this->request->getMethod() === 'post' && $validation->withRequest($this->request)->run()) {
            $file = $this->request->getFile('gambar');
            $namaGambar = $data['gambar']; // default: gambar lama

            if ($file && $file->isValid() && !$file->hasMoved()) {
                $namaGambar = $file->getRandomName();
                $file->move('gambar', $namaGambar);
            }

            $model->update($id, [
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('isi'),
                'gambar' => $namaGambar
            ]);

            return redirect()->to('/admin/artikel');
        }

        return view('artikel/form_edit', [
            'title' => 'Edit Artikel',
            'data' => $data,
            'validation' => $validation ?? null
        ]);
    }

    public function delete($id)
    {
        $artikel = new ArtikelModel();
        $artikel->delete($id);

        return redirect()->to('/admin/artikel');
    }

}
