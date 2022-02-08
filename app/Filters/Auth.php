<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('loged')) {
            session()->setFlashdata('error', 'Anda harus login terlebih dahulu');
            return redirect()->to(base_url('/'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}


?>