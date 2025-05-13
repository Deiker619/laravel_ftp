<?php

namespace App\Livewire\Ftp;

use Livewire\Component;
use App\Services\FtpsService;
use Livewire\Attributes\On;

class Fpt extends Component

{
    protected $listeners = ['post-created' => 'post-created'];
    public $parent;
    protected $ftps;
    public $archivos = [];
    public $directorio = '/';
    public $data_connection = [
        'port' => '21',
        'root' => '/prueba',
        'host' => '192.168.0.195',
        'user' => 'prueba',
        'password' => '12345',
        'ssl' => true,


    ];

    public function updated($property)
    {
        if ($property === 'data_connection.ssl') {
            $this->data_connection['ssl'] = (bool) $this->data_connection['ssl'];
        }
    }
    public function boot(FtpsService $ftpsService)
    {
        $this->ftps = $ftpsService;
    }

    public function render()
    {
        return view('livewire.ftp.fpt');
    }

    public function entryDirectory($directory)
    {
        if ($this->directorio == '/') {

            $this->directorio =  $this->directorio . $directory;
        } else {

            $this->directorio = $this->directorio . "/" . $directory;
        }
        $this->ftps->connect($this->data_connection);
        $this->archivos = $this->ftps->listarArchivos($this->directorio);
    }

    public function exitDirectory()
    {
        $this->ftps->connect($this->data_connection);
        // Obtener el directorio actual
        $current = $this->ftps->pwd();
        //dd($current);
        // Subir al directorio padre
        $parent = "../" . $current;
        // Entrar al directorio padre
        $this->entryDirectory($parent);
        // Actualizar la lista de archivos
        $this->archivos = $this->ftps->listarArchivos($this->directorio);
    }

    public function run()
    {

        $this->ftps->connect($this->data_connection);
        $this->archivos = $this->ftps->listarArchivos($this->directorio);
    }

    #[On('post-created')]
    public function Prueba()
    {
        return dd('desde services'); // Lista nombres de archivos en el directorio
    }
}
