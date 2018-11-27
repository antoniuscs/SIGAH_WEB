@include('dashboard._header')

<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="box">
            <h2>Edit Kamar</h2>
            
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
                <a href="{{ route('kamar.index') }}" class="btn btn-warning btn-s"><i class="glyphicon glyphicon-chevron-left"></i>Kembali ke Pengelolaan</a>
            </div>
            <br/><br/>
            <form class="" action="{{ route('kamar.update', $kamars) }}" method="post">
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
                    <label for="kode_kamar">Kode Kamar</label>
                    <input type="text" name="kode_kamar" class="form-control" value="{{ $kamars->kode_kamar }}" disabled>
                </div>
                <div class="form-group">
                    <label for="kode_jenis_kamar">Kode Jenis Kamar</label><br>
                    <select name="kode_jenis_kamar" id="" class="form-control">
                    @foreach($jeniskamars as $value)
                        <option value="{{$value->id}}">{{$value->nama_jenis_kamar}}</option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="nomor_lantai">Nomor Lantai</label><br>
                    <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" maxlength="2" name="nomor_lantai" value="{{ $kamars->nomor_lantai }}" required>
                </div>

                <div class="form-group">
                    <label for="nomor_kamar">Nomor Kamar</label>
                    <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" maxlength="3" name="nomor_kamar" value="{{ $kamars->nomor_kamar }}" required>
                </div>

                <div class="form-group">
                    <label for="status_season">Status Season</label><br>
                    <select name="status_season" id="" class="form-control">
                    @foreach($seasons as $value)
                        <option value="{{$value->id}}">{{$value->nama_season}}</option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="harga_kamar">Harga Kamar</label>
                    <input type="text" disabled maxlength="12" class="form-control" name="harga_kamar" value="{{ $kamars->harga_kamar }}" required>
                </div>

                <div class="form-group">
                    <label for="kode_lokasi">Lokasi</label>
                    <select name="kode_lokasi" id="" class="form-control">
                    @foreach($lokasis as $value)
                        <option value="{{$value->id}}">{{$value->nama_kota_kabupaten}}</option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="status_smoking">Status Smoking</label>
                    <select name="status_smoking" id="" class="form-control">
                        <option value="Y">Ya</option>
                        <option value="T">Tidak</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status_kamar">Status Kamar</label>
                    <select name="status_kamar" id="" class="form-control">
                        <option value="Tersedia">Tersedia</option>
                        <option value="Tereservasi">Tereservasi</option>
                    </select>
                </div>

                <div class="form-group pull-right">
                    <input type="submit" name="edit" value="Edit" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

@include('dashboard._footer')