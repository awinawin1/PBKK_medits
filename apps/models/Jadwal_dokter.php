<?php

namespace Phalcon\Init\Models;

use Phalcon\Mvc\Model;
// use Phalcon\Init\Dashboard\Models\Logs;

class Jadwal_dokter extends Model
{
    public $id_jadwal;
    public $id_dokter;
    public $hari;
    public $jam_mulai;
    public $jam_selesai;
   
    public function initialize()
    {
        $this->setSource('jadwal_dokter');
        $this->belongsTo(
            'id_dokter', //foreign key
            'Phalcon\Init\Models\Users',
            'id_user', // primary key dari tabel users
            ['alias' => 'dokter']
        );
    }

}
