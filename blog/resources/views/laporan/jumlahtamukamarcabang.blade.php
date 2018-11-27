@include('dashboard._header')

<div id="page-content-wrapper">
  <div class="container-fluid">
    <div class="box">
      <h2>LAPORAN JUMLAH TAMU PER JENIS KAMAR TIAP CABANG</h2>
      <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toogle</a>
      <br/><br>
      <label>Pilih Tahun :</label>
      <br/>
      <select class="form-control tahun">
        <option value="2018">2018</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
        <option value="2023">2023</option>
      </select>
      <br/>
      <button class="btn btn-primary btn-md lihat">Tampilkan</button>
      <br/>
      <br/>
      <div id="data">

      </div>
      <script>
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          }
        });

        $(".lihat").click(function(){
          $(this).text("Mohon Tunggu..")
          $.ajax({
            type: 'GET',
            url: 'jtkc-data/'+$('.tahun').val(),
            success: function(data){
              $("#data").html(data);
              $(".lihat").text("Tampilkan")
            }
          })
        });
      </script>
    </div>
  </div>
</div>
@include('dashboard._footer')
