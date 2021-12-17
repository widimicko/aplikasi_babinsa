<?php

namespace App\Controllers;

use \Myth\Auth\Models\UserModel;
use App\Models\PiketModel;

class Piket extends BaseController {
  
  public function __construct()
  {
    $this->userModel = new UserModel();
    $this->piketModel = new PiketModel();
  }

  public function add()
	{
    $data = [
      'title'=> 'Tambah Piket',
      'babinsas' => $this->userModel->getListSelectMember()
    ];
    return view('piket/add', $data);
	}

  public function create()
	{

    $piketBabinsa = $this->piketModel->where('id_babinsa', $this->request->getVar('id_babinsa'))->where('tanggal', date('Y-m-d', strtotime($this->request->getVar('tanggal'))))->findAll();
    $piketTanggal = $this->piketModel->where('tanggal', date('Y-m-d', strtotime($this->request->getVar('tanggal'))))->findAll();
    if (!empty($piketBabinsa)) {
      return redirect()->back()->withInput()->with('tx_error_message', 'Gagal, Anggota tersebut sudah dijadwalkan pada tanggal yang sama');
    } else if (!empty($piketTanggal)) {
      return redirect()->back()->withInput()->with('tx_error_message', 'Gagal, Tanggal tersebut telah dijadwalkan oleh anggota yang lain');
    }

    $this->piketModel->insert([
        'id_babinsa' => $this->request->getVar('id_babinsa'),
        'tanggal' => date('Y-m-d', strtotime($this->request->getVar('tanggal'))),
    ]);

    return redirect()->to('piket')->with('tx_success_message','Jadwal Piket Berhasil Ditambahkan');
	}

  public function edit($id)
	{
			$data = [
        'title'=> 'Ubah Piket',
        'piket' => $this->piketModel->find($id),
        'babinsas' => $this->userModel->getListSelectMember()
      ];
			return view('piket/edit', $data);
	}

  public function update($id)
	{

    $piketBabinsa = $this->piketModel->where('id_babinsa', $this->request->getVar('id_babinsa'))->where('tanggal', date('Y-m-d', strtotime($this->request->getVar('tanggal'))))->findAll();
    if (!empty($piketBabinsa)) {
      return redirect()->back()->withInput()->with('tx_error_message', 'Gagal, Anggota tersebut sudah dijadwalkan pada tanggal yang sama');
    }

    $this->piketModel->update($id, [
        'id_babinsa' => $this->request->getVar('id_babinsa'),
        'tanggal' => date('Y-m-d', strtotime($this->request->getVar('tanggal'))),
    ]);

    return redirect()->to('piket')->with('tx_success_message','Jadwal Piket Berhasil Diubah');
	}

  public function delete($id) {
    $piket = $this->piketModel->find($id);

    if(empty($piket)) {
      return redirect()->back()->withInput()->with('tx_error_message', 'Data tidak ditemukan');
    }

    $this->piketModel->delete($id);

    return redirect()->to('/piket')->with('tx_success_message', 'Piket pada "'. $piket['tanggal'] .'" berhasil dihapus');
}

}