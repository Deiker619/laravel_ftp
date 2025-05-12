<?php

namespace App\Services;



class FtpsService
{
    protected $ftp;
    

    public function connect($data_connections)
    {
        $this->ftp = new \FtpClient\FtpClient();
        $this->ftp->connect($data_connections['host'], $data_connections['ssl'], $data_connections['port']);
        $this->ftp->login($data_connections['user'], $data_connections['password']);
        $this->ftp->pasv(true);
     
    }

    public function listarArchivos($directorio = '/')
    {
        return $files = $this->ftp->scanDir('/prueba');
        
    }
    public function Prueba()
    {
        return dd('desde services'); // Lista nombres de archivos en el directorio
    }
}
