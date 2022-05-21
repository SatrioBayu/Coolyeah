<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $allowedFields = ['email_siswa','nama','password'];

    public function getDataByEmail($email){
        return $this->db->table('siswa')->where('email_siswa',$email)->get()->getRowArray();
    }
    public function updateByEmail($emailAwal, $emailBaru, $namaBaru, $passwordBaru){
        $data = [
            'email_siswa' => $emailBaru,
            'nama' => $namaBaru,
            'password' => $passwordBaru
        ];
        $this->db->table('siswa')->where('email_siswa',$emailAwal)->update($data);
    }
}