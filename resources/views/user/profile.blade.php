@extends('layout-user')


@section('title', 'Tukang')
@section('content')
 @if(session('error'))
  <div class="alert alert-error">
   {{ session('error') }}
 </div>
 @endif

 @if(count($errors) > 0)
 <div class="alert alert-danger">
   <strong>info !!</strong>
   <br>
   <ul>
     @foreach($errors->all() as $error)
     <li>{{ $error }}</li>
     @endforeach
   </ul>
 </div>
 @endif
    <section id="comment-form" class="comment-form section">
    <div class="page-title">
      
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{url('user')}}">User</a></li>
            <li class="current">Profile</li>
          </ol>
        </div>
      </nav>
    </div>

    <!-- Main content -->
    <div class="container" data-aos="fade-up">
     <br>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('tukang.store') }}">
            {{ csrf_field() }}
            <div class="row gy-5">
              
              <div class="col-xl-5" data-aos="zoom-out" data-aos-delay="100">
                  <div class="mb-3 {{ $errors->has('nama_tukang') ? ' has-error' : '' }}">
                  <label for="nama_tukang" class="form-label">Nama Lengkap</label>

                  <div>
                    <input id="nama_tukang" maxlength="255" type="text" class="form-control " name="nama_tukang" value="{{ Auth::user()->name; }}" required autofocus autocomplete="off">

                    @if ($errors->has('nama_tukang'))
                    <span class="help-block">
                      <strong>{{ $errors->first('nama_tukang') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="mb-3 {{ $errors->has('no_hp') ? ' has-error' : '' }}">
                  <label for="no_hp" class="form-label">No Hp</label>

                  <div>
                    <input id="no_hp" maxlength="255" type="text" class="form-control " name="no_hp" value="{{ old('no_hp') }}" required autofocus autocomplete="off">

                    @if ($errors->has('no_hp'))
                    <span class="help-block">
                      <strong>{{ $errors->first('no_hp') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="mb-3 {{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email" class="form-label">Email</label>

                  <div>
                    <input id="email" maxlength="255" type="text" class="form-control " name="email" value="{{ Auth::user()->email; }}" required autofocus autocomplete="off">

                    @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
              </div>
              
              <div class="col-xl-7 ">
                <div class="text-end">
                  <a href="{{ route('user.alamat') }}" class=""><i class="bi bi-plus"></i> Tambah Alamat</a>
                </div>
                  <div class="portfolio-description aos-init aos-animate " data-aos="fade-up" data-aos-delay="300">
                  
                    <h2>Alamat </h2>
                    <div class="about content">
                      <h3>Who We Are</h3>
                      <h2>Expedita voluptas omnis cupiditate totam eveniet nobis sint iste. Dolores est repellat corrupti reprehenderit.</h2>
                      <p>
                        Quisquam vel ut sint cum eos hic dolores aperiam. Sed deserunt et. Inventore et et dolor consequatur itaque ut voluptate sed et. Magnam nam ipsum tenetur suscipit voluptatum nam et est corrupti.
                      </p>
                      <div class="text-center text-lg-start">
                        <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                          <span>Read More</span>
                          <i class="bi bi-arrow-right"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                  
              </div>
          </div>



            
            <div class="mb-3">
                  <div class="col-md-offset-4">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check"></i>
                      Simpan
                    </button>
                    <a href="{{ route('tukang.index') }}" class="btn btn-success"><i class="bi bi-arrow-left"></i> Batal</a>
                  </div>
                </div>
              </form>
            </div>
            @endsection
       