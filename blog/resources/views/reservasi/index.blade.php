@include('dashboard._header')

<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="box">
            <h2>Pengelolaan Reservasi</h2>
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toogle</a>
            <br/><br>
            @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
            @endif
            <div class="pull-right">
                <a href="{{ route('reservasi.index') }}" class="btn btn-default btn-s"><i class="glyphicon glyphicon-refresh"></i>Refresh</a>
                <a href="{{ route('reservasi.detail') }}" class="btn btn-info btn-s">Detail Reservasi</a>
            </div>
            <div style="margin-bottom:20px;">
            
                <form class="form-inline" action="{{ route('reservasi.index') }}" method="get">
                 <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Pencarian">
                 </div>
                 <div class="form-group">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                 </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Kode Booking</th>
                        <th>Nama Customer</th>
                        <th>Jumlah Dewasa</th>
                        <th>Jumlah Anak</th>
                        <th>Tanggal Reservasi</th>
                        <th>Tanggal Check In</th>
                        <th>Tanggal Check Out</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Status Reservasi</th>
                        <th>Kode Lokasi</th>
                        <th colspan="3"><i class="glyphicon glyphicon-cog"></i> Pengaturan</th>
                    </tr>
                </thead> 
                <tbody>
                    
                    @foreach($reservasis as $value)
                    <tr>
                        <td>{{ $value->id_booking }}</td>
                        <td>{{ $value->get_customer->nama_depan }} {{ $value->get_customer->nama_belakang }}</td>
                        <td>{{ $value->jumlah_anak }}</td>
                        <td>{{ $value->jumlah_dewasa }}</td>
                        <td>{{ date("d-M-Y", strtotime($value->tanggal_reservasi)) }}</td>
                        <td>{{ date("d-M-Y", strtotime($value->tanggal_check_in)) }}</td>
                        <td>{{ date("d-M-Y", strtotime($value->tanggal_check_out)) }}</td>
                        <td>{{ date("d-M-Y", strtotime($value->tanggal_pembayaran)) }}</td>
                        <td>{{ $value->status_reservasi}}</td>
                        <td>{{ $value->get_lokasi->nama_kota_kabupaten }}</td>
                        <td>
                        <form action="{{ route('reservasi.updateStatus', $value['id']) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PATCH" />
                            <button type="submit" onclick="return confirm('Apakah Anda yakin akan membatalkan reservasi ini?')" 
                            class="btn btn-primary btn-xs">
                            <i class="glyphicon glyphicon-remove-sign"></i> Batal Reservasi</button>
                        </form>
                        <br>
                        <form action="{{ route('reservasi.updateCheckIn', $value['id']) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PATCH" />
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin melakukan Check In?')" class="btn btn-primary btn-xs">
                            <i class="glyphicon glyphicon-ok"></i> Check In</button>
                        </form>
                        <br>
                        <form action="{{ route('reservasi.updateCheckOut', $value['id']) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PATCH" />
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin melakukan Check Out?')" class="btn btn-primary btn-xs">
                            <i class="glyphicon glyphicon-ok"></i> Check Out</button>
                        </form>
                        </td>
                        <td>
                            <a href="{{ route('reservasi.edit', $value['id']) }}" 
                            class="btn btn-success btn-xs">
                            <i class="glyphicon glyphicon-edit"></i> Edit</a>
                        </td>
                        <td>
                            <form class="" action="{{ route('reservasi.destroy', $value['id']) }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE" />
                                <button type="submit" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')" class="btn btn-danger btn-xs">
                                <i class="glyphicon glyphicon-trash"></i> Hapus</a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            <div class="pull-right">
                {{ $reservasis->links() }}
            </div>
        </div>
    </div>
</div>
@include('dashboard._footer')