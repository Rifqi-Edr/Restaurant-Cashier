<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 " aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gradient-to-tl from-sky-300 to-indigo-800">
        <ul class="space-y-2 font-medium">
            <li>
                <h1 class="text-center border-b-2 text-black pb-2">PPLBO-Cashier</h1>
            </li>
            <!--
            <li>
                <form>   
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative "> <!--mt-6 mx-64
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
            
                        <input type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-3xl bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Menu">
            
                        <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-2xl text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                    </form>
            </li>
            -->
            <li>
                <h1 class="text-center mt-5 text-black">MAKANAN</h1>
            </li>
            
            <li>
                <a href="/makanan">
                    <button class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 bg-cover" style="background-image: url('/build/images/makanan/nasigoreng.jpeg');">
                    <svg aria-hidden="true" class="w-6 h-6 text-black-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                        <span class="ml-3">Makanan</span>
                    </button>
                </a>
            </li>
            <hr>
            <li>
                <h1 class="text-center mt-5 text-black">MINUMAN</h1>
            </li>
            <li>
                <a href="/minuman">  
                    <button class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 bg-cover" style="background-image: url('/build/images/makanan/gurame.jpeg');">
                    <svg aria-hidden="true" class="w-6 h-6 text-black-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                        <span class="ml-3">Minuman</span>
                    </button>
                </a>
            </li>
            <hr>  
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700" onclick="openTab(event, 'Report')">
                        <svg aria-hidden="true" class="w-6 h-6 text-black-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                        <span class="ml-3">Logout</span>
                    </button>
                </form>
            </li>    
        </ul>
        
    </div>            
</aside>