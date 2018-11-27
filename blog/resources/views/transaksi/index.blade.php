@include('dashboard._header')

<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="box">
            <h2>Pengelolaan Transaksi</h2>
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toogle</a>
            <br/><br>
            @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
            @endif
            <div class="pull-right">
                <a href="{{ route('transaksi.index') }}" class="btn btn-default btn-s"><i class="glyphicon glyphicon-refresh"></i>Refresh</a>
            </div>
            <div style="margin-bottom:20px;">
            
                <form class="form-inline" action="{{ route('transaksi.index') }}" method="get">
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
                        <th>Total Keseluruhan</th>
                        <th>Uang Deposit</th>
                        <th>Uang Jaminan</th>
                        <th>Total Dibayarkan</th>
                        <th>Tanggal Pelunasan</th>
                        <th>Jenis Pembayaran</th>
                        <th>Nomor Identitas Pembayaran</th>
                        <th>Status Pembayaran</th>
                        <th colspan="2"><i class="glyphicon glyphicon-cog"></i> Pengaturan</th>
                    </tr>
                </thead> 
                <tbody>
                    
                    @foreach($transaksis as $value)
                    <tr>
                        <td>{{ $value->get_reservasi->id_booking }}</td>
                        <td>Rp{{ $value['total_keseluruhan'] }},00</td>
                        <td>Rp{{ $value['uang_deposit'] }},00</td>
                        <td>Rp{{ $value['uang_jaminan'] }},00</td>
                        <td>Rp{{ $value['total_bayar'] }},00</td>
                        <td>{{  date("d-M-Y", strtotime($value->tanggal_pelunasan)) }}</td>
                        <td>{{ $value['jenis_pembayaran'] }}</td>
                        <td>{{ $value['nomor_identitas_pembayaran'] }}</td>
                        <td>{{ $value['status_pembayaran'] }}</td>
                        <td>
                            <a href="{{ route('transaksi.edit', $value['id']) }}" 
                            class="btn btn-warning btn-xs">
                            <i class="glyphicon glyphicon-edit"></i> Ubah</a>
                        </td>
                        <td>
                            <form class="" action="{{ route('transaksi.destroy', $value['id']) }}" method="post">
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
                {{ $transaksis->links() }}
            </div>
        </div>
    </div>
</div>
@include('dashboard._footer')