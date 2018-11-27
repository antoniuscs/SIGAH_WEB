@include('dashboard._header')

<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="box">
            <h2>Pengelolaan Jenis Kamar</h2>
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toogle</a>
            <br/><br>
            @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
            @endif
            <div class="pull-right">
                <a href="{{ route('jenisKamar.index') }}" class="btn btn-default btn-s"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="{{ route('jenisKamar.create') }}" class="btn btn-success btn-s"><i class="glyphicon glyphicon-plus"></i>Tambah Jenis Kamar</a>
            </div>
            <div style="margin-bottom:20px;">
            
                <form class="form-inline" action="{{ route('jenisKamar.index') }}" method="get">
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
                        <th>Nama Jenis Kamar</th>
                        <th>Gambar</th>
                        <th>Kode Jenis Kamar</th>
                        <th>Detail Jenis Kamar</th>
                        <th>Pilihan Tempat Tidur 1</th>
                        <th>Pilihan Tempat Tidur 2</th>
                        <th>Kapasitas</th>
                        <th>Harga Kamar</th>
                        <th colspan="2"><i class="glyphicon glyphicon-cog"></i> Pengaturan</th>
                    </tr>
                </thead> 
                <tbody>
                    
                    @foreach($jeniskamars as $value)
                    <tr>
                        <td>{{ $value['nama_jenis_kamar']}}</td>
                        <td><img src="public/uploadImage/{{ $value['gambar'] }}" width="100px" height="100px"/></td>
                        <td>{{ $value['kode_jenis_kamar']}}</td>
                        <td>{{ $value['detail_jenis_kamar']}}</td>
                        <td>{{ $value->get_tempat_tidur->nama_tempat_tidur }}</td>
                        <td>{{ $value->get_tempat_tidur_2->nama_tempat_tidur }}</td>
                        <td>{{ $value['kapasitas']}}</td>
                        <td>Rp{{ $value['harga_jenis_kamar']}},00</td>
                        <td>
                            <a href="{{ route('jenisKamar.edit', $value['id']) }}" 
                            class="btn btn-warning btn-xs">
                            <i class="glyphicon glyphicon-edit"></i> Ubah</a>
                        </td>
                        <td>
                            <form class="" action="{{ route('jenisKamar.destroy', $value['id']) }}" method="post">
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
                {{ $jeniskamars->links() }}
            </div>
        </div>
    </div>
</div>
@include('dashboard._footer')

