<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <link rel="icon" 
      type="image/png" 
      href="images/network.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrator SIGAH</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }} " rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <!-- Custom CSS -->
    <link href="{{ URL::asset('css/simple-sidebar.css') }} " rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="{{ route('dashboard.create') }}">
                        SIGAH
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.create') }}">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('customer.index') }}">Pengelolaan Customer</a>
                </li>
                <li>
                    <a href="{{ route('staff.index') }}">Pengelolaan Staff</a>
                </li>
                <li>
                    <a href="{{ route('kamar.index') }}">Pengelolaan Kamar</a>
                </li>
                <li>
                    <a href="{{ route('jenisKamar.index') }}">Pengelolaan Jenis Kamar</a>
                </li>
                <li>
                    <a href="{{ route('fasilitas.index') }}">Pengelolaan Fasilitas</a>
                </li>
                <li>
                    <a href="{{ route('tempatTidur.index') }}">Pengelolaan Tempat Tidur</a>
                </li>
                <li>
                    <a href="{{ route('season.index') }}">Pengelolaan Season</a>
                </li>
                <li>
                    <a href="{{ route('reservasi.index') }}">Pengelolaan Reservasi</a>
                </li>
                <li>
                    <a href="{{ route('transaksi.index') }}">Pengelolaan Transaksi</a>
                </li>
                <!-- <li>
                    <a href="{{ route('lpjc') }}">Laporan Pendapatan Per Jenis Customer</a>
                </li> -->
                <li>
                    <a href="{{ route('ptc') }}">Laporan Pendapatan (Cabang)</a>
                </li>
                <li>
                    <a href="{{ route('lpjtkc') }}">Laporan Jumlah Tamu</a>
                </li>
                <li>
                    <a href="{{ route('lpjcc') }}">Laporan Pendapatan (Customer)</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"><span class="text-danger">Log Out</span></a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
