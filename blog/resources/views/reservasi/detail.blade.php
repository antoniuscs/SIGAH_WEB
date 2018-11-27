@include('dashboard._header')

<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="box">
            <h2>Detail Reservasi</h2>
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toogle</a>
            <br/><br>
            @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
            @endif
            <div class="pull-right">
            <a href="{{ route('reservasi.index') }}" class="btn btn-warning btn-s"><i class="glyphicon glyphicon-chevron-left"></i>Kembali ke Pengelolaan</a>
            </div>
            <div style="margin-bottom:20px;">

            </div>
            <div class="box">
            <h3>Detail Reservasi Fasilitas</h3>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Kode Booking</th>                        
                        <th>Nama Fasilitas</th>
                        <th>Jumlah Fasilitas</th>
                    </tr>
                </thead> 
                <tbody>
                    @foreach($detailreservasifasilitas as $df)
                    <tr>
                        <td>{{ $df->get_reservasi->id_booking }}</td>
                        <td>{{ $df->get_fasilitas->nama_fasilitas }}</td>
                        <td>{{ $df->jumlah_fasilitas }}</td>  
                    </tr>  
                    @endforeach 
                </tbody>
                </table>
            </div>
            </div>
            <div class="box">
            <h3>Detail Reservasi Kamar</h3>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Kode Booking</th>                        
                        <th>Nama Kamar</th>
                        <th>Jumlah Kamar</th>
                    </tr>
                </thead> 
                <tbody>
                    @foreach($detailreservasikamars as $dk)
                    <tr>
                        <td>{{ $dk->get_reservasi->id_booking }}</td>
                        <td>{{ $dk->get_kamar->kode_kamar }}</td>
                        <td>{{ $dk->jumlah_kamar }}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            </div>
            <div class="pull-right">
            </div>
        </div>
    </div>
</div>
@include('dashboard._footer')