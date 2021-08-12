<div>
    <!-- <form action="registration-ralan" action="post"> -->
    This is registration box
    <input type="text" placeholder="klinik" wire:model="unit_id">
    <input type="text" placeholder="dokter" wire:model="dr_id">
    @if($register)
    <div>
        {{ var_dump($register) }}
        <div class="text-red-500">{{ $register->date_in->format('d-m-Y H:i') }}</div>
    </div>
    @endif
    <button wire:click="save" wire:loading.attr="disabled" class="bg-green-300 rounded-lg hover:bg-green-600 hover:text-white p-1">
        <span class="fa fa-spinner animate-spin" wire:loading wire:target="save"></span> Simpan
    </button>
    <div>
        <span class="fa fa-spinner animate-spin" wire:loading wire:target="pasienReceived"></span>
        {{ var_dump($pasien) }}
    </div>
    <!-- </form> -->

    <div x-data="{ open: false }" @pasien-registered.window="open = false">
        pasien teregister
    </div>
</div>

<script>
    window.addEventListener('pasien-registered', event => {
        alert('Pasien teregister, value: ' + event.detail.register.pasien_rm);
        console.log(event.detail.register);
    })
</script>
