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
                <form method="POST" action="{{ route('createPatient') }}">
                    @csrf
                    <x-alert  type="normal"/>
                    @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                
                                     <div class="flex justify-start">
                                         <!-- Alert Error -->
                                         <div
                                              class="bg-red-200  p-3 m-2 rounded-md text-xs flex items-center"
                                              >
                                           <svg
                                                viewBox="0 0 24 24"
                                                class="text-red-600 w-5 h-5 sm:w-5 sm:h-5 mr-3"
                                                >
                                             <path
                                                   fill="currentColor"
                                                   d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z"
                                                   ></path>
                                           </svg>
                                           <span class="text-red-800"> {{ $error }}</span>
                                         </div>
                                         <!-- End Alert Error -->

                                     </div>
                                  
                                    
                                @endforeach
                       
                    @endif
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
                    <div class="mt-4">
                        <x-label for="last_name" :value="__('Apellidos')" />

                        <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus />
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
