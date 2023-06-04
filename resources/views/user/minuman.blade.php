@extends('layout.usermain')

@section('content')
<div class="text-center ml-64 pt-6 text-blue-950 font-semibold tabcontent" id="nasi_goreng">
    
    <!--<h1 class="text-3xl">Menu Management</h1>-->
    <!--h1 nasi goreng bawah, revisi pakai div. ini masih pakai pading right manual-->
    <h1 class="text-center pr-96">Minuman</h1>

    <!-- content -->
    <div class="flex items-start max-w-6xl mx-auto mt-7 ml-5 p-4 border rounded-md font-outfit bg-white">        

        <div class="w-2/3 -ml-8 items-stretch">
            <div class="relative right-0">
            <ul
                class="relative flex list-none flex-wrap rounded-xl bg-blue-gray-50/60 p-1"
                data-tabs="tabs"
                role="list"
                >
                
                <div data-tab-content="" class=" h-100 w-100 bg-gradient-to-br from-gray-300 to-blue-500 rounded-lg">
                    <div class="block opacity-100" id="makanan" role="tabpanel">
                        <section class="grid grid-cols-2 w-full mx-auto gap-3 mt-1 mb-1 px-16 pl-4">
                            
                            @foreach ($minumans as $minuman)
                            <div class="relative flex w-full max-w-[26rem] flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                                <!--GAMBAR-->
                                <div class="relative mx-4 mt-4 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40">
                                    <div class="gambar-menu-cashier w-full h-28 bg-cover rounded-lg" style="background-image: url(/build/images/makanan/nasigoreng.jpeg);">
                                        <img
                                        class = 'object-fill' src="{{ asset('images/' . $minuman->gambar_minuman) }}"
                                        alt="ui/ux review check"
                                        />
                                    </div>
                                    
                                    <div class="to-bg-black-10 absolute inset-0 h-full w-full bg-gradient-to-tr from-transparent via-transparent to-black/60"></div>
                                </div>
                        
                                <!--deskripsi-->
                                <div class="p-6">
                                    <div class="mb-3 flex items-center justify-between">
                                        <h5 class="block font-sans text-xl font-bold leading-snug tracking-normal text-blue-gray-900 antialiased">
                                            {{ $minuman->nama_minuman }}
                                        </h5>
                                    </div>
                                    
                                    <div class="mt-3 flex items-center justify-between">
                                        <h5 class="block font-outfit text-2xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased opacity-70 ">
                                            Rp. {{ $minuman->harga_minuman }}
                                        </h5>
                                    </div>
                                    
                                </div>
                                
                                <!--button-->
                                <div class="grid grid-cols-1">
                                    
                                    <div class="pr-3 pl-3 pb-3 items-center">
                                        <a href="{{route('add_to_cart_minuman', $minuman->id_minuman)}};"><button type="submit" class="btn btn-primary block w-full select-none rounded-lg bg-blue-500 py-2 mt-1  text-white shadow-md hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" data-id ="">Tambah Pesanan</button></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach     

                </div> <!-- div global 1-->
            </div> <!-- div global 2-->
        </div> <!-- div global 3-->

        <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/tabs.js"></script>       
    </div>
</div>
@endsection