<?php

namespace App\Services;

use Livewire\Attributes\On;
use Livewire\Component;



class FtpsService extends Component
{
    protected $ftp;
    public $directorio = '/prueba';
    protected $listeners = ['post-created'=>'post-created'];

    public function connect($data_connections)
    {
        $this->ftp = new \FtpClient\FtpClient();
        $this->ftp->connect($data_connections['host'], $data_connections['ssl'], $data_connections['port']);
        $this->ftp->login($data_connections['user'], $data_connections['password']);
        $this->ftp->pasv(true);
    }

    public function listarArchivos()
    {
        return $files = $this->ftp->scanDir($this->directorio);
    }

    public function entryDirectory($directory)
    {


        $this->directorio = $this->directorio . '/' . $directory;


        // $this->listarArchivos();

    }

    #[On('post-created')]
    public function Prueba()
    {
        return dd('desde services'); // Lista nombres de archivos en el directorio
    }
}
