<div>
    <div><input type="text" wire:keydown.enter="search" wire:model.lazy="rm" /> <span class="fa fa-spinner animate-spin" wire:loading wire:target="search"></span></div>
    <br>
    @if($pasien)
    <div>No.RM: {{ $pasien->rm }}</div>
    <div>Nama: {{ $pasien->name }}</div>
    @endif
</div>