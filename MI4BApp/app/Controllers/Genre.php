<?php

namespace App\Controllers;

use App\Controllers\BaseController;

//step 1
use App\Models\GenreModel;
class Genre extends BaseController
{
    //step 2
    protected $genre;
    //step 3 buat fungsi construct untuk inisiasi class model
    public function __construct()
    {
        //step 4
        $this->genre = new GenreModel();
    }
    public function index()
    {
        //
    }

    public function all(){
        $data['semuagenre'] = $this->genre->getAllData();
        return view("genre/semuagenre", $data);
    }
}