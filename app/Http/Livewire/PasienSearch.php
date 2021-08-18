<?php

namespace App\Http\Livewire;

use App\Models\Pasien;
use Livewire\Component;

class PasienSearch extends Component
{
    public $rm = '';
    public $pasien;

    public function render()
    {
        return view('livewire.pasien-search', [
            'pasien'
        ]);
    }

    public function search()
    {
        $pasien = Pasien::find($this->rm);

        $this->pasien = $pasien;
        $this->emitTo('registration-box', 'pasienReceived', $pasien);
    }

    public function clearPasien()
    {
        $this->pasien = '';
        $this->rm = '';

        $this->emitTo('registration-box', 'pasienCleared');
    }
}
