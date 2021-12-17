<?php

namespace App\Controllers;

use App\Models\PiketModel;
use App\Models\LaporanModel;
use App\Models\LampiranModel;

class Member extends BaseController
{

    public function __construct()
    {
      $this->piketModel = new PiketModel();
      $this->laporanModel = new LaporanModel();
      $this->lampiranModel = new LampiranModel();
    }

    public function laporan($id_piket)
    {

      $piket = $this->piketModel->getDetailPiket($id_piket)[0];
      $laporan = $this->laporanModel->where('id_piket', $id_piket)->find();
      $lampiran = $this->lampiranModel->where('id_piket', $id_piket)->findAll();

      $data = [
        'title'=> 'Ubah Piket',
        'piket' => $piket,
        'laporan' => $laporan,
        'lampirans' => $lampiran,
      ];
      return view('piket/member/index', $data);
    }

    public function laporan_add($id_piket)
    {

      $piket = $this->piketModel->getDetailPiket($id_piket)[0];

      $data = [
        'title'=> 'Ubah Piket',
        'piket' => $piket,
      ];
      return view('piket/member/laporan/add', $data);
    }

    public function laporan_create($id_piket)
    {
      $this->laporanModel->insert([
        'id_piket' => $id_piket,
        'keterangan' => $this->request->getVar('keterangan'),
    ]);

      return redirect()->to('member/piket/laporan/'. $id_piket)->with('tx_success_message','Laporan Piket Berhasil Ditambahkan');
    }

    public function laporan_edit($id_piket)
    {

      $piket = $this->piketModel->getDetailPiket($id_piket)[0];
      $laporan = $this->laporanModel->where('id_piket', $id_piket)->find()[0];


      $data = [
        'title'=> 'Ubah Piket',
        'piket' => $piket,
        'laporan' => $laporan,
      ];
      return view('piket/member/laporan/edit', $data);
    }

    public function laporan_update($id_piket)
    {

      $this->laporanModel
        ->whereIn('id_piket', [$id_piket])
        ->set(['keterangan' => $this->request->getVar('keterangan')])
        ->update();


      return redirect()->to('member/piket/laporan/'. $id_piket)->with('tx_success_message','Laporan Piket Berhasil Diubah');
    }

    public function lampiran_add($id_piket)
    {

      $piket = $this->piketModel->getDetailPiket($id_piket)[0];

      $data = [
        'title'=> 'Tambah Lampiran',
        'piket' => $piket,
      ];
      return view('piket/member/lampiran/add', $data);
    }

    public function lampiran_create($id_piket)
    {

      if(!$this->validate([
				'lampiran' => 'is_image[lampiran]|mime_in[lampiran,image/jpg,image/jpeg,image/png]',
      ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
      }

      $uploadedFile = $this->request->getFile('lampiran');

      if ($uploadedFile->getError() !== 4) {  

        $uploadedFile->move('image/lampiran/');

      } else {
        session()->setFlashData();
        return redirect()->to('member/piket/lampiran/add/'. $id_piket)->withInput()->with('tx_error_message', 'Lampiran harus diisi');
      }
      
      $this->lampiranModel->insert([
        'id_piket' => $id_piket,
        'lampiran' => $uploadedFile->getName(), 
      ]);

      return redirect()->to('member/piket/laporan/'. $id_piket)->with('tx_success_message', 'Lampiran berhasil ditambahkan');
    }

    public function lampiran_edit($id_piket, $id_lampiran)
    {

      $piket = $this->piketModel->getDetailPiket($id_piket)[0];

      $data = [
        'title'=> 'Tambah Lampiran',
        'piket' => $piket,
        'lampiran' => $this->lampiranModel->find($id_lampiran)
      ];
      return view('piket/member/lampiran/edit', $data);
    }

    public function lampiran_update($id_piket, $id_lampiran)
    {

      if(!$this->validate([
				'lampiran' => 'is_image[lampiran]|mime_in[lampiran,image/jpg,image/jpeg,image/png]',
      ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
      }

      $lampiran = $this->lampiranModel->find($id_lampiran);

      $uploadedFile = $this->request->getFile('lampiran');

      if ($uploadedFile->getError() !== 4) {  

        unlink('image/lampiran/'. $lampiran['lampiran']);
        $uploadedFile->move('image/lampiran/');

      } else {
        session()->setFlashData();
        return redirect()->to('member/piket/lampiran/add/'. $id_piket)->withInput()->with('tx_error_message', 'Lampiran harus diisi');
      }
      
      $this->lampiranModel->update($id_lampiran, [
        'lampiran' => $uploadedFile->getName(), 
      ]);

      return redirect()->to('member/piket/laporan/'. $id_piket)->with('tx_success_message', 'Lampiran berhasil diubah');
    }

    public function lampiran_delete($id_piket, $id_lampiran)
    {

      $lampiran = $this->lampiranModel->find($id_lampiran);
      unlink('image/lampiran/'. $lampiran['lampiran']);
      $this->lampiranModel->delete($id_lampiran);

      return redirect()->to('member/piket/laporan/'. $id_piket)->with('tx_success_message', 'Lampiran berhasil dihapus');
    }
      
}
