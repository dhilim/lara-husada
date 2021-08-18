<div class="border-dotted border-green-400 border flex space-x-4">
    <!-- <form action="registration-ralan" action="post"> -->
    <input type="hidden" wire:model="pasien_rm">
    <input type="hidden" wire:model="reg_id">

    <!-- <input type="text" placeholder="klinik" wire:model="unit_id"> -->
    <select name="unit_id" id="unit_id" placeholder="klinik" wire:model="unit_id" class="flex-1 rounded-md">
        <option value="">-- Pilih klinik --</option>
        <option value="02">Klinik Umum</option>
        <option value="03">Klinik Gigi</option>
        <option value="10">Klinik dalam</option>
    </select>
    @error('unit_id') <span class="error">{{ $message }}</span> @enderror


    <!-- <input type="text" placeholder="dokter" wire:model="dr_id" class="flex-1"> -->
    <select name="dr_id" id="dr_id" wire:model="dr_id" class="flex-1 rounded-md">
        <option value="">-- Pilih dokter --</option>
        <option value="1">dr. Abdul Qadir Jaelani</option>
        <option value="2">dr. Widyawati</option>
        <option value="3">dr. Joko Slamet</option>
    </select>
    @error('dr_id') <span class="error">{{ $message }}</span> @enderror

    <select name="payor_id" id="payor_id" placeholder="klinik" wire:model="payor_id" class="flex-1 rounded-md">
        <option value="">-- Pilih cara bayar --</option>
        <option value="1">Biaya sendiri</option>
        <option value="2">BPJS</option>
        <option value="3">Manulife</option>
    </select>
    @error('payor_id') <span class="error">{{ $message }}</span> @enderror

    @if($register)
    <div>
        <!-- {{ var_dump($register) }} -->
        <div class="text-red-500">{{ $register->date_in->format('d-m-Y H:i') }}</div>
    </div>
    @endif

    <button wire:click="save" wire:loading.attr="disabled" class="bg-green-300 rounded-lg hover:bg-green-600 hover:text-white p-1" class="block">
        <span class="fa fa-spinner animate-spin" wire:loading wire:target="save"></span> Simpan
    </button>
    <div>
        <span class="fa fa-spinner animate-spin" wire:loading wire:target="pasienReceived"></span>
        <!-- {{ var_dump($pasien) }} -->
    </div>
    <!-- </form> -->
</div>

<script>
    window.addEventListener('pasien-registered', event => {
        alert('Pasien teregister, value: ' + event.detail.register.pasien_rm);
        console.log(event.detail.register);
    })

    window.addEventListener('pasien-register-updated', event => {
        alert('Register pasien diubah, value: ' + event.detail.register.pasien_rm);
        console.log(event.detail.register);
    })
</script>
