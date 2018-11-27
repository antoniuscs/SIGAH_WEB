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
		<div class="row">
			<div class="col-md-12 col-md-offset-0 text-left">
					<div class="row row-mt-15em">
						<div class="col-md-12  animate-box" data-animate-effect="fadeInRight">
							<div class="form-wrap">
								<div class="tab">
									<ul class="tab-menu">
										<li class="active gtco-first"><a href="#" data-tab="reg">Reservasi</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-content-inner active" data-content="reg">
											<form action="{{ route('reservasiuser') }}" method="post" id="formregis">
												{{ csrf_field() }}
												<script>
													function hanyaAngka(evt) {
													var charCode = (evt.which) ? evt.which : event.keyCode
													if (charCode > 31 && (charCode < 48 || charCode > 57))
											
														return false;
													return true;
													}
												</script>
												<div class="row form-group">
													<div class="col-md-6">
														<label for="ci">Tanggal Check In</label>
														<input type="date" data-date="" class="form-control" name="ci" data-date-format="YYYY-MM-DD" required>
													</div>
													<div class="col-md-6">
														<label for="co">Tanggal Check Out</label>
														<input type="date" data-date="" class="form-control" name="co" data-date-format="YYYY-MM-DD" required>
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
														<input type="number" class="form-control" value="1" name="jd" required>
													</div>
													<div class="col-md-6">
														<label for="ja">Jumlah Anak</label>
														<input type="number" class="form-control" value="0" name="ja" required>
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
																			<select class="tt" class="form-control" name="tt">
																				<option value="{{ \DB::table('tempat_tidurs')->where('id',$jk->pilihan_tempat_tidur_1)->pluck('id')->first() }}">{{ \DB::table('tempat_tidurs')->where('id',$jk->pilihan_tempat_tidur_1)->pluck('nama_tempat_tidur')->first() }}</option>
																				<option value="{{ \DB::table('tempat_tidurs')->where('id',$jk->pilihan_tempat_tidur_2)->pluck('id')->first() }}">{{ \DB::table('tempat_tidurs')->where('id',$jk->pilihan_tempat_tidur_2)->pluck('nama_tempat_tidur')->first() }}</option>
																			</select>
																		</td>
																		<td>
																			{{ $jk->detail_jenis_kamar }}
																		</td>
																		<td><input class="jumlah" class="form-control" name="jml" type="number" value="1" style="width:50px"/></td>
																		<td>Rp. {{ $jk->harga_jenis_kamar }}</td>
																		<td><input type="checkbox" class="form-control" name="select[]" value="{{ $jk->id }}"></td>
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
															<select class="form-control" name="title" required>
																<option value="">--</option>
																<option value="Tuan">Tuan</option>
																<option value="Nyonya">Nyonya</option>
																<option value="Nona">Nona</option>
															</select>
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-6">
															<label for="ci">Nama Depan</label>
															<input type="text" class="form-control" name="nd" required>
														</div>
														<div class="col-md-6">
															<label for="ci">Nama Belakang</label>
															<input type="text" class="form-control" name="nb">
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-12">
															<label for="ci">Alamat</label>
															<input type="text" class="form-control" name="almt" required>
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-4">
															<label for="ci">Nomor Identitas</label>
															<input type="text" class="form-control" onkeypress="return hanyaAngka(event)" maxlength="16" name="ni" required>
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
															<select name="npi" id="npi" class="form-control" required>
																<option value="Afghanistan">Afghanistan</option> 
																<option value="Albania">Albania</option> 
																<option value="Algeria">Algeria</option> 
																<option value="American Samoa">American Samoa</option> 
																<option value="Andorra">Andorra</option> 
																<option value="Angola">Angola</option> 
																<option value="Anguilla">Anguilla</option> 
																<option value="Antarctica">Antarctica</option> 
																<option value="Antigua and Barbuda">Antigua and Barbuda</option> 
																<option value="Argentina">Argentina</option> 
																<option value="Armenia">Armenia</option> 
																<option value="Aruba">Aruba</option> 
																<option value="Australia">Australia</option> 
																<option value="Austria">Austria</option> 
																<option value="Azerbaijan">Azerbaijan</option> 
																<option value="Bahamas">Bahamas</option> 
																<option value="Bahrain">Bahrain</option> 
																<option value="Bangladesh">Bangladesh</option> 
																<option value="Barbados">Barbados</option> 
																<option value="Belarus">Belarus</option> 
																<option value="Belgium">Belgium</option> 
																<option value="Belize">Belize</option> 
																<option value="Benin">Benin</option> 
																<option value="Bermuda">Bermuda</option> 
																<option value="Bhutan">Bhutan</option> 
																<option value="Bolivia">Bolivia</option> 
																<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option> 
																<option value="Botswana">Botswana</option> 
																<option value="Bouvet Island">Bouvet Island</option> 
																<option value="Brazil">Brazil</option> 
																<option value="British Indian Ocean Territory">British Indian Ocean Territory</option> 
																<option value="Brunei Darussalam">Brunei Darussalam</option> 
																<option value="Bulgaria">Bulgaria</option> 
																<option value="Burkina Faso">Burkina Faso</option> 
																<option value="Burundi">Burundi</option> 
																<option value="Cambodia">Cambodia</option> 
																<option value="Cameroon">Cameroon</option> 
																<option value="Canada">Canada</option> 
																<option value="Cape Verde">Cape Verde</option> 
																<option value="Cayman Islands">Cayman Islands</option> 
																<option value="Central African Republic">Central African Republic</option> 
																<option value="Chad">Chad</option> 
																<option value="Chile">Chile</option> 
																<option value="China">China</option> 
																<option value="Christmas Island">Christmas Island</option> 
																<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option> 
																<option value="Colombia">Colombia</option> 
																<option value="Comoros">Comoros</option> 
																<option value="Congo">Congo</option> 
																<option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option> 
																<option value="Cook Islands">Cook Islands</option> 
																<option value="Costa Rica">Costa Rica</option> 
																<option value="Cote D'ivoire">Cote D'ivoire</option> 
																<option value="Croatia">Croatia</option> 
																<option value="Cuba">Cuba</option> 
																<option value="Cyprus">Cyprus</option> 
																<option value="Czech Republic">Czech Republic</option> 
																<option value="Denmark">Denmark</option> 
																<option value="Djibouti">Djibouti</option> 
																<option value="Dominica">Dominica</option> 
																<option value="Dominican Republic">Dominican Republic</option> 
																<option value="Ecuador">Ecuador</option> 
																<option value="Egypt">Egypt</option> 
																<option value="El Salvador">El Salvador</option> 
																<option value="Equatorial Guinea">Equatorial Guinea</option> 
																<option value="Eritrea">Eritrea</option> 
																<option value="Estonia">Estonia</option> 
																<option value="Ethiopia">Ethiopia</option> 
																<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option> 
																<option value="Faroe Islands">Faroe Islands</option> 
																<option value="Fiji">Fiji</option> 
																<option value="Finland">Finland</option> 
																<option value="France">France</option> 
																<option value="French Guiana">French Guiana</option> 
																<option value="French Polynesia">French Polynesia</option> 
																<option value="French Southern Territories">French Southern Territories</option> 
																<option value="Gabon">Gabon</option> 
																<option value="Gambia">Gambia</option> 
																<option value="Georgia">Georgia</option> 
																<option value="Germany">Germany</option> 
																<option value="Ghana">Ghana</option> 
																<option value="Gibraltar">Gibraltar</option> 
																<option value="Greece">Greece</option> 
																<option value="Greenland">Greenland</option> 
																<option value="Grenada">Grenada</option> 
																<option value="Guadeloupe">Guadeloupe</option> 
																<option value="Guam">Guam</option> 
																<option value="Guatemala">Guatemala</option> 
																<option value="Guinea">Guinea</option> 
																<option value="Guinea-bissau">Guinea-bissau</option> 
																<option value="Guyana">Guyana</option> 
																<option value="Haiti">Haiti</option> 
																<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option> 
																<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option> 
																<option value="Honduras">Honduras</option> 
																<option value="Hong Kong">Hong Kong</option> 
																<option value="Hungary">Hungary</option> 
																<option value="Iceland">Iceland</option> 
																<option value="India">India</option> 
																<option value="Indonesia" selected>Indonesia</option> 
																<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option> 
																<option value="Iraq">Iraq</option> 
																<option value="Ireland">Ireland</option> 
																<option value="Israel">Israel</option> 
																<option value="Italy">Italy</option> 
																<option value="Jamaica">Jamaica</option> 
																<option value="Japan">Japan</option> 
																<option value="Jordan">Jordan</option> 
																<option value="Kazakhstan">Kazakhstan</option> 
																<option value="Kenya">Kenya</option> 
																<option value="Kiribati">Kiribati</option> 
																<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option> 
																<option value="Korea, Republic of">Korea, Republic of</option> 
																<option value="Kuwait">Kuwait</option> 
																<option value="Kyrgyzstan">Kyrgyzstan</option> 
																<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option> 
																<option value="Latvia">Latvia</option> 
																<option value="Lebanon">Lebanon</option> 
																<option value="Lesotho">Lesotho</option> 
																<option value="Liberia">Liberia</option> 
																<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option> 
																<option value="Liechtenstein">Liechtenstein</option> 
																<option value="Lithuania">Lithuania</option> 
																<option value="Luxembourg">Luxembourg</option> 
																<option value="Macao">Macao</option> 
																<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option> 
																<option value="Madagascar">Madagascar</option> 
																<option value="Malawi">Malawi</option> 
																<option value="Malaysia">Malaysia</option> 
																<option value="Maldives">Maldives</option> 
																<option value="Mali">Mali</option> 
																<option value="Malta">Malta</option> 
																<option value="Marshall Islands">Marshall Islands</option> 
																<option value="Martinique">Martinique</option> 
																<option value="Mauritania">Mauritania</option> 
																<option value="Mauritius">Mauritius</option> 
																<option value="Mayotte">Mayotte</option> 
																<option value="Mexico">Mexico</option> 
																<option value="Micronesia, Federated States of">Micronesia, Federated States of</option> 
																<option value="Moldova, Republic of">Moldova, Republic of</option> 
																<option value="Monaco">Monaco</option> 
																<option value="Mongolia">Mongolia</option> 
																<option value="Montserrat">Montserrat</option> 
																<option value="Morocco">Morocco</option> 
																<option value="Mozambique">Mozambique</option> 
																<option value="Myanmar">Myanmar</option> 
																<option value="Namibia">Namibia</option> 
																<option value="Nauru">Nauru</option> 
																<option value="Nepal">Nepal</option> 
																<option value="Netherlands">Netherlands</option> 
																<option value="Netherlands Antilles">Netherlands Antilles</option> 
																<option value="New Caledonia">New Caledonia</option> 
																<option value="New Zealand">New Zealand</option> 
																<option value="Nicaragua">Nicaragua</option> 
																<option value="Niger">Niger</option> 
																<option value="Nigeria">Nigeria</option> 
																<option value="Niue">Niue</option> 
																<option value="Norfolk Island">Norfolk Island</option> 
																<option value="Northern Mariana Islands">Northern Mariana Islands</option> 
																<option value="Norway">Norway</option> 
																<option value="Oman">Oman</option> 
																<option value="Pakistan">Pakistan</option> 
																<option value="Palau">Palau</option> 
																<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option> 
																<option value="Panama">Panama</option> 
																<option value="Papua New Guinea">Papua New Guinea</option> 
																<option value="Paraguay">Paraguay</option> 
																<option value="Peru">Peru</option> 
																<option value="Philippines">Philippines</option> 
																<option value="Pitcairn">Pitcairn</option> 
																<option value="Poland">Poland</option> 
																<option value="Portugal">Portugal</option> 
																<option value="Puerto Rico">Puerto Rico</option> 
																<option value="Qatar">Qatar</option> 
																<option value="Reunion">Reunion</option> 
																<option value="Romania">Romania</option> 
																<option value="Russian Federation">Russian Federation</option> 
																<option value="Rwanda">Rwanda</option> 
																<option value="Saint Helena">Saint Helena</option> 
																<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
																<option value="Saint Lucia">Saint Lucia</option> 
																<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option> 
																<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option> 
																<option value="Samoa">Samoa</option> 
																<option value="San Marino">San Marino</option> 
																<option value="Sao Tome and Principe">Sao Tome and Principe</option> 
																<option value="Saudi Arabia">Saudi Arabia</option> 
																<option value="Senegal">Senegal</option> 
																<option value="Serbia and Montenegro">Serbia and Montenegro</option> 
																<option value="Seychelles">Seychelles</option> 
																<option value="Sierra Leone">Sierra Leone</option> 
																<option value="Singapore">Singapore</option> 
																<option value="Slovakia">Slovakia</option> 
																<option value="Slovenia">Slovenia</option> 
																<option value="Solomon Islands">Solomon Islands</option> 
																<option value="Somalia">Somalia</option> 
																<option value="South Africa">South Africa</option> 
																<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option> 
																<option value="Spain">Spain</option> 
																<option value="Sri Lanka">Sri Lanka</option> 
																<option value="Sudan">Sudan</option> 
																<option value="Suriname">Suriname</option> 
																<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option> 
																<option value="Swaziland">Swaziland</option> 
																<option value="Sweden">Sweden</option> 
																<option value="Switzerland">Switzerland</option> 
																<option value="Syrian Arab Republic">Syrian Arab Republic</option> 
																<option value="Taiwan, Province of China">Taiwan, Province of China</option> 
																<option value="Tajikistan">Tajikistan</option> 
																<option value="Tanzania, United Republic of">Tanzania, United Republic of</option> 
																<option value="Thailand">Thailand</option> 
																<option value="Timor-leste">Timor-leste</option> 
																<option value="Togo">Togo</option> 
																<option value="Tokelau">Tokelau</option> 
																<option value="Tonga">Tonga</option> 
																<option value="Trinidad and Tobago">Trinidad and Tobago</option> 
																<option value="Tunisia">Tunisia</option> 
																<option value="Turkey">Turkey</option> 
																<option value="Turkmenistan">Turkmenistan</option> 
																<option value="Turks and Caicos Islands">Turks and Caicos Islands</option> 
																<option value="Tuvalu">Tuvalu</option> 
																<option value="Uganda">Uganda</option> 
																<option value="Ukraine">Ukraine</option> 
																<option value="United Arab Emirates">United Arab Emirates</option> 
																<option value="United Kingdom">United Kingdom</option> 
																<option value="United States">United States</option> 
																<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option> 
																<option value="Uruguay">Uruguay</option> 
																<option value="Uzbekistan">Uzbekistan</option> 
																<option value="Vanuatu">Vanuatu</option> 
																<option value="Venezuela">Venezuela</option> 
																<option value="Viet Nam">Viet Nam</option> 
																<option value="Virgin Islands, British">Virgin Islands, British</option> 
																<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option> 
																<option value="Wallis and Futuna">Wallis and Futuna</option> 
																<option value="Western Sahara">Western Sahara</option> 
																<option value="Yemen">Yemen</option> 
																<option value="Zambia">Zambia</option> 
																<option value="Zimbabwe">Zimbabwe</option>
															</select>
														</div>

													</div>
													<div class="row form-group">
														<div class="col-md-6">
															<label for="ci">Nomor HP</label>
															<input type="text" class="form-control" onkeypress="return hanyaAngka(event)" maxlength="16" name="np" required>
														</div>
														<div class="col-md-6">
															<label for="ci">Nomor Telpon</label>
															<input type="text" class="form-control" onkeypress="return hanyaAngka(event)" maxlength="16" name="nt">
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-6">
															<label for="ci">Tanggal Lahir</label>
															<input type="date" class="form-control" name="tl" data-date-format="YYYY-MM-DD" required>
														</div>
														<div class="col-md-6">
															<label for="ci">Email</label>
															<input type="email" class="form-control" name="em" maxlength="50" required>
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-12">
															<button type="submit" class="btn btn-primary">Booking Sekarang</button>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>


			</div>
		</div>
	</div>
</header>

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
				$("#warningedit").text("Isi Data dengan Lengkap");
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
							$("#warningedit").text("Password Lama Anda Salah!");
						}
						else {
							alert("Data berhasil diubah!");
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
						$("#warningedit").text("Password Lama Anda Salah!");

					}
					else {
						alert("Data berhasil diubah!");
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

	</script>
	@include('footer')
