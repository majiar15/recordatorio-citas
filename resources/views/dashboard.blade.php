<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pacientes') }}
        </h2>
        <style>
            .animated {
                -webkit-animation-duration: 1s;
                animation-duration: 1s;
                -webkit-animation-fill-mode: both;
                animation-fill-mode: both;
            }
        
            .animated.faster {
                -webkit-animation-duration: 500ms;
                animation-duration: 500ms;
            }
        
            .fadeIn {
                -webkit-animation-name: fadeIn;
                animation-name: fadeIn;
            }
        
            .fadeOut {
                -webkit-animation-name: fadeOut;
                animation-name: fadeOut;
            }
        
            @keyframes fadeIn {
                from {
                    opacity: 0;
                }
        
                to {
                    opacity: 1;
                }
            }
        
            @keyframes fadeOut {
                from {
                    opacity: 1;
                }
        
                to {
                    opacity: 0;
                }
            }
        </style>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (!isset($patients))
                    <h2>No hay registros</h2>
                    @else                        
                    <!-- component -->
                    <section class="container mx-auto p-6 font-mono ">
                        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                            <div class="w-full overflow-x-auto scroll-hidden">
                                <x-alert  type="float"/>
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
                                        @foreach ($patients as $patient)
                                        <tr class="text-gray-700">
                                            <td class="px-4 py-3 text-ms font-semibold border">{{$patient->cc}}</td>
                                            <td class="px-4 py-3 border">
                                                <div class="flex items-center text-sm">
                                                    
                                                    <div>
                                                        <p class="font-semibold text-black">{{$patient->name}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-ms font-semibold border">{{$patient->proxima_cita}}</td>
                                            <td class="py-3 px-6 text-center border">
                                                <div class="flex item-center justify-center">

                                                    
                                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer">
                                                        <a href="{{route('editPatient',['id' => $patient->id])}}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    
                                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer" id="delete{{$patient->id}}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{ $patients->links() }}
                    </section>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <script>
        function openModalPromise() {
            
            return new Promise((resolve, reject) => {
                let section = document.querySelector('section');
                
                section.innerHTML += `
                <div class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
                style="background: rgba(0,0,0,.7);">
                <div
                    class="border border-teal-500 shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                    <div class="modal-content py-4 text-left px-6">
                        <!--Title-->
                        <div class="flex justify-between items-center pb-3">
                            <p class="text-2xl font-bold">¿Estas Seguro?</p>
                            <div class="modal-close cursor-pointer z-50" id="close">
                                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 18 18">
                                    <path
                                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <!--Body-->
                        <div class="my-5">
                            <p>Al eliminar este registro no se podra recuperar</p>
                        </div>
                        <!--Footer-->
                        <div class="flex justify-end pt-2">
                            <button
                                class="focus:outline-none modal-close px-4 bg-gray-400 p-3 rounded-lg text-black hover:bg-gray-300" id="cancel">Cancelar</button>
                            <button
                                class="focus:outline-none px-4 bg-blue-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400" id="confirm">Aceptar</button>
                        </div>
                    </div>
                </div>
                </div>
                `;
                const modal = document.querySelector('.main-modal');
                const cancelButton = document.querySelector('#cancel');
                const closeButton = document.querySelector('#close');
                const confirmButton = document.querySelector('#confirm');
    
                const modalClose = (close) => {
                    modal.classList.remove('fadeIn');
                    modal.classList.add('fadeOut');
                    setTimeout(() => {
                        modal.remove();
                        if(close){
                            return reject(new Error('cerrando el modal cancelado'));
                        }
                    }, 500);
                }
                const openModalfn = () => {
                    modal.classList.remove('fadeOut');
                    modal.classList.add('fadeIn');
                    modal.style.display = 'flex';
                }
                openModalfn();
                closeButton.addEventListener('click', ()=>{
                    modalClose(true);
                });
                cancelButton.addEventListener('click', ()=>{
                    modalClose(true);
                });
                confirmButton.addEventListener('click', ()=>{
                    modalClose(false);
                    
                    return resolve();
                });
    
            });
        }
        
        let arrayIds = [@php
            foreach ($patients as $patient){
                echo($patient->id.',');
            }
        @endphp];
        console.log(arrayIds);
        function addsevent(){
            
            for(i= 0; i< arrayIds.length; i++){
                let aux = arrayIds[i];
                document.querySelector('#delete'+aux).addEventListener('click', () =>{
                    console.log('click element '+aux);
                      openModalPromise()
                        .then(()=>{ 
                            window.location.href = "./delete/"+aux;
                            console.log('salida');
                        })
                        .catch(error => {
                            addsevent();
                        });       
                })
                console.log("hehehe")
            }
        }
     addsevent();

        

    </script>

</x-app-layout>
