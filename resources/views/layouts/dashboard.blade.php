<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>

    @livewireStyles

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <x-topnav />


        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="index3.html" class="brand-link">
                <span class="brand-text font-weight-light"><b>MON ESPACE ADMIN</b></span>
            </a>

            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{asset("images/profile.jpg")}}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">
                            {{userFullName()}}
                        </a>
                    </div>
                </div>

                <x-menu />

            </div>

        </aside>



        <div class="content-wrapper">


            <div class="content">
                <div class="container-fluid">
                    @yield("contenu")
                </div>
            </div>

        </div>


        <x-sidebar />


        <x-footer />
    </div>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireScripts
</body>

<script>
    window.addEventListener("showSuccessMessage", event=>{
        // console.log(event.detail);
        swal.fire({
            position: "top-end",
            icon: "success",
            title: event.detail[0].message || "Your work has been saved",
            showConfirmButton: false,
            timer: 3500
        });
    });
</script>

</html>
