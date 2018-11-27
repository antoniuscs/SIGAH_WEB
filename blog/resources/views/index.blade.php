@include('header')
<style>
input[type=date] {
	position: relative;
	width: 490px; height: 45px;
	color: white;
}

input[type=date]:before {
	position: absolute;
	top: 3px; left: 3px;
	content: attr(data-date);
	display: inline-block;
	color: black;
}

input[type=date]::-webkit-datetime-edit, input[type=date]::-webkit-inner-spin-button, input[type=date]::-webkit-clear-button {
    display: none;
}

input[type=date]::-webkit-calendar-picker-indicator {
	position: absolute;
	top: 3px;
	right: 0;
	color: black;
	opacity: 1;
}
</style>
<header id="gtco-header" class="gtco-cover" role="banner" style="background-image: url(images/img_4.jpg)">
	<div class="overlay"></div>
	<div class="gtco-container">
		<div class="row">
			<div class="col-md-12 col-md-offset-0 text-left">

				@if(\Auth::guest() || \Auth::user()->role == 1)
				<div class="row row-mt-15em">
					<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
						<span class="intro-text-small">Selamat datang</span>
						<h1>GRAND ATMA HOTELS</h1>
					</div>

					<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
						<div class="form-wrap">
							<div class="tab">
								<ul class="tab-menu">
									<li class="active gtco-first"><a href="#" data-tab="login">Login</a></li>
									<li class="gtco-second"><a href="#" data-tab="signup">Daftar Akun</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-content-inner" data-content="signup">
										<form action="#" id="formdaftar">
											{{ csrf_field() }}
											<div class="row form-group">
												<div class="col-md-12">
													<label for="username">Username</label>
													<input type="text" class="form-control" id="usernamed" name="usernamed">
												</div>
											</div>
											<div class="row form-group">
												<div class="col-md-12">
													<label for="username">Email</label>
													<input type="text" class="form-control" id="emaild" name="emaild">
												</div>
											</div>
											<div class="row form-group">
												<div class="col-md-12">
													<label for="password">Password</label>
													<input type="password" class="form-control" id="passwordd" name="passwordd">
												</div>
											</div>
											<div class="row form-group">
												<div class="col-md-12">
													<label for="password2">Konfirmasi Password</label>
													<input type="password" class="form-control" id="password2d">
												</div>
											</div>
											<label id="daftarwarn" style="color:#FF0000;display:none"></label>
											<div class="row form-group">
												<div class="col-md-12">
													<button type="submit" class="btn btn-primary btndaftar">Submit</button>
												</div>
											</div>
										</form>
									</div>

									<div class="tab-content-inner active" data-content="login">
										<form action="#" id="formlogin">
											{{ csrf_field() }}
											<div class="row form-group">
												<div class="col-md-12">
													<label for="username">Username atau Email</label>
													<input type="text" class="form-control" name="username">
												</div>
											</div>
											<div class="row form-group">
												<div class="col-md-12">
													<label for="password">Password</label>
													<input type="password" class="form-control" name="password">
												</div>
											</div>
											<label id="warningauth" style="color:#FF0000;display:none">username atau password salah</label>
											<div class="row form-group">
												<div class="col-md-12">
													<button type="submit" class="btn btn-primary submitlogin">Login</button>
												</div>
											</div>
										</form>
									</div>

								</div>
							</div>
						</div>
					</div>
					@elseif(\Auth::user()->role == 2)
					<div class="row row-mt-15em">
						<div class="col-md-12  animate-box" data-animate-effect="fadeInRight">
							<div class="form-wrap">
								<div class="tab">
									<ul class="tab-menu">
										<li class="active gtco-first"><a href="#" data-tab="reg">Reservasi</a></li>
										<li class="gtco-second"><a href="#" data-tab="edit">Edit Data Akun</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-content-inner active" data-content="reg">
											<form action="{{ route('reservasiuser') }}" method="post" id="formregis">
												{{ csrf_field() }}
												<div class="row form-group">
													<div class="col-md-6">
														<label for="ci">Tanggal Check In</label>
														<input type="date" data-date="" class="form-control" name="ci" data-date-format="YYYY-MM-DD">
													</div>
													<div class="col-md-6">
														<label for="co">Tanggal Check Out</label>
														<input type="date" data-date="" class="form-control" name="co" data-date-format="YYYY-MM-DD">
													</div>

												</div>
												<div class="row form-group">
													<div class="col-md-4">
														<label for="co">Cabang</label>
														<select class="form-control" name="cbg">
															<option value="1">Yogyakarta</option>
															<option value="2">Bandung</option>
														</select>
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-6">
														<label for="jd">Jumlah Dewasa</label>
														<input type="number" class="form-control" value="1" name="jd">
													</div>
													<div class="col-md-6">
														<label for="ja">Jumlah Anak</label>
														<input type="number" class="form-control" value="0" name="ja">
													</div>
												</div>
												<!-- <label id="warningauth" style="color:#FF0000;display:none">username atau password salah</label> -->
												<div class="row form-group">
													<div class="col-md-12">
														<button type="submit" class="btn btn-primary btncek">Cek Kamar</button>
													</div>
												</div>
												<div class="listkamar" style="display:none">
													<div class="row form-group">
														<div class="col-md-12">
															<table class="table">
																<thead>
																	<tr>
																		<th>Nama</th>
																		<th>Tempat Tidur</th>
																		<th>Detail</th>
																		<th>Jumlah</th>
																		<th>Harga / Malam</th>
																		<th>Pilih</th>
																	</tr>
																</thead>
																<tbody>
																	@foreach(\DB::table('jenis_kamars')->get() as $jk)
																	<tr>
																		<td>{{ $jk->nama_jenis_kamar }}</td>
																		<td>
																			<select class="tt">
																				<option value="{{ \DB::table('tempat_tidurs')->where('id',$jk->pilihan_tempat_tidur_1)->pluck('id')->first() }}">{{ \DB::table('tempat_tidurs')->where('id',$jk->pilihan_tempat_tidur_1)->pluck('nama_tempat_tidur')->first() }}</option>
																				<option value="{{ \DB::table('tempat_tidurs')->where('id',$jk->pilihan_tempat_tidur_2)->pluck('id')->first() }}">{{ \DB::table('tempat_tidurs')->where('id',$jk->pilihan_tempat_tidur_2)->pluck('nama_tempat_tidur')->first() }}</option>
																			</select>
																		</td>
																		<td>
																			{{ $jk->detail_jenis_kamar }}
																		</td>
																		<td><input class="jumlah" type="number" value="1" style="width:50px"/></td>
																		<td>Rp. {{ $jk->harga_jenis_kamar }}</td>
																		<td><input type="checkbox" name="select[]" value="{{ $jk->id }}"></td>
																	</tr>
																	@endforeach
																</tbody>
															</table>
														</div>
														<div class="row form-group">
															<div class="col-md-12">
																<button type="submit" class="btn btn-primary btncart">Add to Chart dan Masukkan Data Diri</button>
															</div>
														</div>
												</div>

												</div>
												<div class="datadiri" style="display:none">
													<div class="row form-group">
														<div class="col-md-3">
															<label for="ci">Title</label>
															<select class="form-control" name="title">
																<option value="Tuan">Tuan</option>
																<option value="Nyonya">Nyonya</option>
															</select>
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-6">
															<label for="ci">Nama Depan</label>
															<input type="text" class="form-control" name="nd">
														</div>
														<div class="col-md-6">
															<label for="co">Nama Belakang</label>
															<input type="text" class="form-control" name="nb">
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-12">
															<label for="ci">Alamat</label>
															<input type="text" class="form-control" name="almt">
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-4">
															<label for="ci">Nomor Identitas</label>
															<input type="text" class="form-control" name="ni">
														</div>
														<div class="col-md-4">
															<label for="ci">Jenis Identitas</label>
															<select class="form-control" name="ji">
																<option value="KTP">KTP</option>
																<option value="SIM">SIM</option>
																<option value="Paspor">Paspor</option>
															</select>
														</div>
														<div class="col-md-4">
															<label for="ci">Negara Penerbit</label>
															<input type="text" class="form-control" name="npi">
														</div>

													</div>
													<div class="row form-group">
														<div class="col-md-6">
															<label for="ci">Tanggal Lahir</label>
															<input type="date" class="form-control" name="tl" data-date-format="YYYY-MM-DD">
														</div>
														<div class="col-md-6">
															<label for="ci">Nomor Telpon</label>
															<input type="text" class="form-control" name="nt">
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-12">
															<button type="submit" class="btn btn-primary bkgs">Booking Sekarang</button>
														</div>
													</div>
												</div>
											</form>
										</div>

										<div class="tab-content-inner" data-content="edit">
											<form action="#" id="formeditdata">
												{{ csrf_field() }}
												<div class="row form-group">
													<div class="col-md-12">
														<label for="jd">Email</label>
														<input type="text" class="form-control" name="jd" value="{{ \Auth::user()->email }}" disabled>
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="jd">Username</label>
														<input type="text" class="form-control" name="username" value="{{ \Auth::user()->name }}">
													</div>
												</div>
												<div class="changepass" style="display:none">
													<div class="row form-group">
														<div class="col-md-12">
															<label for="jd">Old Password</label>
															<input type="password" class="form-control" name="oldpass" id="oldpass">
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-12">
															<label for="jd">New Password</label>
															<input type="password" class="form-control" name="newpass" id="newpass">
														</div>
													</div>
												</div>

												<label id="warningedit" style="color:#FF0000;display:none">username atau password salah</label>
												<div class="row form-group">
													<div class="col-md-3">
														<button class="btn btn-primary gntpass btn-block">Ganti Password</button>
													</div>
													<div class="col-md-3">
														<button type="submit" class="btn btn-primary simpanedit">Simpan</button>
													</div>
												</div>
											</form>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
					@endif

				</div>


			</div>
		</div>
	</div>
