<?php

namespace Phalcon\Init\Models;

use Phalcon\Mvc\Model;

class Janji extends Model
{
    public $id_janji;
    public $id_pasien;
    public $id_dokter;
    public $tgl;
    public $jam;
    public $status;
    public $diagnosa;
    public $resep;
   
    public function initialize()
    {
        $this->setSource('janji');
        $this->belongsTo(
            'id_pasien', //foreign key
            'Phalcon\Init\Models\Users',
            'id_user', // primary key dari tabel users
            ['alias' => 'pasien']
        );
        $this->belongsTo(
            'id_dokter', //foreign key
            'Phalcon\Init\Models\Users',
            'id_user', // primary key dari tabel users
            ['alias' => 'dokter']
        );
    }

}
