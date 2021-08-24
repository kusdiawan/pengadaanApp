<nav id="navbar" class="navbar">
	<ul>
		<li>
			<a class="nav-link scrolltoactive"  href="/">Home</a>
		</li>
		
		@if($token == "kosong")
		<li>
			<a class="nav-link scrollto" href="/masukSuplier">Login</a>
		</li>

		<li>
			<a class="getstarted scrollto" href="/registrasi">Daftar</a>
		</li>
		@else
		<li>
			<a class="nav-link scrollto" href="/suplierKeluar">Keluar</a>
		</li>
		<li>
			<a class="nav-link scrollto" href="/listSuplier">Pengajuan</a>
		</li>
		@endif
	</ul>
</nav><!-- .navbar -->