</header>

<div class="gtco-section border-bottom">
	<div class="gtco-container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
				<h2>Kamar</h2>
				<p>Tersedia 125 kamar dan suite yang dirancang kontemporer, menempati gedung 5 lantai. Semua kamar berdesain modern, memadukan tampilan modern minimalis dengan kenyamanan luar biasa.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6">
				<a href="images/kamar/superior_utama.jpg" class="fh5co-project-item image-popup">
					<figure>
						<div class="overlay"><i class="ti-plus"></i></div>
						<img src="images/kamar/superior_utama.jpg" alt="Superior" class="img-responsive">
					</figure>
					<div class="fh5co-text">
						<h2>Superior</h2>
						<p>Kamar dengan ukuran yang minimalis dan sangat berkelas.</p>
					</div>
				</a>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<a href="images/kamar/double_utama.jpg" class="fh5co-project-item image-popup">
					<figure>
						<div class="overlay"><i class="ti-plus"></i></div>
						<img src="images/kamar/double_utama.jpg" alt="Double Deluxe" class="img-responsive">
					</figure>
					<div class="fh5co-text">
						<h2>Double Deluxe</h2>
						<p>Kamar dengan tampilan interior yang berkelas.</p>
					</div>
				</a>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6">
				<a href="images/kamar/executive_utama.jpg" class="fh5co-project-item image-popup">
					<figure>
						<div class="overlay"><i class="ti-plus"></i></div>
						<img src="images/kamar/executive_utama.jpg" alt="Executive Deluxe" class="img-responsive">
					</figure>
					<div class="fh5co-text">
						<h2>Executive Deluxe</h2>
						<p>Kamar yang menampilkan pemandangan kota yang memukau.</p>
					</div>
				</a>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<a href="images/kamar/junior_utama.jpg" class="fh5co-project-item image-popup">
					<figure>
						<div class="overlay"><i class="ti-plus"></i></div>
						<img src="images/kamar/junior_utama.jpg" alt="Junior Suite" class="img-responsive">
					</figure>
					<div class="fh5co-text">
						<h2>Junior Suite</h2>
						<p>Kamar dengan kualitas VIP dan pemandangan kota yang memukau.</p>
					</div>
				</a>
			</div>

		</div>
	</div>
