<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Resto</title>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
  @vite('resources/css/app.css')
</head>
<body>
  <main class="bg-gradient-to-br from-gray-300 to-blue-500 min-h-screen flex items-center justify-center p-8 md:p-0">
    <div class="bg-blue-100 shadow-lg flex flex-col items-center rounded-xl overflow-hidden lg:flex-row lg:w-2/3 2xl:w-1/2">

      <!-- form -->
      <div class="p-8 lg:w-1/2 sm:p-8">
        <h1 class="font-bold text-gray-800 text-3xl md:text-3xl md:mb-16">SELAMAT DATANG DI KASIR KELOMPOK 3</h1>

        <h3 class="text-2xl font-semibold mt-8 mb-6 text-gray-700">Please Fill In your Username and Password</h3>

        <form action="{{route('login.post')}}" method="POST" class="flex flex-col">
            @csrf
            <div id="input-field" class="flex flex-col mb-4 relative">
                <i class="fi fi-rr-envelope absolute top-11 right-5 text-zinc-400"></i>
                <label for="username" class="mb-2 text-gray-700">Username</label>
                <input type="text" name="username" id="username" placeholder="Username" class="px-4 py-2 border-2 border-slate-300 rounded-md max-w-full focus:border-blue-500 focus:outline-none" required>
            </div>

            <div id="input-field" class="flex flex-col relative">
                <i class="fi fi-rr-lock absolute top-11 right-5 text-zinc-400"></i>
                <label for="password" class="mb-2 text-gray-700">Password</label>
                <input type="password" id="password" name="password" placeholder="your password" class="px-4 py-2 border-2 border-slate-300 rounded-md max-w-full focus:outline-none focus:border-blue-500" required>
            </div>

            <button class="my-6 bg-blue-600 hover:bg-blue-700 text-white font-medium text-lg px-4 py-2 rounded-md" >Login</button>
        </form>

        

      </div>

      <!-- image -->
      <div class="w-1/2">
        <img src="{{ asset('images/ppp.png') }}" alt="" class="h-f lg:block hidden">

      </div>



      </div>
    </div>
  </main>
  
</body>
</html>