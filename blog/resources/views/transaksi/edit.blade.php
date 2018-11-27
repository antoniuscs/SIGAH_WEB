@include('dashboard._header')

<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="box">
            <h2>Edit Transaksi</h2>
            
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
                <a href="{{ route('transaksi.index') }}" class="btn btn-warning btn-s"><i class="glyphicon glyphicon-chevron-left"></i>Kembali ke Pengelolaan</a>
            </div>
            <br/><br/>
            <form class="" action="{{ route('transaksi.update', $transaksis) }}" method="post">
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
                    <label for="kode_booking">Kode Booking</label>
                    <input type="text" name="kode_booking" class="form-control" value="{{ $transaksis->get_reservasi->id_booking }}" disabled >
                </div>

                <div class="form-group">
                    <label for="total_keseluruhan">Total Keseluruhan</label>
                    <input type="text" name="total_keseluruhan" class="form-control" value="Rp{{ $transaksis->total_keseluruhan }},00" disabled>
                </div>

                <div class="form-group">
                    <label for="uang_deposit">Uang Deposit</label>
                    <input type="text" name="uang_deposit" maxlength="12" onkeypress="return hanyaAngka(event)" class="form-control" value="{{ $transaksis->uang_deposit }}">
                </div>

                <div class="form-group">
                    <label for="uang_jaminan">Uang Jaminan</label>
                    <input type="text" name="uang_jaminan" maxlength="12" onkeypress="return hanyaAngka(event)" class="form-control" value="{{ $transaksis->uang_jaminan }}">
                </div>

                <div class="form-group">
                    <label for="tanggal_pelunasan">Tanggal Pelunasan</label><br>
                    <input type="date" class="form-control" name="tanggal_pelunasan" value="{{ $transaksis->tanggal_pelunasan }}">
                </div>

                <div class="form-group">
                    <label for="jenis_pembayaran">Jenis Pembayaran</label><br>
                    <select name="jenis_pembayaran" id="" class="form-control">
                        <option value="Transfer">Transfer</option>
                        <option value="Kartu kredit">Kartu Kredit</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nomor_identitas_pembayaran">Nomor Identitas Pembayaran</label>
                    <input type="text" onkeypress="return hanyaAngka(event)" maxlength="15" name="nomor_identitas_pembayaran" class="form-control" value="{{ $transaksis->nomor_identitas_pembayaran }}">
                </div>

                <div class="form-group">
                    <label for="status_pembayaran">Status Pembayaran</label>
                    <select name="status_pembayaran" id="" class="form-control">
                        <option value="Lunas">Lunas</option>
                        <option value="Belum Lunas">Belum Lunas</option>
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

