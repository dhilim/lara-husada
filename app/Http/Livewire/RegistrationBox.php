<?php

namespace App\Http\Livewire;

use App\Models\JurnalRalan;
use App\Models\Pasien;
use App\Models\RegisterPelayanan;
use Livewire\Component;

class RegistrationBox extends Component
{
    public $register, $unit_id, $dr_id, $pasien_rm, $pasien, $payor_id, $reg_id;

    protected $listeners = ['pasienReceived', 'pasienCleared'];

    public function pasienReceived($pasien)
    {
        $this->pasien_rm = $pasien['rm'];

        $this->getLastActiveRegistration();
    }

    public function pasienCleared()
    {
        $this->pasien = '';
        $this->register = '';
        $this->unit_id = '';
        $this->dr_id = '';
        $this->pasien_rm = '';
        $this->payor_id = '';
        $this->reg_id = '';
    }

    public function render()
    {
        return view('livewire.registration-box', [
            'register',
            'pasien',
        ]);
    }

    protected $rules = [
        'unit_id' => 'required',
        'dr_id' => 'required',
        'pasien_rm' => 'required',
        'payor_id' => 'required',
    ];

    protected $messages = [
        'unit_id.required' => 'Unit harus diisi',
        'dr_id.required' => 'Dokter harus diisi',
        'payor_id.required' => 'Cara bayar harus diisi',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        if ($this->reg_id) {
            $this->updateForm();
            return true;
        }

        $this->validate();

        $register = RegisterPelayanan::create([
            'date_in' => now(),
            'pasien_rm' => $this->pasien_rm,
            'unit_id' => $this->unit_id,
            'dr_id' => $this->dr_id,
            'payor_id' => $this->payor_id,
        ]);

        $register->jurnal_ralan()->create([
            'register_date' => now()->format('Y-m-d'),
            'pasien_rm' => $this->pasien_rm,
            'unit_id' => $this->unit_id,
            'dr_id' => $this->dr_id,
        ]);

        $this->register = $register;
        $jurnalRalan = JurnalRalan::where([
            'register_date' => now()->format('Y-m-d'),
            'pasien_rm' => $this->pasien_rm,
            'unit_id' => $this->unit_id,
            'dr_id' => $this->dr_id,
        ])->first();

        $this->dispatchBrowserEvent('pasien-registered', ['register' => $register, 'jurnal_ralan' => $jurnalRalan]);
    }

    public function updateForm()
    {
        $this->validate();

        $register = RegisterPelayanan::find($this->reg_id);

        $register->update([
            'unit_id' => $this->unit_id,
            'dr_id' => $this->dr_id,
            'payor_id' => $this->payor_id,
        ]);

        $this->register = $register;

        $this->dispatchBrowserEvent('pasien-register-updated', ['register' => $register]);
    }

    public function getLastActiveRegistration()
    {
        $register = RegisterPelayanan::where([
            'pasien_rm' => $this->pasien_rm,
        ])->orderBy('id', 'desc')->first();

        if ($register && !$register->date_out) {
            $this->unit_id = $register->unit_id;
            $this->dr_id = $register->dr_id;
            $this->payor_id = $register->payor_id;
            $this->reg_id = $register->id;
        }
    }
}
