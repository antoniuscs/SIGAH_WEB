@include('dashboard._header')

<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="box">
            <h2>Pengelolaan Staff</h2>
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toogle</a>
            <br/><br>
            @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
            @endif
            <div class="pull-right">
                <a href="{{ route('staff.index') }}" class="btn btn-default btn-s"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="{{ route('staff.create') }}" class="btn btn-success btn-s"><i class="glyphicon glyphicon-plus"></i>Tambah Staff</a>
            </div>
            <div style="margin-bottom:20px;">
            
                <form class="form-inline" action="{{ route('staff.index') }}" method="get">
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
                        <th>Kode Staff</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Nomor Identitas</th>
                        <th>Jenis Identitas</th>
                        <th>Negara Penerbit Identitas</th>
                        <th>Nomor HP</th>
                        <th>Nomor Telp</th>
                        <th>Username</th>
                        <th>Lokasi</th>
                        <th>Status Peran</th>
                        <th colspan="2"><i class="glyphicon glyphicon-cog"></i> Pengaturan</th>
                    </tr>
                </thead> 
                <tbody>
                    
                    @foreach($staf as $value)
                    <tr>
                        <td>{{ $value['kode_staff']}}</td>
                        <td>{{ $value['nama_depan']}} {{ $value['nama_belakang']}}</td>
                        <td>{{ $value['jenis_kelamin']}}</td>
                        <td>{{ $value['nomor_identitas']}}</td>
                        <td>{{ $value['jenis_identitas']}}</td>
                        <td>{{ $value['negara_penerbit_identitas']}}</td>
                        <td>{{ $value['nomor_hp']}}</td>
                        <td>{{ $value['nomor_telp']}}</td>
                        <td>{{ $value['username']}}</td>
                        <td>{{ $value->get_lokasi->nama_kota_kabupaten}}</td>
                        <td>{{ $value->get_peran->nama_peran }}</td>
                        <td>
                            <a href="{{ route('staff.edit', $value['id']) }}" 
                            class="btn btn-warning btn-xs">
                            <i class="glyphicon glyphicon-edit"></i> Ubah</a>
                        </td>
                        <td>
                            <form class="" action="{{ route('staff.destroy', $value['id']) }}" method="post">
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
            {{ $staf->links() }}
            </div>
        </div>
    </div>
</div>
@include('dashboard._footer')

