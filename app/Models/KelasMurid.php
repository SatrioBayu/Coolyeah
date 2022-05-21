<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasMurid extends Model
{
    protected $table = 'siswa_has_kelas';
    protected $allowedFields = ['email_siswa','id'];


    public function getData(){
        return $this->findAll();
    }

    public function getDataByEmail($email){
        return $this->db->table('siswa_has_kelas')->where('email_siswa',$email)->join('kelas','kelas.id=siswa_has_kelas.id')->join('guru','guru.email_guru=kelas.email_guru')->get()->getResultArray();
    }

    public function keluarKelas($email,$id){
        $this->db->table('siswa_has_kelas')->delete(['email_siswa' => $email,'id'=>$id]);
    }
}