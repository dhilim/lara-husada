<div class="grid grid-flow-col">
    <div class="col-span-full">
        <form wire:submit.prevent="save" method="post">
            <input type="hidden" wire:model="pasien_rm">
            <input type="hidden" wire:model="reg_id">
            <div class="grid grid-cols-12 gap-x-6">
                @if($reg_id)
                <div class="col-span-12 my-2">
                    <div class="float-right block text-sm font-medium text-gray-700">No. Register: <span>{{ $reg_id }}</span>
                    </div>
                </div>
                @endif
                <div class="col-span-4">
                    <div class="col-span-full my-2">
                        <label for="unit" class="block text-sm font-medium text-gray-700">
                            Klinik
                        </label>
                        <!-- <input wire:model="pasien.name" type="text" name="unit" id="unit" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-400 shadow-sm" placeholder="Nama pasien"> -->
                        <select name="unit_id" id="unit_id" placeholder="klinik" wire:model="unit_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-400 shadow-sm">
                            <option value="" class="text-grey-400">-- Pilih klinik --</option>
                            <option value="02">Klinik Umum</option>
                            <option value="03">Klinik Gigi</option>
                            <option value="10">Klinik dalam</option>
                        </select>
                        @error('unit_id') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-span-4">
                    <div class="col-span-full my-2">
                        <label for="unit" class="block text-sm font-medium text-gray-700">
                            Dokter
                        </label>
                        <select name="dr_id" id="dr_id" placeholder="klinik" wire:model="dr_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-400 shadow-sm">
                            <option value="">-- Pilih dokter --</option>
                            <option value="1">dr. Abdul Qadir Jaelani</option>
                            <option value="2">dr. Widyawati</option>
                            <option value="3">dr. Joko Slamet</option>
                        </select>
                        @error('dr_id') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-span-4">
                    <div class="col-span-full my-2">
                        <label for="unit" class="block text-sm font-medium text-gray-700">
                            Cara Bayar
                        </label>
                        <select name="payor_id" id="payor_id" placeholder="klinik" wire:model="payor_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-400 shadow-sm">
                            <option value="">-- Pilih cara bayar --</option>
                            <option value="1">Biaya sendiri</option>
                            <option value="2">BPJS</option>
                            <option value="3">Manulife</option>
                        </select>
                        @error('payor_id') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-span-12 my-2">
                    <button wire:loading.attr="disabled" class="bg-green-400 rounded-lg hover:bg-green-800 hover:text-white p-2 float-right">
                        <span class="fa fa-spinner animate-spin" wire:loading wire:target.submit="save"></span> Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    window.addEventListener('pasien-registered', event => {
        alert('Pasien berhasil terdaftar ke klinik ' + event.detail.register.unit_id + ' oleh dokter ' + event.detail.register.dr_id + ' dengan nomor urut: ' + event.detail.jurnal_ralan.queue);
        console.log(event.detail);
    })

    window.addEventListener('pasien-register-updated', event => {
        alert('Register pasien diubah, value: ' + event.detail.register.pasien_rm);
        console.log(event.detail.register);
    })
</script>
