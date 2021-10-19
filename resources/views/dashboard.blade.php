<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pacientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- component -->
                    <section class="container mx-auto p-6 font-mono ">
                        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                            <div class="w-full overflow-x-auto scroll-hidden">
                                <table class="w-full">
                                    <thead>
                                        <tr
                                            class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                            <th class="px-4 py-3">CC</th>
                                            <th class="px-4 py-3">Nombre</th>
                                            <th class="px-4 py-3"> Proxima cita</th>
                                            <th class="px-4 py-3">Acciones</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        <tr class="text-gray-700">
                                            <td class="px-4 py-3 text-ms font-semibold border">1007372725</td>
                                            <td class="px-4 py-3 border">
                                                <div class="flex items-center text-sm">
                                                    
                                                    <div>
                                                        <p class="font-semibold text-black">Martin Jimenez</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-ms font-semibold border">20/10/2021</td>
                                            <td class="py-3 px-6 text-center border">
                                                <div class="flex item-center justify-center">

                                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                        </svg>
                                                    </div>
                                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
