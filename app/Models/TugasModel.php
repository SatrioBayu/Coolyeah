<?php

namespace App\Models;

use CodeIgniter\Model;

class TugasModel extends Model
{
    protected $table = 'tugas';
    protected $allowedFields = ['id_kelas','judul','deskripsi','batas_waktu'];

    public function getTugas($id_kelas){
        return $this->db->table('tugas')->where('id_kelas',$id_kelas)->get()->getResultArray();
    }

    public function getData($id){
        return $this->db->table('kelas')->where('kelas.id',$id)->join('tugas','tugas.id_kelas=kelas.id')->get()->getResultArray();
    }

    public function getTugasById($id){
        return $this->db->table('tugas')->where('id',$id)->get()->getRowArray();
    }

    public function updateTugasById($id, $judulBaru, $deskripsiBaru){

        $data = [
            'judul' => $judulBaru,
            'deskripsi' => $deskripsiBaru
        ];
        $this->db->table('tugas')->where('id',$id)->update($data);        

    }
}