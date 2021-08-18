<div>
    <div><input type="text" wire:keydown.enter="search" wire:model.lazy="rm" class="rounded-md w-1/4" placeholder="ketik nomor rm dan tekan enter" /> <button wire:click="clearPasien" class="bg-red-500 hover:bg-red-700" title="bersihkan">X</button> <span class="fa fa-spinner animate-spin" wire:loading wire:target="search"></span></div>
    <br>
    @if($pasien)
    <div>No.RM: {{ $pasien->rm }}</div>
    <div>Nama: {{ $pasien->name }}</div>
    <div>J.Kelamin: {{ $pasien->gender == 'L' ? 'Laki-laki' : ($pasien->gender == 'P' ? 'Perempuan' : '-')  }}</div>
    @endif
</div>

<script>
    window.addEventListener('pasien-not-found', event => {
        alert('Tidak ditemukan pasien dengan Nomor RM tersebut!')
    })
</script>