</div>

<div id="gtco-features" class="border-bottom">
	<div class="gtco-container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
				<h2>Fasilitas</h2>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="flaticon-010-hotel-4"></i>
						</span>
						<h3>Layout</h3>
						<p>Ruang duduk terpisah.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="flaticon-022-wifi"></i>
						</span>
						<h3>Internet</h3>
						<p>WiFi Gratis (24 Jam <i>Non-Stop</i>).</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="flaticon-007-spa"></i>
						</span>
						<h3>Kamar Mandi</h3>
						<p>Kamar mandi pribadi dengan bathtub, shower, jubah mandi dan sandal. </p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="flaticon-025-double-bed"></i>
						</span>
						<h3>Tempat Tidur</h3>
						<p>Seprai dengan kualitas premium diimpor langsung dari Eropa. </p>
					</div>
				</div>

				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="flaticon-008-room-service"></i>
						</span>
						<h3>Makanan dan Minuman</h3>
						<p>Kopi/Teh, Air minum kemasan, Minibar, Layanan kamar 24-jam dan Sarapan.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="flaticon-006-room"></i>
						</span>
						<h3>Tipe Kamar</h3>
						<p><i>Smoking Room</i> atau <i>Non Smoking Room</i>. </p>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="flaticon-009-safe-box"></i>
						</span>
						<h3>Kemudahan</h3>
						<p>Brankas, Meja tulis, Telepon dan Extra tempat tidur. </p>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="flaticon-035-air-conditioner"></i>
						</span>
						<h3>Kenyamanan</h3>
						<p>AC serta Layanan pembenahan kamar harian. </p>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div id="gtco-products">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Layanan Terbaik</h2>
					<p>
						Layanan terbaik kami demi kemudahan, kenyamanan dan kepuasan Anda di Grand Atma Hotels.
					</p>
				</div>
			</div>
			<div class="row">
				<div class="owl-carousel owl-carousel-carousel">
					<div class="item">
						<img src="images/layanan/cook.jpg" alt="layanan">
					</div>
					<div class="item">
						<img src="images/layanan/dinner.jpg" alt="layanan">
					</div>
					<div class="item">
						<img src="images/layanan/extrabed.jpg" alt="layanan">
					</div>
					<div class="item">
						<img src="images/layanan/food_1.jpg" alt="layanan">
					</div>
					<div class="item">
						<img src="images/layanan/food_3.jpg" alt="layanan">
					</div>
					<div class="item">
						<img src="images/layanan/food_5.jpg" alt="layanan">
					</div>
					<div class="item">
						<img src="images/layanan/food_6.jpg" alt="layanan">
					</div>
					<div class="item">
						<img src="images/layanan/food_8.jpg" alt="layanan">
					</div>
					<div class="item">
						<img src="images/layanan/laundry_reguler.jpg" alt="layanan">
					</div>
					<div class="item">
						<img src="images/layanan/massage.jpg" alt="layanan">
					</div>
					<div class="item">
						<img src="images/layanan/meetingroom_1.jpg" alt="layanan">
					</div>
					<div class="item">
						<img src="images/layanan/minibar_1.jpg" alt="layanan">
					</div>
					<div class="item">
						<img src="images/layanan/minibar_3.jpg" alt="layanan">
					</div>
					<div class="item">
						<img src="images/layanan/minibar_1.jpg" alt="layanan">
					</div>
					<div class="item">
						<img src="images/layanan/waitingroom_3.jpg" alt="layanan">
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
	<script>

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': '{{ csrf_token() }}'
		}
	});

	$(".submitlogin").click(function(e){
		e.preventDefault();
		$.ajax({
			url : "{{ route('dologin') }}",
			type : "post",
			data : $("#formlogin").serialize(),
			success: function(data){
				if(data == "success")
				{
					window.location.href = '{{ route("dashboard.create") }}';
				}
				else if(data == "success2")
				{
					window.location.href = '{{ url("/index") }}';
				}
				else {
					console.log('a');
					$("#warningauth").attr('style','color:#FF0000;display:block');
				}
			}
		})
	});


	$(".btndaftar").click(function(e){
		e.preventDefault();
		if($("#usernamed").val() == "" || $("#emaild").val() == "" || $("#passwordd").val() == "" || $("#password2d").val() == "")
		{

			$("#daftarwarn").attr('style','color:#FF0000;display:block');
			$("#daftarwarn").text("isi data dengan lengkap");
		}
		else if($("#passwordd").val() != $("#password2d").val())
		{
			$("#daftarwarn").attr('style','color:#FF0000;display:block');
			$("#daftarwarn").text("password dan konfirmasi password harus sama");
		}
		else {
			$.ajax({
				type : 'post',
				url : '{{ route("register") }}',
				data : $("#formdaftar").serialize(),
				success : function(data){
					if(data == "fname")
					{
						$("#daftarwarn").attr('style','color:#FF0000;display:block');
						$("#daftarwarn").text("username sudah terdaftar");
					}
					else if(data == "femail")
					{
						$("#daftarwarn").attr('style','color:#FF0000;display:block');
						$("#daftarwarn").text("email sudah terdaftar");
					}
					else {
						alert("registrasi sukses");
						window.location.href = '{{ url("/index") }}';

					}
				}
			});
		}
	});
	var flag;
	$(".gntpass").click(function(e){
		e.preventDefault();
		if($(this).text() == "Ganti Password")
		{
			flag = 1;
			$(this).text("Batal");
			$(".changepass").show();
		}
		else {
			flag = 0;
			$(this).text("Ganti Password");
			$(".changepass").hide();
			$("#oldpass").val("");
			$('#newpass').val("");
		}
	});

	$(".simpanedit").click(function(e){
		e.preventDefault();
		if(flag == 1)
		{
			if($("#oldpass").val() == "" || $('#newpass').val() == "")
			{
				$("#warningedit").show();
				$("#warningedit").text("isi data dengan lengkap");
			}
			else if($("#oldpass").val() != "" && $('#newpass').val() != "")
			{
				$.ajax({
					url: '{{ route("editdata") }}',
					type: 'post',
					data: $('#formeditdata').serialize(),
					success: function(data){
						if(data == "fpass")
						{
							$("#warningedit").show();
							$("#warningedit").text("password lama salah");
						}
						else {
							alert("success mengubah data");
							location.reload();
						}
					}
				});
			}
		}
		else
		{
			$.ajax({
				url: '{{ route("editdata") }}',
				type: 'post',
				data: $('#formeditdata').serialize(),
				success: function(data){
					if(data == "fpass")
					{
						$("#warningedit").show();
						$("#warningedit").text("password lama salah");

					}
					else {
						alert("success mengubah data");
						location.reload();
					}
				}
			});
		}
	});

	$("input[type='date']").on("change", function() {
		this.setAttribute(
			"data-date",
			moment(this.value, "YYYY-MM-DD")
			.format( this.getAttribute("data-date-format") )
		)
	}).trigger("change")

	$(".btncek").click(function(e){
		e.preventDefault();
		$(".listkamar").show()
	});

	$(".btncart").click(function(e){
		e.preventDefault();
		$(".datadiri").show();
	});

	$(".bkgs").click(function(e){
		e.preventDefault();
		var conf = confirm("apakah anda yakin ingin melakukan booking ini ?");
		if(conf ==  true)
		{
			alert("registrasi sukses! silahkan lihat detail pembayaran pada menu History");
			$("#formregis").submit();
		}

	})

	</script>
	@include('footer')
