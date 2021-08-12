<?php

namespace App\Http\Livewire;

use App\Models\Pasien;
use App\Models\RegisterPelayanan;
use Livewire\Component;

class RegistrationBox extends Component
{
    public $register, $unit_id, $dr_id, $pasien_rm, $pasien;

    protected $listeners = ['pasienReceived'];

    public function pasienReceived($pasien)
    {
        $this->pasien = $pasien;
    }

    public function render()
    {
        return view('livewire.registration-box', [
            'register',
            'pasien',
        ]);
    }

    public function save()
    {
        $register = RegisterPelayanan::create([
            'date_in' => now(),
            'pasien_rm' => $this->pasien['rm'],
            'unit_id' => $this->unit_id,
            'dr_id' => $this->dr_id,
        ]);

        $this->register = $register;

        $this->dispatchBrowserEvent('pasien-registered', ['register' => $register]);
    }
}
