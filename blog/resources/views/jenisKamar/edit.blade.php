@include('dashboard._header')

<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="box">
            <h2>Edit Jenis Kamar</h2>
            
            @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
            @endif

            <div class="pull-right">
                <a href="{{ route('jenisKamar.index') }}" class="btn btn-warning btn-s"><i class="glyphicon glyphicon-chevron-left"></i>Kembali ke Pengelolaan</a>
            </div>
            <br/><br/>
            <form class="" action="{{ route('jenisKamar.update', $jeniskamars) }}" method="post" enctype="multipart/form-data">
                <script>
                    function hanyaAngka(evt) {
                    var charCode = (evt.which) ? evt.which : event.keyCode
                    if (charCode > 31 && (charCode < 48 || charCode > 57))
            
                        return false;
                    return true;
                    }
                </script>
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PATCH" />
                <div class="form-group">
                    <label for="nama_jenis_kamar">Nama Jenis Kamar</label>
                    <input type="text" class="form-control" maxlength="50" name="nama_jenis_kamar" placeholder = "Nama Jenis Kamar" value="{{ $jeniskamars->nama_jenis_kamar }}" required autofocus>
                </div>

                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control" name="gambar" value="{{ $jeniskamars->gambar }}" placeholder = "Gambar" required>
                </div>

                <div class="form-group">
                    <label for="kode_jenis_kamar">Kode Jenis Kamar</label>
                    <input type="text" class="form-control" maxlength="2" name="kode_jenis_kamar" placeholder = "Kode Jenis Kamar" value="{{ $jeniskamars->kode_jenis_kamar }}" required>
                </div>

                <div class="form-group">
                    <label for="detail_jenis_kamar">Detail Jenis Kamar</label><br>
                    <textarea rows="5" name="detail_jenis_kamar" class="form-control" placeholder = "Detail Jenis Kamar" required>{{ $jeniskamars->detail_jenis_kamar }}</textarea>
                </div>

                <div class="form-group">
                    <label for="pilihan_tempat_tidur_1">Pilihan Tempat Tidur 1</label><br>
                    <select name="pilihan_tempat_tidur_1" id="" class="form-control">
                    @foreach($tempattidurs as $value)
                        <option value="{{$value->id}}">{{$value->nama_tempat_tidur}}</option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="pilihan_tempat_tidur_2">Pilihan Tempat Tidur 2</label>
                    <select name="pilihan_tempat_tidur_2" id="" class="form-control">
                    @foreach($tempattidurs as $value2)
                        <option value="{{$value2->id}}">{{$value2->nama_tempat_tidur}}</option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="kapasitas">Kapasitas</label>
                    <input type="text" onkeypress="return hanyaAngka(event)" maxlength="2" class="form-control" name="kapasitas" value="{{ $jeniskamars->kapasitas }}" placeholder = "Kapasitas" required>
                </div>

                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" onkeypress="return hanyaAngka(event)" maxlength="12" class="form-control" name="harga_jenis_kamar" value="{{ $jeniskamars->harga_jenis_kamar }}" placeholder = "Harga" required>
                </div>

                <div class="form-group pull-right">
                    <input type="submit" name="edit" value="Edit" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

@include('dashboard._footer')