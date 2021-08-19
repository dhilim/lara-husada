<div>
    <!-- <div><input type="text" wire:keydown.enter="search" wire:model.lazy="rm" class="rounded-md w-1/4" placeholder="ketik nomor rm dan tekan enter" /> <button wire:click="clearPasien" class="bg-red-500 hover:bg-red-700" title="bersihkan">X</button> <span class="fa fa-spinner animate-spin" wire:loading wire:target="search"></span></div> -->
    <div class="mt-1 flex rounded-md shadow-sm w-1/4">
        <input type="text" class="w-full focus:ring-indigo-500 focus:border-indigo-500 flex-1 block rounded-none rounded-l-md sm:text-sm border-gray-300 " wire:keydown.enter="search" wire:model.lazy="rm" placeholder="ketik nomor rm dan tekan enter">
        <button title="bersihkan" wire:click="clearPasien" class="bg-red-500 hover:bg-red-700 inline-flex items-center px-3 rounded-r-md text-white text-sm">
            X
        </button>
    </div>
    <br>
    <div class="fa fa-spinner animate-spin" wire:loading wire:target="search"></div>
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
