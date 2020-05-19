<?php

namespace Phalcon\Init\Models;

use Phalcon\Mvc\Model;
// use Phalcon\Init\Dashboard\Models\Logs;

class Users extends Model
{
    public $id_user;
    public $nama;
    public $email;
    public $password;
    public $jenis_kelamin;
    public $tgl_lahir;
    public $alamat;
    public $jenis_user;
    public $poli;

    public function initialize()
    {
        $this->setSource('users');
        $this->hasMany(
            'id_user', //primary key
            'Phalcon\Init\Models\Jadwal_dokter',
            'id_dokter', //foreign key
            ['alias' => 'jadwal']
        );
        $this->hasMany(
            'id_user', //primary key
            'Phalcon\Init\Models\Janji',
            'id_pasien', //foreign key
            ['alias' => 'buat_janji']
        );
        $this->hasMany(
            'id_user', //primary key
            'Phalcon\Init\Models\Janji',
            'id_dokter', //foreign key
            ['alias' => 'menerima']
        );
    }

}
