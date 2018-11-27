@include('dashboard._header')

<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="box">
            <h2>Edit Fasilitas</h2>
            
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
                <a href="{{ route('fasilitas.index') }}" class="btn btn-warning btn-s"><i class="glyphicon glyphicon-chevron-left"></i>Kembali ke Pengelolaan</a>
            </div>
            <br/><br/>
            <form class="" action="{{ route('fasilitas.update', $fasilitas) }}" method="post">
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
                    <label for="nama_fasilitas">Nama Fasilitas</label>
                    <input type="text" class="form-control" maxlength="100" name="nama_fasilitas" placeholder = "Nama Fasilitas" value="{{ $fasilitas->nama_fasilitas }}" required autofocus>
                </div>

                <div class="form-group">
                    <label for="harga_fasilitas">Harga</label>
                    <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" maxlength="12" name="harga_fasilitas" placeholder = "Harga" value="{{ $fasilitas->harga_fasilitas }}" required>
                </div>

                <div class="form-group pull-right">
                    <input type="submit" name="edit" value="Edit" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

@include('dashboard._footer')

