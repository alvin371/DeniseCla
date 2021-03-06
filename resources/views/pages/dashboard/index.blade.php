<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <title>Dashboard</title>
</head>

<body class="bg-gray-100">


    <!-- start navbar -->
    <div class="md:fixed md:w-full md:top-0 md:z-20 flex flex-row flex-wrap items-center bg-white p-6 border-b border-gray-300">

        <!-- logo -->
        <div class="flex-none w-56 flex flex-row items-center">
            <img src="img/logo.png" class="w-10 flex-none">
            <strong class="capitalize ml-1 flex-1">Eva Grosir</strong>

            <button id="sliderBtn" class="flex-none text-right text-gray-900 hidden md:block">
                <i class="fad fa-list-ul"></i>
            </button>
        </div>
        <!-- end logo -->

        <!-- navbar content toggle -->
        <button id="navbarToggle" class="hidden md:block md:fixed right-0 mr-6">
            <i class="fad fa-chevron-double-down"></i>
        </button>
        <!-- end navbar content toggle -->

        <!-- navbar content -->
        <div id="navbar" class="animated md:hidden md:fixed md:top-0 md:w-full md:left-0 md:mt-16 md:border-t md:border-b md:border-gray-200 md:p-10 md:bg-white flex-1 pl-3 flex flex-row flex-wrap justify-between items-center md:flex-col md:items-center">
            <!-- left -->
            <div class="text-gray-600 md:w-full md:flex md:flex-row md:justify-evenly md:pb-10 md:mb-10 md:border-b md:border-gray-200">
            </div>
            <!-- end left -->

            <!-- right -->
            <div class="flex flex-row-reverse items-center">

                <!-- user -->
                <div class="dropdown relative md:static">

                    <button class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center">
                        <div class="w-8 h-8 overflow-hidden rounded-full">
                            <img class="w-full h-full object-cover" src="img/user.svg">
                        </div>

                        <div class="ml-2 capitalize flex ">
                            <h1 class="text-sm text-gray-800 font-semibold m-0 p-0 leading-none">{{auth()->user()->name}}</h1>
                            <i class="fad fa-chevron-down ml-2 text-xs leading-none"></i>
                        </div>
                    </button>

                    <button class="hidden fixed top-0 left-0 z-10 w-full h-full menu-overflow"></button>

                    <div class="text-gray-500 menu hidden md:mt-10 md:w-full rounded bg-white shadow-md absolute z-20 right-0 w-40 mt-5 py-2 animated faster">

                        <!-- item -->
                        <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="{{url('profile/edit/'.auth()->user()->id)}}">
                            <i class="fad fa-user-edit text-xs mr-1"></i>
                            edit my profile
                        </a>
                        <!-- end item -->


                        <hr>

                        <!-- item -->
                        <form action="/logout" method="post">
                            @csrf
                            <button class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
                                <i class="fad fa-user-times text-xs mr-1"></i>
                                log out
                            </button>
                        </form>
                        <!-- end item -->

                    </div>
                </div>
                <!-- end user -->

            </div>
            <!-- end right -->
        </div>
        <!-- end navbar content -->

    </div>
    <!-- end navbar -->


    <!-- strat wrapper -->
    <div class="h-screen flex flex-row flex-wrap">

        <!-- start sidebar -->
        <div id="sideBar" class="relative flex flex-col flex-wrap bg-white border-r border-gray-300 p-6 flex-none w-64 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster">


            <!-- sidebar content -->
            <div class="flex flex-col">

                <!-- sidebar toggle -->
                <div class="text-right hidden md:block mb-4">
                    <button id="sideBarHideBtn">
                        <i class="fad fa-times-circle"></i>
                    </button>
                </div>
                <!-- end sidebar toggle -->

                <p class="uppercase text-xs text-gray-600 mb-4 tracking-wider">homes</p>

                <!-- link -->
                <a href="/profiles" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
                    <i class="fas fa-id-badge"></i>
                    Profile
                </a>
                <!-- end link -->

                <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">apps</p>

                <!-- link -->
                @if(auth()->user()->role == 'admin')
                <a href="/payroll" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
                    <i class="fad fa-envelope-open-text text-xs mr-2"></i>
                    Data Penggajian
                </a>
                @endif
                <!-- end link -->

                <!-- link -->
                @if(auth()->user()->role == 'admin')
                <a href="/karyawan" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
                    <i class="fad fa-comments text-xs mr-2"></i>
                    Data Karyawan
                </a>
                @endif
                <!-- end link -->

                <!-- link -->
                @if(auth()->user()->role == 'admin' || auth()->user()->role == 'owner')
                <a href="/jabatan" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
                    <i class="fad fa-shield-check text-xs mr-2"></i>
                    Data Jabatan
                </a>
                @endif
                <!-- end link -->

                <!-- link -->
                <a href="/absensi" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
                    <i class="fad fa-calendar-edit text-xs mr-2"></i>
                    Data Absensi
                </a>
                <!-- end link -->

                <!-- link -->
                <a href="/leave-request" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
                    <i class="fad fa-file-invoice-dollar text-xs mr-2"></i>
                    Pengajuan Cuti
                </a>
                <!-- end link -->
                <a href="/pinjaman" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
                    <i class="fad fa-file-invoice-dollar text-xs mr-2"></i>
                    Data Pinjaman
                </a>


            </div>
            <!-- end sidebar conten t -->

        </div>
        <!-- end sidbar -->

        <!-- strat content -->
        <div class="bg-gray-100 flex-1 p-6 md:mt-16">
            @yield('content')

        </div>
        <!-- end content -->

    </div>
    <!-- end wrapper -->

    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
    <!-- end script -->

</body>

</html>
