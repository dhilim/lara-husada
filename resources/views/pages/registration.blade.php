<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pendaftaran Pasien
        </h2>
    </x-slot>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <livewire:pasien-search />
                    <div x-data="{ tab: 'identity' }" id="tab_wrapper">
                        <nav class="flex flex-col sm:flex-row">
                            <a :class="{ 'text-blue-500 border-b-2 font-medium border-blue-500': tab === 'identity' }" class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none" @click.prevent="tab = 'identity'" href="#">Identitas</a>
                            <a :class="{ 'text-blue-500 border-b-2 font-medium border-blue-500': tab === 'registration' }" class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none" @click.prevent="tab = 'registration'" href="#">Registrasi</a>
                        </nav>

                        <!-- The tabs content -->
                        <div x-show="tab === 'identity'" class="py-4">
                            <livewire:pasien-identity />
                        </div>
                        <div x-show="tab === 'registration'" class="py-4">
                            <livewire:registration-box />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-red-200 border-b border-gray-200">
                    <livewire:counter />
                </div>
            </div>
        </div>
    </div>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-green-100 border-b border-gray-200">
                    <livewire:user-search />
                </div>
            </div>
        </div>
    </div> -->
</x-app-layout>
