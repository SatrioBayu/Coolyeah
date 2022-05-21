<?php

namespace App\Controllers;

use App\Models\KelasMurid;
use App\Models\SiswaModel;
use App\Models\TugasModel;
use App\Models\TugasSiswa;

class Home extends BaseController
{

    protected $kelasmurid;
    protected $tugasmurid;
    protected $tugas;
    protected $murid;

    public function __construct()
    {
        $this->kelasmurid = new KelasMurid();
        $this->tugasmurid = new TugasSiswa();
        $this->tugas = new TugasModel();
        $this->murid = new SiswaModel();
    }

    public function index()
    {
        if(empty(session()->get('email'))){
            session()->setFlashData('login',"Anda belum login");
            return redirect()->to('/');
        }
        $kelas = $this->kelasmurid->getDataByEmail(session()->get('email'));
        $identitas = $this->murid->getDataByEmail(session()->get('email'));
        $data = [
            'judul' => 'Dashboard',
            'kelas' => $kelas
        ];
        return view('Siswa/dashboard',$data);
    }


    public function join($id){
        if(empty(session()->get('email'))){
            session()->setFlashData('login',"Anda belum login");
            return redirect()->to('/');
        }
        $data=[
            'email_siswa'=> session()->get('email'),
            'id'=> $id
        ];
        $kelas = $this->kelasmurid->getDataByEmail(session()->get('email'));
        for ($i=0; $i < count($kelas); $i++) { 
            if($kelas[$i]['id']==$data['id']){
                $exist[] = $data;
            }
        }
        if(!empty($exist)){
            session()->setFlashData('exist',"Anda sudah bergabung pada kelas tersebut");
            return redirect()->to('Kelas');  
        } else{
            $this->kelasmurid->insert($data);
            return redirect()->to('Home');  
        }
        
    }

    public function listTugas(){
        if(empty(session()->get('email'))){
            session()->setFlashData('login',"Anda belum login");
            return redirect()->to('/');
        }
        $kelas = $this->kelasmurid->getDataByEmail(session()->get('email'));
        foreach($kelas as $kel){
            $id[] = $kel['id'];
        }
        if(!empty($id)){
            for ($i=0; $i < count($id); $i++) { 
                if(!empty($this->tugas->getData($id[$i]))){
                    $tugas[] = $this->tugas->getData($id[$i]);
                }
            }
            $data = [
                'judul' => "List Tugas",
                'tugas' => $tugas
            ];
            return view('/Siswa/listTugas',$data);
        } else{
            $data = [
                'judul' => "List Tugas"
            ];
            return view('/Siswa/listTugas',$data);
        }
    }

    public function keluar($id){
        // Menghapus data tugas yang sudah dikumpulkan karena keluar kelas
        $id_tugas=[];
        $tugas = $this->tugas->getTugas($id);
        if(!empty($tugas)){
            foreach($tugas as $tug){
                $id_tugas[] = $tug['id'];
            }
            for ($i=0; $i < count($id_tugas); $i++) { 
                if(!empty($this->tugasmurid->getDataByEmail(session()->get('email'),$id_tugas[$i]))){
                    $sudah[] = $this->tugasmurid->getDataByEmail(session()->get('email'),$id_tugas[$i]);
                }
            }
            if(!empty($sudah)){
                foreach($sudah as $sud){
                    $id_sudah[] = $sud['id'];
                }    
                for ($i=0; $i < count($id_sudah); $i++) { 
                    $this->tugasmurid->hapusDataByEmailId(session()->get('email'),$id_sudah[$i]);
                }
            }
        }
        //
        // Menghapus data siswa dari kelas
        $this->kelasmurid->keluarKelas(session()->get('email'),$id);
        return redirect()->to('/Home');
    }
}
