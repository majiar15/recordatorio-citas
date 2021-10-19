<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pacientes') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl text-center">Registrar Paciente</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <!-- CC -->
                    <div>
                        <x-label for="cc" :value="__('CC')" />

                        <x-input id="cc" class="block mt-1 w-full" type="text" name="cc" :value="old('cc')" required autofocus />
                    </div>
                    <!-- Name -->
                    <div class="mt-4">
                        <x-label for="name" :value="__('Nombres')" />

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    </div>

                    <!-- number -->
                    <div class="mt-4">
                        <x-label for="number" :value="__('Numero')" />

                        <x-input id="number" class="block mt-1 w-full"
                                        type="number"
                                        name="number"
                                        required autocomplete="number" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        

                        <x-button class="ml-4">
                            {{ __('Crear') }}
                        </x-button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
