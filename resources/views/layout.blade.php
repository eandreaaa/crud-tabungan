<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Menabung.com</title>
		<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap"/>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<link rel="stylesheet" href="{{asset('asset/css/styles.css')}}" />
		<link rel="stylesheet" href="{{asset('asset/css/sidebar.css')}}" />
	</head>
	
  <style>
    body {
        background: url('asset/img/nabung.png');
        background-repeat: no-repeat;
        background-position-x: 65px;
        background-position: top, left;
        background-size: 900px;
    }
</style>
	<body>
		<aside class="sidebar">
			<nav>
				<ul class="sidebar__nav">
					<li>
						<a href="/nabung" class="sidebar__nav__link">
							<i class="mdi mdi-menu"></i>
							<span class="sidebar__nav__text">PPLG XI-5</span>
						</a>
					</li>
					<li>
						<a href="/nabung/dashboard" class="sidebar__nav__link">
							<i class="mdi mdi-view-dashboard"></i>
							<span class="sidebar__nav__text">Daftar Siswa</span>
						</a>
					</li>
					<li>
						<a href="{{url('/nabung/create')}}" class="sidebar__nav__link">
							<i class="mdi mdi-account-plus"></i>
							<span class="sidebar__nav__text">Tambah Siswa</span>
						</a>
					</li>
					<li>
						<a href="/logout" class="sidebar__nav__link">
							<i class="mdi mdi-logout"></i>
							<span class="sidebar__nav__text">Logout</span>
						</a>
					</li>
				</ul>
			</nav>
		</aside>
		<main class="main">
      @yield('content')
		</main>
	</body>
</html>
