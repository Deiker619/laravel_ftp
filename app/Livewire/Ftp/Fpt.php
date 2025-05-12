<?php

namespace App\Livewire\Ftp;

use Livewire\Component;
use App\Services\FtpsService;
use Livewire\Attributes\On;

class Fpt extends Component

{
    protected $listeners = ['post-created'=>'post-created'];
    protected $ftps;
    public $archivos = [];
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

    public function entryDirectory($directory){

        $this->dispatch('post-created'); 
        //$this->ftps->entryDirectory($directory);
        
       // $this->archivos = $this->ftps->listarArchivos();
    }

    public function run()
    {
        
        $this->ftps->connect($this->data_connection);
        $this->archivos = $this->ftps->listarArchivos();
       

    }
    
   
    
}
