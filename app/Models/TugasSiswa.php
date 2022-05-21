<?php

namespace App\Models;

use CodeIgniter\Model;

class TugasSiswa extends Model
{
    protected $table = 'siswa_has_tugas';
    protected $allowedFields = ['email_siswa','id','jawaban'];

    public function getDataByEmail($email, $id){
        return $this->db->table('siswa_has_tugas')->where('email_siswa',$email)->where('id',$id)->get()->getRowArray();
    }
    public function getDataById($id){
        return $this->db->table('siswa_has_tugas')->join('siswa','siswa.email_siswa=siswa_has_tugas.email_siswa')->where('id',$id)->get()->getResultArray();
    }
    public function getAllTugas($email){
        return $this->db->table('siswa_has_tugas')->join('tugas','siswa_has_tugas.id=tugas.id')->where('email_siswa',$email)->get()->getResultArray();
    }
    public function hapusDataByEmailId($email, $id){
        $this->db->table('siswa_has_tugas')->delete(['email_siswa'=>$email,'id'=>$id]);
    }
}