
    @if(session('message'))
        @if ($type =='float')
            <div class=" alertClass bg-green-200 px-3 py-4 mx-2 my-4 rounded-md text-s flex items-center mx-auto  xl:w-1/6 sm:w-1/6 fixed bottom-0 left-10">
        @else
            <div class=" alertClass bg-green-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto w-full xl:w-3/4 ">
        @endif    
            <svg viewBox="0 0 24 24" class="text-green-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
                <path fill="currentColor"
                    d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
                </path>
            </svg>
            <span class="text-green-800"> {{ session('message') }}</span>
        </div>
        <script>
            setTimeout(function() {
                document.querySelector('.alertClass').style.display ="none";
    
            },2000)
        </script>
    @elseif(session('alertError'))
    <div class="bg-red-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto w-full xl:w-3/4 ">
        <svg viewBox="0 0 24 24" class="text-red-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
            <path fill="currentColor"
                d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
            </path>
        </svg>
        <span class="text-red-800"> {{ session('alertError') }}</span>
    </div>
    <script>
        setTimeout(function() {
            document.querySelector('.alertClass').style.display ="none";

        },3000)
    </script>
    @endif    

