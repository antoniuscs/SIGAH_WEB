@include('dashboard._header')

<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="box">
            <h2>Pengelolaan Kamar</h2>
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toogle</a>
            <br/><br>
            @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
            @endif
            <div class="pull-right">
                <a href="{{ route('kamar.index') }}" class="btn btn-default btn-s"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="{{ route('kamar.create') }}" class="btn btn-success btn-s"><i class="glyphicon glyphicon-plus"></i>Tambah Kamar</a>
            </div>
            <div style="margin-bottom:20px;">
            
                <form class="form-inline" action="{{ route('kamar.index') }}" method="get">
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
                        <th>Kode Kamar</th>
                        <th>Kode Jenis Kamar</th>
                        <th>Nomor Lantai</th>
                        <th>Nomor Kamar</th>                        
                        <th>Status Season</th>
                        <th>Harga Kamar</th>
                        <th>Kode Lokasi</th>
                        <th>Status Smoking</th>
                        <th>Status Kamar</th>
                        <th colspan="2"><i class="glyphicon glyphicon-cog"></i> Pengaturan</th>
                    </tr>
                </thead> 
                <tbody>
                    
                    @foreach($kamars as $value)
                    <tr>
                        <td>{{ $value['kode_kamar'] }}</td>
                        <td>{{ $value->get_kamar->kode_jenis_kamar }}</td>
                        <td>{{ $value['nomor_lantai'] }}</td>
                        <td>{{ $value['nomor_kamar'] }}</td>                        
                        <td>{{ $value->get_season->nama_season }}</td>
                        <td>Rp{{ $value['harga_kamar'] }},00</td>
                        <td>{{ $value->get_lokasi->nama_kota_kabupaten }}</td>
                        <td>{{ $value['status_smoking']}}</td>
                        <td>{{ $value['status_kamar']}}</td>
                        <td>
                            <a href="{{ route('kamar.edit', $value['id']) }}" 
                            class="btn btn-warning btn-xs">
                            <i class="glyphicon glyphicon-edit"></i> Ubah</a>
                        </td>
                        <td>
                            <form class="" action="{{ route('kamar.destroy', $value['id']) }}" method="post">
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
                {{ $kamars->links() }}
            </div>
        </div>
    </div>
</div>
@include('dashboard._footer')