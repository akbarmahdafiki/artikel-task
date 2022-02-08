<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelArtikel;
use Config\Services;

class Artikel extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'User List'
        ];

        return view('admin/index', $data);
    }

    public function ajaxlist()
    {
        $request = Services::request();
        $datatable = new ModelArtikel($request);

        if ($request->getMethod(true) == 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->judul_artikel;
                $row[] = $list->judul_artikel;
                $row[] = $list->isi_artikel;
                $row[] = $list->tag_artikel;
                $row[] = $list->kategori_artikel;
                $data[] = $row;
            }

            $output = [
                'draw' => $request->getPost('draw'),
                'recordsTotal' => $datatable->countAll(),
                'recordsFiltered' => $datatable->countFiltered(),
                'data' => $data
            ];
            
            echo json_encode($output);
        }
    }

    public function save()
    {
        helper(['form']);
        $request = Services::request();
        $model = new ModelArtikel($request);
        $rules = [
            'judul_artikel' => 'required',
            'isi_artikel' => 'required',
            'thumbnail_artikel' => 'is_image[thumbnail_artikel]|max_size[thumbnail_artikel,2048]',
            'tag_artikel' => 'required',
            'kategori_artikel' => 'required'
        ];
        
        if ($this->validate($rules)) {
            $data = [
                'judul_artikel' => $this->request->getPost('judul_artikel'),
                'isi_artikel' => $this->request->getPost('isi_artikel'),
                'thumbnail_artikel' => $this->request->getFile('thumbnail_artikel'),
                'tag_artikel' => $this->request->getPost('tag_artikel'),
                'kategori_artikel' => $this->request->getPost('kategori_artikel'),
            ];
    
            $model->saveArtikel($data);
            return redirect()->to(base_url('admin'));
        }
        else {
            $data['notification'] = $this->validator;
            return view('admin/index', $data);
        }

    }
}
