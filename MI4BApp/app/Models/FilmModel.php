<?php

namespace App\Models;

use CodeIgniter\Model;

class FilmModel extends Model
{

    protected $table = 'film';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_film', 'id_genre', 'duration', 'cover'];

    public function getFilm()
    {
        $data =[
           
            [
                "nama_film" => "Sewu Dino",
                "genre" => "horror",
                "duration" => "1 jam 43 menit"
            ],
            [
                "nama_film" => "Fast x",
                "genre" => "action",
                "duration" => "2 hari 1 malem"
            ],
            [
                "nama_film" => "Tukang Bubur Naik Haji",
                "genre" => "Religi",
                "duration" => "1 minggu 7 menit"
            ],
            [
                "nama_film" => "Avengers: Infinity War",
                "genre" => "action",
                "duration" => "2 Menit 1 detik"
            ],
            [
                "nama_film" => "Rangga si manusia gamer",
                "genre" => "komedi",
                "duration" => "Unlimited"
            ]
        ];

        return $data;
    }
    public function getAllDataJoin()
    {
        $query = $this->db->table("film")
            ->select("film.*,genre.nama_genre")
            ->join("genre", "genre.id = film.id_genre");
        return $query->get()->getResultArray();
    }

    
    public function getAllData()
    {
       return $this->findAll();
    }

    public function getDataByID($id)
    {
        return $this->find($id);
    }

    public function getDataBy($data)
    {
        return $this->where("genre", $data)->findAll();
    }

    public function getOrderBy()
    {
        return $this->orderBy('created_id', 'desc')->findAll();
    }

    public function getLimit()
    {
        return $this->limit(5)->findAll();
    }
}
