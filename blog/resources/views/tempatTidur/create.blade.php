@include('dashboard._header')

<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="box">
            <h2>Tambah Tempat Tidur</h2>

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
                <a href="{{ route('tempatTidur.index') }}" class="btn btn-warning btn-s"><i class="glyphicon glyphicon-chevron-left"></i>Kembali ke Pengelolaan</a>
            </div>
            <br><br>
            <form class="" action="{{ route('tempatTidur.store') }}" method="post">
                {{ csrf_field() }}
                <script>
                    function hanyaAngka(evt) {
                    var charCode = (evt.which) ? evt.which : event.keyCode
                    if (charCode > 31 && (charCode < 48 || charCode > 57))
            
                        return false;
                    return true;
                    }
                </script>
                <div class="form-group">
                    <label for="nama_tempat_tidur">Nama Tempat Tidur</label>
                    <input type="text" class="form-control" maxlength="100" name="nama_tempat_tidur" placeholder = "Nama Tempat Tidur" required autofocus>
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah Tempat Tidur</label>
                    <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" maxlength="12" name="jumlah" placeholder = "Jumlah" required>
                </div>

                <div class="form-group pull-right">
                    <input type="submit" name="add" value="Simpan" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

@include('dashboard._footer')

