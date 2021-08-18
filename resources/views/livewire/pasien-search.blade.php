<div>
    <div><input type="text" wire:keydown.enter="search" wire:model.lazy="rm" /> <button wire:click="clearPasien" class="bg-red-500 hover:bg-red-700" title="bersihkan">X</button> <span class="fa fa-spinner animate-spin" wire:loading wire:target="search"></span></div>
    <br>
    @if($pasien)
    <div>No.RM: {{ $pasien->rm }}</div>
    <div>Nama: {{ $pasien->name }}</div>
    @endif
</div>
