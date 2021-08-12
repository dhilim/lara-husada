<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todo List') }}
        </h2>
    </x-slot>
    <div class="container">
        <h1 class="title text-center">Laravel Livewire Todo</h1>
        <div class="row">
            <div class="col-md-3">

                @livewire('todo.todo-notification-component')
                <!-- This component will show notification when todo is saved or updated -->

                @livewire('todo.form-component')
                <!-- This component will display Todo form -->

            </div>

            <div class="col-md-9">

                @livewire('todo.list-component')
                <!-- This component will list Todos -->

            </div>
        </div>
    </div>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <livewire:counter />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>