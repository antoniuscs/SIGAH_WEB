@include('dashboard._header')

<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="box">
            <h2>Update Reservasi</h2>
            
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
                <a href="{{ route('reservasi.index') }}" class="btn btn-warning btn-s"><i class="glyphicon glyphicon-chevron-left"></i>Kembali ke Pengelolaan</a>
            </div>
            <br/><br/>
            <form class="" action="{{ route('reservasi.update', $reservasis) }}" method="post">
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
                    <label for="id_booking">Kode Booking</label>
                    <input type="text" name="id_booking" class="form-control" value="{{ $reservasis->id_booking }}" disabled>
                </div>

                <div class="form-group">
                    <label for="kode_customer">Nama Customer</label>
                    <input type="text" class="form-control"  name="kode_customer" value="{{ $reservasis->get_customer->nama_depan }} {{ $reservasis->get_customer->nama_belakang }}" disabled>
                </div>
                <div class="form-group">
                    <label for="kode_staff">Kode Staff</label>
                    <input type="text" class="form-control"  name="kode_staff" value="{{ $reservasis->get_staff->kode_staff }}" disabled>
                </div>

                <div class="form-group">
                    <label for="jumlah_anak">Jumlah Anak</label><br>
                    <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" maxlength="3" name="jumlah_anak" value="{{ $reservasis->jumlah_anak }}">
                </div>
                  
                <div class="form-group">
                    <label for="jumlah_dewasa">Jumlah Dewasa</label><br>
                    <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" maxlength="3" name="jumlah_dewasa" value="{{ $reservasis->jumlah_dewasa }}">
                </div>

                <div class="form-group">
                    <label for="tanggal_reservasi">Tanggal Reservasi</label><br>
                    <input type="date" class="form-control" name="tanggal_reservasi" value="{{ $reservasis->tanggal_reservasi }}" disabled>
                </div>


                <div class="form-group">
                    <label for="tanggal_check_in">Tanggal Check In</label><br>
                    <input type="date" class="form-control" name="tanggal_check_in" value="{{ $reservasis->tanggal_check_in }}">
                </div>

                <div class="form-group">
                    <label for="tanggal_check_out">Tanggal Check Out</label><br>
                    <input type="date" class="form-control" name="tanggal_check_out" value="{{ $reservasis->tanggal_check_out }}">
                </div>


                <div class="form-group">
                    <label for="tanggal_pembayaran">Tanggal Pembayaran</label><br>
                    <input type="date" class="form-control" name="tanggal_pembayaran" value="{{ $reservasis->tanggal_pembayaran }}">
                </div>

                <div class="form-group">
                    <label for="status_reservasi">Status Reservasi</label><br>
                    <select name="status_reservasi" id="" class="form-control">
                        <option value="">--</option>
                        <option value="Terservasi">Terservasi</option>
                        <option value="Check In">Check In</option>
                        <option value="Check Out">Check Out</option>
                        <option value="Batal Reservasi">Batal Reservasi</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="kode_lokasi">Lokasi</label><br>
                    <select name="kode_lokasi" id="" class="form-control">
                    @foreach($lokasis as $value)
                        <option value="{{$value->id}}">{{$value->nama_kota_kabupaten}}</option>
                    @endforeach
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