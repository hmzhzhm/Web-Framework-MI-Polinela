<?php

namespace App\Controllers;

use App\Controllers\BaseController;

//step 1
use App\Models\FilmModel;
use App\Models\GenreModel; //tambahkan 1
class Film extends BaseController
{
    //step 2
    protected $film;
    protected $genre; //tambahkan 2
    //step 3 buat fungsi construct untuk inisiasi class model
    public function __construct()
    {
        //step 4
        $this->film = new FilmModel();
        $this->genre = new GenreModel(); //tambahkan 3
    }

    public function index()
    {
        $data['data_film'] = $this->film->getAllDataJoin();
        return view("film/index", $data);
        // dd($this->film->getFilm());
    }

    public function all(){
        $data['semuafilm'] = $this->film->getAllDataJoin();
        return view("film/semuafilm", $data);
        // dd($this->film->getAllData());
    }

    public function add()
    {
       $data["genre"] = $this->genre->getAllData();
       $data["errors"] = session('errors');
       return view("film/add", $data);
    }

    public function update($id)
    {
        $decryptedId = decryptUrl($id);
        $data["genre"] = $this->genre->getAllData();
        $data["errors"] = session('errors');
        $data["film"] = $this->film->getDataByID($decryptedId);
        return view("film/edit", $data);
    }

    public function destroy($id)
    {
        $decryptedId = decryptUrl($id);
        $this->film->delete($decryptedId);
        session()->setFlashdata('success', 'Data berhasil dihapus.');

        return redirect()->to('/film');
    }

    public function edit()
    {
        $validation = $this->validate([
            'nama_film' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Nama Film Harus diisi'
                ]
            ],
            'id_genre'  => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Genre Harus diisi'
                ]
            ],
            'duration'  => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Durasi Harus diisi'
                ]
            ],
            // mengubah rules
            'cover'     => [
                'rules' => 'mime_in[cover,image/jpg,image/jpeg,image/png]|max_size[cover,2048]',
                'errors' => [
                    'mime_in' => 'Tipe file pada Kolom Cover harus berupa JPG, JPEG, atau PNG',
                    'max_size' => 'Ukuran file pada Kolom Cover melebihi batas maksimum'
                ]
            ]
        ]);

        if (!$validation) {
            $errors = \Config\Services::validation()->getErrors();

            return redirect()->back()->withInput()->with('errors', $errors);
        }
        //ambil data lama
        $semuafilm = $this->film->find($this->request->getPost('id'));

        //tambah request id
        $data = [
            'id' => $this->request->getPost('id'),
            'nama_film' => $this->request->getPost('nama_film'),
            'id_genre' => $this->request->getPost('id_genre'),
            'duration' => $this->request->getPost('duration'),
        ];
        // mengecek apakah ada cover yang diupload
        $cover = $this->request->getFile('cover');
        if ($cover->isValid() && !$cover->hasMoved()) {
            //generate nama file yang unik
            $imageName = $cover->getRandomName();
            //Pindahkan file ke direktori penyimpanan
            $cover->move(ROOTPATH . 'public/assets/cover/', $imageName);
            // hapus file gambar jika ada
            if ($semuafilm['cover']) {
                unlink(ROOTPATH . 'public/assets/cover/' . $semuafilm['cover']);
            }
            // jika ada tambahkan array cover pada variabel $data
            $data['cover'] = $imageName;
        }
        
        $this->film->save($data);
        // ubah pesannya
        session()->setFlashdata('success', 'Data berhasil diperbarui.');
        return redirect()->to('/film');
    }

    public function store()
    {
        $validation = $this->validate([
            'nama_film' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Nama Film Harus diisi'
                ]
            ],
            'id_genre'  => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Genre Harus diisi'
                ]
            ],
            'duration'  => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Durasi Harus diisi'
                ]
            ],
            'cover'     => [
                'rules' => 'uploaded[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]|max_size[cover,2048]',
                'errors' => [
                    'uploaded' => 'Kolom Cover harus berisi file.',
                    'mime_in' => 'Tipe file pada Kolom Cover harus berupa JPG, JPEG, atau PNG',
                    'max_size' => 'Ukuran file pada Kolom Cover melebihi batas maksimum'
                ]
            ]
        ]);

        if (!$validation) {
            $errors = \Config\Services::validation()->getErrors();

            return redirect()->back()->withInput()->with('errors', $errors);
        }
        $image = $this->request->getFile('cover');
        $imageName = $image->getRandomName();
        $image->move(ROOTPATH . 'public/assets/cover/', $imageName);

        $data = [
            'nama_film' => $this->request->getPost('nama_film'),
            'id_genre' => $this->request->getPost('id_genre'),
            'duration' => $this->request->getPost('duration'),
            'cover' => $imageName,
        ];
        $this->film->save($data);
        session()->setFlashdata('success', 'Data berhasil disimpan.'); // tambahkan ini
        return redirect()->to('/film');
    }

    public function film_by_id()
    {
        dd($this->film->getDataByID(1));
    }

    public function film_by_genre()
    {
        dd($this->film->getDataBy("Horror"));
    }

    public function film_order()
    {
        dd($this->film->getOrderBy());
    }

    public function film_limit_five()
    {
        dd($this->film->getLimit());
    }
}
