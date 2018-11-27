@include('dashboard._header')

<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="box">
            <h2>Tambah Kamar</h2>

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
            <br><br>
            <form class="" action="{{ route('kamar.store') }}" method="post">
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
                        $("#nomor_kamar").chained("#nomor_lantai");
                     }); 
                </script>

                <div class="form-group">
                    <input type="hidden" class="form-control" name="kode_kamar" >
                </div>
                <div class="form-group">
                    <label for="kode_jenis_kamar">Kode Jenis Kamar</label><br>
                    <select name="kode_jenis_kamar" id="" placeholder = "Kode Jenis Kamar" class="form-control">
                    @foreach($jeniskamars as $value)
                        <option value="{{$value->id}}">{{$value->nama_jenis_kamar}}</option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="nomor_lantai">Nomor Lantai</label><br>
                    <select name="nomor_lantai" class="form-control" id="nomor_lantai">
                        <option value="">Pilih Nomor Lantai</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nomor_kamar">Nomor Kamar</label>
                    <select name="nomor_kamar" id="nomor_kamar"  class="form-control">
                        <option value="">Pilih Nomor Kamar</option>
                        <!-- Lantai 1 -->
                        <option value="001" data-chained="1">001</option>
                        <option value="002" data-chained="1">002</option>
                        <option value="003" data-chained="1">003</option>
                        <option value="005" data-chained="1">005</option>
                        <option value="006" data-chained="1">006</option>
                        <option value="007" data-chained="1">007</option>
                        <option value="008" data-chained="1">008</option>
                        <option value="009" data-chained="1">009</option>
                        <option value="010" data-chained="1">010</option>
                        <option value="011" data-chained="1">011</option>
                        <option value="012" data-chained="1">012</option>
                        <option value="014" data-chained="1">014</option>
                        <option value="015" data-chained="1">015</option>
                        <option value="016" data-chained="1">016</option>
                        <option value="017" data-chained="1">017</option>
                        <option value="018" data-chained="1">018</option>
                        <option value="019" data-chained="1">019</option>
                        <option value="020" data-chained="1">020</option>
                        <option value="021" data-chained="1">021</option>
                        <option value="022" data-chained="1">022</option>
                        <option value="023" data-chained="1">023</option>
                        <option value="024" data-chained="1">024</option>
                        <option value="025" data-chained="1">025</option>

                        <!-- Lantai 2 -->
                        <option value="026" data-chained="2">026</option>
                        <option value="027" data-chained="2">027</option>
                        <option value="028" data-chained="2">028</option>
                        <option value="029" data-chained="2">029</option>
                        <option value="030" data-chained="2">030</option>
                        <option value="031" data-chained="2">031</option>
                        <option value="032" data-chained="2">032</option>
                        <option value="033" data-chained="2">033</option>
                        <option value="034" data-chained="2">034</option>
                        <option value="035" data-chained="2">035</option>
                        <option value="036" data-chained="2">036</option>
                        <option value="037" data-chained="2">037</option>
                        <option value="038" data-chained="2">038</option>
                        <option value="039" data-chained="2">039</option>
                        <option value="040" data-chained="2">040</option>
                        <option value="041" data-chained="2">041</option>
                        <option value="042" data-chained="2">042</option>
                        <option value="043" data-chained="2">043</option>
                        <option value="044" data-chained="2">044</option>
                        <option value="045" data-chained="2">045</option>
                        <option value="046" data-chained="2">046</option>
                        <option value="047" data-chained="2">047</option>
                        <option value="048" data-chained="2">048</option>
                        <option value="049" data-chained="2">049</option>
                        <option value="050" data-chained="2">050</option>

                        <!-- Lantai 3 -->
                        <option value="051" data-chained="3">051</option>
                        <option value="052" data-chained="3">052</option>
                        <option value="053" data-chained="3">053</option>
                        <option value="054" data-chained="3">054</option>
                        <option value="055" data-chained="3">055</option>
                        <option value="056" data-chained="3">056</option>
                        <option value="057" data-chained="3">057</option>
                        <option value="058" data-chained="3">058</option>
                        <option value="059" data-chained="3">059</option>
                        <option value="060" data-chained="3">060</option>
                        <option value="061" data-chained="3">061</option>
                        <option value="062" data-chained="3">062</option>
                        <option value="063" data-chained="3">063</option>
                        <option value="064" data-chained="3">064</option>
                        <option value="065" data-chained="3">065</option>
                        <option value="066" data-chained="3">066</option>
                        <option value="067" data-chained="3">067</option>
                        <option value="068" data-chained="3">068</option>
                        <option value="069" data-chained="3">069</option>
                        <option value="070" data-chained="3">070</option>
                        <option value="071" data-chained="3">071</option>
                        <option value="072" data-chained="3">072</option>
                        <option value="073" data-chained="3">073</option>
                        <option value="074" data-chained="3">074</option>
                        <option value="075" data-chained="3">075</option>

                        <!-- Lantai 4 -->
                        <option value="076" data-chained="4">076</option>
                        <option value="077" data-chained="4">077</option>
                        <option value="078" data-chained="4">078</option>
                        <option value="079" data-chained="4">079</option>
                        <option value="080" data-chained="4">080</option>
                        <option value="081" data-chained="4">081</option>
                        <option value="082" data-chained="4">082</option>
                        <option value="083" data-chained="4">083</option>
                        <option value="084" data-chained="4">084</option>
                        <option value="085" data-chained="4">085</option>
                        <option value="086" data-chained="4">086</option>
                        <option value="087" data-chained="4">087</option>
                        <option value="088" data-chained="4">088</option>
                        <option value="089" data-chained="4">089</option>
                        <option value="090" data-chained="4">090</option>
                        <option value="091" data-chained="4">091</option>
                        <option value="094" data-chained="4">092</option>
                        <option value="093" data-chained="4">093</option>
                        <option value="094" data-chained="4">094</option>
                        <option value="095" data-chained="4">095</option>
                        <option value="096" data-chained="4">096</option>
                        <option value="097" data-chained="4">097</option>
                        <option value="098" data-chained="4">098</option>
                        <option value="099" data-chained="4">099</option>
                        <option value="100" data-chained="4">100</option>

                        <!-- Lantai 5 -->
                        <option value="101" data-chained="5">101</option>
                        <option value="102" data-chained="5">102</option>
                        <option value="103" data-chained="5">103</option>
                        <option value="104" data-chained="5">104</option>
                        <option value="105" data-chained="5">105</option>
                        <option value="106" data-chained="5">106</option>
                        <option value="107" data-chained="5">107</option>
                        <option value="108" data-chained="5">108</option>
                        <option value="109" data-chained="5">109</option>
                        <option value="110" data-chained="5">110</option>
                        <option value="111" data-chained="5">111</option>
                        <option value="112" data-chained="5">112</option>
                        <option value="113" data-chained="5">113</option>
                        <option value="114" data-chained="5">114</option>
                        <option value="115" data-chained="5">115</option>
                        <option value="116" data-chained="5">116</option>
                        <option value="117" data-chained="5">117</option>
                        <option value="118" data-chained="5">118</option>
                        <option value="119" data-chained="5">119</option>
                        <option value="120" data-chained="5">120</option>
                        <option value="121" data-chained="5">121</option>
                        <option value="122" data-chained="5">122</option>
                        <option value="123" data-chained="5">123</option>
                        <option value="124" data-chained="5">124</option>
                        <option value="125" data-chained="5">125</option>

                    </select>
                 </div>

                <div class="form-group">
                    <label for="status_season">Status Season</label><br>
                    <select name="status_season" id="" placeholder = "Status Season" class="form-control">
                    @foreach($seasons as $value)
                        <option value="{{$value->id}}">{{$value->nama_season}}</option>
                    @endforeach
                    </select>
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

                <div class="form-group pull-right">
                    <input type="submit" name="add" value="Simpan" class="btn btn-success">
                </div>
            </form>

        </div>
    </div>
</div>

@include('dashboard._footer')


