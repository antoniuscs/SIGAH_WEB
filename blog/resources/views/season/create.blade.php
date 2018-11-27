@include('dashboard._header')

<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="box">
            <h2>Tambah Season</h2>

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
                <a href="{{ route('season.index') }}" class="btn btn-warning btn-s"><i class="glyphicon glyphicon-chevron-left"></i>Kembali ke Pengelolaan</a>
            </div>
            <br><br>
            <form class="" action="{{ route('season.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <script>
                    function hanyaAngka(evt) {
                    var charCode = (evt.which) ? evt.which : event.keyCode
                    if (charCode > 31 && (charCode < 48 || charCode > 57))
            
                        return false;
                    return true;
                    }
                </script>

                <script>
                $(document).ready(function() { 
                    $("#presentase_harga").prop( "disabled", true );
                    $("#operasi_season").on('change', function() {
                        if($(this).val() == "Tetap"){
                            $("#presentase_harga").prop( "disabled", true );
                            $("#presentase_harga").val("0");
                        }else if($(this).val() == "") {
                            $("#presentase_harga").prop( "disabled", true );
                            $("#presentase_harga").val("");
                        }else{
                            $("#presentase_harga").prop( "disabled", false );
                        }
                    });
                }); 
                </script>
                <div class="form-group">
                    <label for="nama_season">Nama Season</label>
                    <input type="text" class="form-control" maxlength="100" name="nama_season" placeholder = "Nama Season" required autofocus>
                </div>

                <div class="form-group">
                    <label for="tanggal_mulai">Tanggal Mulai</label>
                    <input type="date" class="form-control" name="tanggal_mulai" placeholder = "Tanggal Mulai" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_selesai">Tanggal Selesai</label>
                    <input type="date" class="form-control" name="tanggal_selesai" placeholder = "Tanggal Selesai" required>
                </div>

                <div class="form-group">
                    <label for="operasi_season">Operasi Season</label>
                    <select name="operasi_season" class="form-control" id="operasi_season">
                        <option value="">--</option>
                        <option value="Penambahan">Penambahan</option>
                        <option value="Pengurangan">Pengurangan</option>
                        <option value="Tetap">Tetap</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="presentase_harga">Presentase Harga</label>
                    <input type="text" id="presentase_harga" onkeypress="return hanyaAngka(event)" maxlength="2" class="form-control" name="presentase_harga" placeholder = "Presentase Harga" required>
                </div>

                <div class="form-group">
                    <label for="jenis_season">Jenis Season</label>
                    <select name="jenis_season" id="" class="form-control">
                        <option value="">--</option>
                    @foreach($jenisseasons as $value)
                        <option value="{{$value->id}}">{{$value->nama_jenis_season}}</option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group pull-right">
                    <input type="submit" name="add" value="Simpan" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

@include('dashboard._footer')

