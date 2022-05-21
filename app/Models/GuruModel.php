<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table = 'guru';
    protected $allowedFields = ['email_guru','nama','password'];

    public function getDataByEmail($email){
        return $this->db->table('guru')->where('email_guru',$email)->get()->getRowArray();
    }
    public function getKelas($email){
        return $this->db->table('guru')->join('kelas','kelas.email_guru=guru.email_guru')->where('kelas.email_guru',$email)->get()->getResultArray();
    }
    public function updateByEmail($emailAwal, $emailBaru, $namaBaru, $passwordBaru){
        $data = [
            'email_guru' => $emailBaru,
            'nama' => $namaBaru,
            'password' => $passwordBaru
        ];
        $this->db->table('guru')->where('email_guru',$emailAwal)->update($data);
    }
}