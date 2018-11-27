<button class="btn btn-warning btn-s" onclick="printContent('print');">Cetak Laporan</button>
<div class="table-responsive print">
  <h2> LAPORAN JUMLAH TAMU TIAP JENIS KAMAR PADA TAHUN {{ $year }}</h2>
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Cabang</th>
        <th>Jenis Kamar</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1?>
      @foreach(\DB::table('lokasis')->get() as $jk)
      <tr>
        <td>{{ $i }}</td>
        <td>{{ $jk->nama_kota_kabupaten }}</td>
        <td>
          <table class="table">
            @foreach(\DB::table('jenis_kamars')->get() as $k)
            <tr>
              <td>{{ $k->nama_jenis_kamar }}</td>
              <td width="30%">{{ \DB::table('detail_reservasi_kamars')->join('reservasis','reservasis.id','=','detail_reservasi_kamars.kode_booking')->where('reservasis.kode_lokasi',$jk->id)->where('kode_kamar',$k->id)->count() }}</td>
            </tr>
            @endforeach
          </table>
        </td>
      </tr>
      <?php $i++ ?>
      @endforeach
    </tbody>
  </table>

</div>
<button onclick="printContent('print');">Cetak Laporan</button>
<script>
function printContent(el){
var restorepage = $('body').html();
var printcontent = $('.' + el).clone();
$('body').empty().html(printcontent);
window.print();
$('body').html(restorepage);
}
</script>
