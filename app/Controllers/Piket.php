<?php

namespace App\Controllers;

use \Myth\Auth\Models\UserModel;

use App\Models\PiketModel;
use App\Models\LaporanModel;
use App\Models\LampiranModel;

class Piket extends BaseController {
  
  public function __construct()
  {
    $this->userModel = new UserModel();
    $this->piketModel = new PiketModel();
    $this->laporanModel = new LaporanModel();
    $this->lampiranModel = new LampiranModel();
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

    $lampiran = $this->lampiranModel->where('id_piket', $id)->findAll();

    if (!empty($lampiran)) {
      return redirect()->to('/piket')->with('tx_error_message', 'Silahkan hapus lampiran laporan terlebih dahulu');
    }

    $this->piketModel->delete($id);

    return redirect()->to('/piket')->with('tx_success_message', 'Piket pada "'. $piket['tanggal'] .'" berhasil dihapus');
  }

  public function laporan($id)
	{

    $piket = $this->piketModel->getDetailPiket($id)[0];
    $laporan = $this->laporanModel->where('id_piket', $id)->find();
    $lampiran = $this->lampiranModel->where('id_piket', $id)->findAll();

    $data = [
      'title'=> 'Ubah Piket',
      'piket' => $piket,
      'laporan' => $laporan,
      'lampirans' => $lampiran,
    ];
    return view('piket/laporan/index', $data);
	}

  public function download_lampiran($id)
	{
    $lampiran = $this->lampiranModel->find($id);

    $filePath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .'image/lampiran/' . $lampiran['lampiran'];

    return $this->response->download($filePath, null);
	}

}