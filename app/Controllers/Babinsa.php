<?php

namespace App\Controllers;

use \Myth\Auth\Models\UserModel;

class Babinsa extends BaseController
{

  public function __construct()
  {
      $this->userModel = new UserModel();
  }

  public function add()
    {
        $data['title'] = 'Tambah Babinsa';
        return view('babinsa/add', $data);
    }

    public function edit($id)
    {

        $data = [
            'title' => 'Edit Babinsa',
            'babinsa' =>  $this->userModel->getMember($id)[0]

        ];
        return view('babinsa/edit', $data);
    }

    public function update($id) {

        $babinsa = $this->userModel->getMember($id)[0];


        if(empty($babinsa)) {
            return redirect()->back()->withInput()->with('tx_error_message', 'Data tidak ditemukan');
        }

        if(!$this->validate([
            'name' => 'required',
            'picture' => 'is_image[picture]|mime_in[picture,image/jpg,image/jpeg,image/png]',
            'birthdate' => 'required',
            'rank' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $isFileUploaded = null;
        $uploadedFile = $this->request->getFile('picture');


        if ($uploadedFile->getError() !== 4) {
            $list = $this->userModel->where('picture', $uploadedFile->getName())->findAll();

            if (!empty($list)) {
                return redirect()->back()->withInput()->with('tx_error_message', 'Gambar "'. $uploadedFile->getName() .'" sudah ada dalam server');
            }

            $isFileUploaded = true;
            unlink('image/babinsa/'. $babinsa['picture']);
            $uploadedFile->move('image/babinsa/');
            $imageCompressor = new ImageCompressor('babinsa', $uploadedFile->getName());
            unlink('image/babinsa/'. $uploadedFile->getName());
		} else if ($uploadedFile->getError() == 4) {
            $isFileUploaded = false;
        }

        $this->userModel->update($id, [
            'name' => $this->request->getVar('name'),
            'picture' => $isFileUploaded ? $imageCompressor->new_name_image : $babinsa['picture'],
            'birthdate' => $this->request->getVar('birthdate'),
            'rank' => $this->request->getVar('rank'),
        ]);

		return redirect()->to('/babinsa')->with('tx_success_message', 'Babinsa "'. $babinsa['name'] .'" berhasil diubah');
    }

    public function delete($id) {
        $babinsa = $this->userModel->getMember($id)[0];

        if(empty($babinsa)) {
            return redirect()->back()->withInput()->with('tx_error_message', 'Data tidak ditemukan');
        }
    
        unlink('image/babinsa/'. $babinsa['picture']);
    
        $this->userModel->delete($id);

        return redirect()->to('/babinsa')->with('tx_success_message', 'Anggota "'. $babinsa['name'] .'" berhasil dihapus');
    }

}