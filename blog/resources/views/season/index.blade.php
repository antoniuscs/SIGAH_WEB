@include('dashboard._header')

<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="box">
            <h2>Pengelolaan Season</h2>
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toogle</a>
            <br/><br>
            @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
            @endif
            <div class="pull-right">
                <a href="{{ route('season.index') }}" class="btn btn-default btn-s"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="{{ route('season.create') }}" class="btn btn-success btn-s"><i class="glyphicon glyphicon-plus"></i>Tambah Season</a>
            </div>
            <div style="margin-bottom:20px;">
            
                <form class="form-inline" action="{{ route('season.index') }}" method="get">
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
                        <th>Nama Season</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Operasi Season</th>
                        <th>Presentase Harga</th>
                        <th>Jenis Season</th>
                        <th colspan="2"><i class="glyphicon glyphicon-cog"></i> Pengaturan</th>
                    </tr>
                </thead> 
                <tbody>
                    
                    @foreach($seasons as $value)
                    <tr>
                        <td>{{ $value['nama_season']}}</td>
                        <td>{{ $value['tanggal_mulai']}}</td>
                        <td>{{ $value['tanggal_selesai']}}</td>
                        <td>{{ $value['operasi_season']}}</td>
                        <td>{{ $value['presentase_harga']}}%</td>
                        <td>{{ $value->get_jenis_season->nama_jenis_season }}</td>
                        <td>
                            <a href="{{ route('season.edit', $value['id']) }}" 
                            class="btn btn-warning btn-xs">
                            <i class="glyphicon glyphicon-edit"></i> Ubah</a>
                        </td>
                        <td>
                            <form class="" action="{{ route('season.destroy', $value['id']) }}" method="post">
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
            {{ $seasons->links() }}
            </div>
        </div>
    </div>
</div>
@include('dashboard._footer')

