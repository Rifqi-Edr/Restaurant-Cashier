<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/7b19fe169f.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css') 
</head>
<body class="font-outfit">

    <div class="bg-slate-50 min-h-screen">
    <!-- left side bar menu -->  
        @include('partials.usersidebar')
        
    <!-- content -->
    <div class="content">
        @yield('content')
    </div>

    <div class="right-side-cart">
        @include('partials.cart')
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
        @yield('scripts')

    </div>
</body>
</html>