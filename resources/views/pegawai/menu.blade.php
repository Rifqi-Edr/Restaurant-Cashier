@extends('layout/main')

@section('head')
    <div>
        <h1 class="text-6xl font-outfit font-semibold text-center mt-20">Menu Management</h1>
    </div>
@endsection

@section('tambah')
<div class="w-3/4 mt-10 px-4 mx-auto">
    <div class="flex items-center justify-between">
      <h1 class="text-2xl font-bold">Menu</h1>
        <div class="flex items-center justify-end">
          <a href="{{route('add.page')}}"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg mr-2">Tambah Menu Baru</button>
          </a>
        </div>
    </div>
  </div>
@endsection

@section('tabel')
    <div class="flex items-start justify-center max-w-6xl mx-auto mt-7 p-4 border rounded-md font-outfit bg-slate-100">        

    <div class="w-full mx-auto">
      <div class="relative right-0">
          <ul
          class="relative flex list-none flex-wrap rounded-xl bg-blue-gray-50/60 p-1"
          data-tabs="tabs"
          role="list"
          >

              <li class="z-30 flex-auto text-center">
                  <a
                  class="text-slate-700 z-30 mb-0 flex w-full cursor-pointer items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 transition-all ease-in-out"
                  data-tab-target=""
                  active=""
                  role="tab"
                  aria-selected="true"
                  aria-controls="makanan"
                  >
                  <span class="ml-1">Makanan</span>
                  </a>
              </li>

              <li class="z-30 flex-auto text-center">
                  <a
                  class="text-slate-700 z-30 mb-0 flex w-full cursor-pointer items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 transition-all ease-in-out"
                  data-tab-target=""
                  role="tab"
                  aria-selected="false"
                  aria-controls="minuman"
                  >
                  <span class="ml-1">Minuman</span>
                  </a>
              </li>

          </ul>


          <div data-tab-content="" class="p-5 bg-white">


              <!--TABS MAKANAN-->
              <div class="block opacity-100" id="makanan" role="tabpanel">
                  
                  <!--SUB KATEGORI
                  <section>
                    <ul class="grid w-full gap-6 md:grid-cols-6 p-4 ">
                        <li>
                            <input type="radio" id="hosting-small" name="hosting" value="hosting-small" class="hidden peer" required>
                            
                            <label for="hosting-small" class="inline-flex items-center justify-center w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">    
                    
                                <div class="block">
                                    <div class="w-full text-base font-semibold">nasi goreng</div>
                                </div>
                            </label>
                            
                        </li>
                    </ul>
                  </section>
                  -->

                  <!--menu-->
                  <section class="grid grid-cols-3 w-full mx-auto gap-10 mt-1 mb-1 p-8">
                    @foreach($makanans as $makanan)
                    <div class="relative flex w-full max-w-[26rem] flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                      <!--GAMBAR-->
                      <div class="relative mx-4 mt-4 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40">
                        <img
                          src="{{ asset('images/' . $makanan->gambar_makanan) }}"
                          alt="ui/ux review check"
                        />
                        <div class="to-bg-black-10 absolute inset-0 h-full w-full bg-gradient-to-tr from-transparent via-transparent to-black/60"></div>
                      </div>

                      <!--deskripsi-->
                      <div class="p-6">
                        <div class="mb-3 flex items-center justify-between">
                          <h5 class="block font-sans text-xl font-bold leading-snug tracking-normal text-blue-gray-900 antialiased">
                            {{ $makanan->nama_makanan }}
                          </h5>
                        </div>

                        <div class="mt-3 flex items-center justify-between">
                          <h5 class="block font-outfit text-2xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased opacity-70 ">
                            Rp. {{ $makanan->harga_makanan }}
                          </h5>
                        </div>
                      </div>

                      <!--button-->
                      <div class="grid grid-cols-2">
                        <div class="pr-3 pl-3">
                          <form action="{{ route('menu.makanan.delete', $makanan->id_makanan) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="block w-full select-none rounded-lg bg-red-500 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                                Hapus
                            </button>
                        </form>
                        
                        </div>

                        <div class="pr-3 pl-3 pb-3 -ml-5">
                          <a
                            href="{{ route('menu.edit', ['makanan', $makanan->id_makanan]) }}"
                            class="block w-full select-none rounded-lg bg-blue-500 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="button"
                          >
                            Edit
                          </a>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </section>
    
              </div>


              <!--TABS MINUMAN-->
              <div class="hidden opacity-0" id="minuman" role="tabpanel">
                  <!--TABS MINUMAN
                  <section>
                    <ul class="grid w-full gap-6 md:grid-cols-6 p-4 ">
                      
                        <li>
                            <input type="radio" id="hosting-small" name="hosting" value="hosting-small" class="hidden peer" required>
                            
                            <label for="hosting-small" class="inline-flex items-center justify-center w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">    
                    
                                <div class="block">
                                    <div class="w-full text-base font-semibold">MISUEEE</div>
                                </div>
                            </label>
                            
                        </li>
                        
                    </ul>
                  </section>-->

                  <!--menu-->
                  <section class="grid grid-cols-3 w-full mx-auto gap-10 mt-1 mb-1 p-8">
                    @foreach($minumans as $minuman)
                    <div class="relative flex w-full max-w-[26rem] flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                      <!--GAMBAR-->
                      <div class="relative mx-4 mt-4 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40">
                        <img
                          src="{{ asset('images/' . $minuman->gambar_minuman) }}"
                          alt="ui/ux review check"
                        />
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
                      <div class="grid grid-cols-2">
                        <div class="pr-3 pl-3">
                          <form action="{{ route('menu.minuman.delete', $minuman->id_minuman) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="block w-full select-none rounded-lg bg-red-500 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                                Hapus
                            </button>
                        </form>
                        </div>

                        <div class="pr-3 pl-3 pb-3 -ml-5">
                          <a
                            href="{{ route('menu.edit', ['minuman', $minuman->id_minuman]) }}"
                            class="block w-full select-none rounded-lg bg-blue-500 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="button"
                          >
                            Edit
                          </a>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </section>
              </div>

          </div>
          
      </div>
  </div>

  <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/tabs.js"></script> 
@endsection



