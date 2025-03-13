
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>DAFTAR</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('home/assets/img/logo.png') }}" rel="icon">
  <link href="{{ asset('home/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap') }}" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('home/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('home/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('home/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('home/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('home/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('home/assets/css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Updated: Nov 01 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="starter-page-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="/dashboard" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ asset('home/assets/img/logo.png') }}" alt="">
        <h1 class="sitename">dandani.id</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ url('/') }}">Dashboard<br></a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted flex-md-shrink-0" href="{{ route('login') }}">Login</a>

    </div>
  </header>

  <main class="main">
   
  <<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                            <div class="card-body">
                                <form action="{{route('proses_register')}}" method="POST" id="regForm">
                                {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputFirstName">Nama</label>
                                        <input class="form-control py-4" value="{{ old('name') }}" id="inputFirstName" type="text" name="name" placeholder="Masukkan Nama" />
                                         @if ($errors->has('name'))
                                          <span class="error"> * {{ $errors->first('name') }}</span>
                                          @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputusername">Username</label>
                                        <input class="form-control py-4" value="{{ old('username') }}" id="inputusername" type="text" name="username" placeholder="Masukkan username" />
                                         @if ($errors->has('username'))
                                          <span class="error"> * {{ $errors->first('username') }}</span>
                                          @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                                        <input class="form-control py-4" value="{{ old('email') }}" id="inputEmailAddress" type="email" aria-describedby="emailHelp" name="email" placeholder="Masukkan Email" />
                                        @if ($errors->has('email'))
                                          <span class="error">* {{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputPassword">Password</label>
                                        <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Masukkan Password" />
                                        @if ($errors->has('password'))
                                          <span class="error">* {{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputPassword">Password Ulang</label>
                                        <input class="form-control py-4" id="password_re" type="password" name="password_confirmation" placeholder="Masukkan Password" />
                                        <input type="hidden" name="level" value="user">
                                        @if ($errors->has('password_confirmation'))
                                          <span class="error">* {{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mt-4 mb-0">
                                        <button class="btn btn-primary btn-block" type="submit">Daftar!</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="{{route('login')}}">Sudah Punya Akun? Login!</a><br>
                                <a href="{{route('register_tukang')}}">Daftar Sebagai Tukang? Sekarang!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</div>


  </main>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('home/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('home/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('home/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('home/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('home/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('home/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('home/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('home/assets/js/main.js') }}"></script>

</body>

</html>