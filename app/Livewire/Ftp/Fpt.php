<?php

namespace App\Livewire\Ftp;

use Livewire\Component;
use App\Services\FtpsService;

class Fpt extends Component

{
    protected $ftps;
    public $archivos = [];
    public $data_connection = [
        'port' => '',
        'root' => '',
        'host' => '',
        'user' => '',
        'password' => '',
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

    public function run()
    {
        
        $this->ftps->connect($this->data_connection);
        $this->archivos = $this->ftps->listarArchivos();
       

    }
}
