<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  @vite('resources/css/app.css')
  <script>
    tailwind.config = {
          theme : {
              extend: {
                  fontFamily: {
                      outfit: ['Outfit']
                  },

                  colors: {
                      'abu': ['#F3F3F3']
                  }
              }
          }
      }
  </script>
</head>
<body class="font-outfit">

  <div class="bg-slate-50 min-h-screen">

    <!-- main 1-->
    <div class="ml-64 pt-6 text-blue-950 font-semibold tabcontent" id="Menu">
      <h1 class="text-3xl text-center pb-32">Edit</h1>
      <!-- edit -->
      @if($jenis == 'makanan')
      <div class="">
        <form action="{{ route('menu.update', ['jenis' => $jenis, 'id' => $menu->id_makanan]) }}" method="POST" enctype="multipart/form-data">   
          @csrf
          @method('PUT')
          <div class="relative mt-6 mx-64 ">
            <span class="block text-xl text-slate-700 pb-5">Nama :</span>
            <input type="text" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-3xl bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="nama" placeholder="Nama Item" value="{{ $menu->nama_makanan }}" required>
          </div>
          <div class="relative mt-6 mx-64 ">
            <span class="block text-xl text-slate-700 pb-5">Kategori :</span>
            <input type="text" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-3xl bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="kategori" placeholder="Kategori Item" value="{{ $menu->kategori_makanan }}" required>
          </div>
          <div class="relative mt-6 mx-64 ">
            <span class="block text-xl text-slate-700 pb-5">Harga :</span>
            <input type="text" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-3xl bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="harga" placeholder="Harga Item" value="{{ $menu->harga_makanan }}" required>
          </div>
          <div class="relative mt-6 mx-64 ">
            <span class="block text-xl text-slate-700 pb-5">Gambar :</span>
            <input type="file" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-3xl bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="gambar" placeholder="Search Menu">
          </div>
          <div class="relative mt-6 mx-64 ">
            <input type="submit" class="block w-full select-none rounded-lg bg-blue-500 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" value="Simpan">
          </div>
        </form>
        <div class="mt-8 mx-64">
          <a href="/menu" class="block w-full select-none rounded-lg bg-red-500 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">Kembali</a>
        </div>
      </div> 
      @else 
      <div class="">
        <form action="{{ route('menu.update', ['jenis' => $jenis, 'id' => $menu->id_minuman]) }}" method="POST" enctype="multipart/form-data">   
          @csrf
          @method('PUT')
          <div class="relative mt-6 mx-64 ">
            <span class="block text-xl text-slate-700 pb-5">Nama :</span>
            <input type="text" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-3xl bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="nama" placeholder="Nama Item" value="{{ $menu->nama_minuman }}" required>
          </div>
          <div class="relative mt-6 mx-64 ">
            <span class="block text-xl text-slate-700 pb-5">Kategori :</span>
            <input type="text" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-3xl bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="kategori" placeholder="Kategori Item" value="{{ $menu->kategori_minuman }}" required>
          </div>
          <div class="relative mt-6 mx-64 ">
            <span class="block text-xl text-slate-700 pb-5">Harga :</span>
            <input type="text" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-3xl bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="harga" placeholder="Harga Item" value="{{ $menu->harga_minuman}}" required>
          </div>
          <div class="relative mt-6 mx-64 ">
            <span class="block text-xl text-slate-700 pb-5">Gambar :</span>
            <input type="file" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-3xl bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="gambar" placeholder="Search Menu">
          </div>
          <div class="relative mt-6 mx-64 ">
            <input type="submit" class="block w-full select-none rounded-lg bg-blue-500 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" value="Simpan">
          </div>

          
        </form>

        <div class="mt-8 mx-64">
          <a href="/menu" class="block w-full select-none rounded-lg bg-red-500 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">Kembali</a>
        </div>

            
      </div> 
      @endif
      <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/tabs.js"></script>       
      </div>
    </div>

    <script>
      function openTab(event, tabName) {
        // Declare all variables
        var i, tabcontent, tablinks;
  
        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
  
        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].classList.remove("active");
        }
  
        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(tabName).style.display = "block";
        event.currentTarget.classList.add("active");
      }
  
      // Get the element with id="defaultOpen" and click on it
      document.getElementById("defaultOpen").click();
    </script>

</body>
</html>