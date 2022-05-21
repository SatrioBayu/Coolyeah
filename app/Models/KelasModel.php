<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table = 'kelas';
    protected $allowedFields = ['email_guru','nama_kelas','deskripsi'];


    public function getData(){
        return $this->db->table('kelas')->join('guru','guru.email_guru=kelas.email_guru')->get()->getResultArray();
    }

    public function getDataById($id){
        return $this->db->table('kelas')->join('guru','guru.email_guru=kelas.email_guru')->where('id',$id)->get()->getRowArray();
    }

    public function getDataByEmail($email){
        return $this->db->table('kelas')->where('email_guru',$email)->get()->getRowArray();
    }

    public function getSiswaByIdKelas($id){
        return $this->db->table('kelas')->join('siswa_has_kelas','siswa_has_kelas.id=kelas.id')->join('siswa','siswa.email_siswa=siswa_has_kelas.email_siswa')->where('siswa_has_kelas.id',$id)->get()->getResultArray();
    }

    public function getKelasByKeyword($keyword){
        return $this->db->table('kelas')->like('nama_kelas',$keyword, 'both')->join('guru','guru.email_guru=kelas.email_guru')->get()->getResultArray();
    }
}