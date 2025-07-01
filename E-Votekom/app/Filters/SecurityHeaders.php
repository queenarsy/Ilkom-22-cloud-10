<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class SecurityHeaders implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Tidak perlu apa-apa di sini
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tambahkan header anti-clickjacking
        $response->setHeader('X-Frame-Options', 'DENY');
        // (Opsional) Tambahan untuk keamanan yang lebih kuat:
        $response->setHeader('Content-Security-Policy', "frame-ancestors 'none'");
        return $response;
    }
}
