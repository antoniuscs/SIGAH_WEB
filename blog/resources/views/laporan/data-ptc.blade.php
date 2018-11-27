<button class="btn btn-warning btn-s" onclick="printContent('print');">Cetak Laporan</button>
<div class="table-responsive print">
  <h2>LAPORAN PENDAPATAN PER TAHUN SEMUA CABANG TAHUN {{ $year }}</h2>
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Bulan</th>
        <th>Cabang</th>
      </tr>
    </thead>
    <tbody>
      @for($i = 1; $i<13; $i++)
      <tr>
        <td>{{ $i }}</td>
        @if($i == 1)
        <td>Januari</td>
        @elseif($i==2)
          <td>Februari</td>
        @elseif($i==3)
          <td>Maret</td>
        @elseif($i==4)
          <td>April</td>
        @elseif($i==5)
          <td>Mei</td>
        @elseif($i==6)
          <td>Juni</td>
        @elseif($i==7)
          <td>Juli</td>
        @elseif($i==8)
          <td>Agustus</td>
        @elseif($i==9)
          <td>September</td>
        @elseif($i==10)
          <td>Oktober</td>
        @elseif($i==11)
          <td>November</td>
        @else
          <td>Desember</td>
        @endif
          <td>
            <table class="table">
              @foreach(\DB::table('lokasis')->get() as $l)
                <tr>
                  <td>{{ $l->nama_kota_kabupaten }}</td>
                  <td width="30%">Rp. {{ \DB::table('reservasis')->join('transaksis','reservasis.id','=','transaksis.kode_booking')->where('reservasis.kode_lokasi',$l->id)->whereMonth('reservasis.tanggal_reservasi',$i)->whereYear('reservasis.tanggal_reservasi',$year)->sum('transaksis.total_keseluruhan') }}</td>
                </tr>
              @endforeach
            </table>
          </td>
      </tr>
      @endfor
    </tbody>
  </table>
</div>

<script>
function printContent(el){
var restorepage = $('body').html();
var printcontent = $('.' + el).clone();
$('body').empty().html(printcontent);
window.print();
$('body').html(restorepage);
}
</script>
