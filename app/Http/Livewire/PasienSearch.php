<?php

namespace App\Http\Livewire;

use App\Models\Pasien;
use Livewire\Component;

class PasienSearch extends Component
{
    public $rm = '';
    public $pasien;

    protected $listeners = ['pasienCreated'];

    public function pasienCreated($pasien)
    {
        $this->rm = $pasien['rm'];

        $this->search();

        $this->rm = '';
    }

    public function render()
    {
        return view('livewire.pasien-search', [
            'pasien'
        ]);
    }

    public function search()
    {
        $pasien = Pasien::where(['rm' => $this->rm])->first();

        if ($pasien) {
            $this->pasien = $pasien;
            $this->emitTo('registration-box', 'pasienReceived', $pasien);
            $this->emitTo('pasien-identity', 'pasienFound', $pasien);
        } else {
            $this->dispatchBrowserEvent('pasien-not-found');
            $this->rm = '';
        }
    }

    public function clearPasien()
    {
        $this->pasien = '';
        $this->rm = '';

        $this->emitTo('registration-box', 'pasienCleared');
        $this->emitTo('pasien-identity', 'pasienCleared');
    }
}
