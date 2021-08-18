<div class="flex space-x-4">
    <form wire:submit.prevent="create" method="post">
        <input type="hidden" name="pasien_id" wire:model="pasien.id">
        <input type="text" class="flex-1 rounded-md" placeholder="Nama" wire:model="pasien.name">
        <select name="gender" id="gender" wire:model="pasien.gender" class="flex-1 rounded-md">
            <option value="">-- Pilih jenis kelamin --</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
        <button wire:loading.attr="disabled" class="bg-green-300 rounded-lg hover:bg-green-600 hover:text-white p-1" class="block">
            <span class="fa fa-spinner animate-spin" wire:loading wire:target="create"></span> Simpan
        </button>
    </form>
</div>
