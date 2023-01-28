<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class MyFilter implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    // $auth = service('auth');

    // if (!$auth->isLoggedIn()) {
    //   return redirect()->to('/');
    // }
    if (!session()->get('isLoggedIn')) {
      return redirect()->to('/');
      # code...
    }
    // if (!session()->get('is_admin')) {
    //   return redirect()->to('/');
    //   # code...
    // }

    // Do something here
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Do something here
  }
}
