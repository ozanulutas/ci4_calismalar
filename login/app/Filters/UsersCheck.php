<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

// before ve after metolarının ikisini de kullanmak zorunda değiliz fakat sınıf içinde ikisi de yer lamalıdır.

class UsersCheck implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Eğer uri segment(1) users ise yönlendirme yapacağız;
        // localhost/users/...
        // localhost/users

        $uri = service('uri');
        if($uri->getSegment(1) == 'users') {
            if($uri->getSegment(2) == '')
                $segment = '/';
            else
                $segment = '/' . $uri->getSegment(2);

            return redirect()->to($segment);
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}