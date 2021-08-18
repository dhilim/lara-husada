<?php

namespace App\Http\Livewire;

use App\Models\Pasien;
use Livewire\Component;

class PasienIdentity extends Component
{
    public $pasien;

    protected $listeners = ['pasienFound', 'pasienCleared'];

    public function pasienFound($pasien)
    {
        $this->pasien = $pasien;
    }

    public function pasienCleared()
    {
        $this->pasien = '';
    }

    public function render()
    {
        return view('livewire.pasien-identity');
    }

    public function create()
    {
        if (array_key_exists('id', $this->pasien)) {
            $this->updateData();

            return true;
        }

        $pasien = Pasien::create($this->pasien);

        $this->pasien = $pasien;

        $this->emitTo('pasien-search', 'pasienCreated', $this->pasien);
    }

    public function updateData()
    {
        $pasien = Pasien::find($this->pasien['id']);

        $pasien->update($this->pasien);

        $this->emitTo('pasien-search', 'pasienCreated', $this->pasien);
    }
}
