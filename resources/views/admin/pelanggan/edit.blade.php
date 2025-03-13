@extends('layout-admin')


@section('title', 'Pelanggan')
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
    <section id="starter-section" class="starter-section section">
    <div class="page-title">
      
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{url('pelanggan')}}">Pelanggan</a></li>
            <li class="current">Tambah Pelanggan</li>
          </ol>
        </div>
      </nav>
    </div>

    <!-- Main content -->
    <div class="container" data-aos="fade-up">
    <section id="comment-form" class="comment-form section">
            <div class="container">

              <form action="">

                <h4>Post Comment</h4>
                <p>Your email address will not be published. Required fields are marked * </p>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input name="name" type="text" class="form-control" placeholder="Your Name*">
                  </div>
                  <div class="col-md-6 form-group">
                    <input name="email" type="text" class="form-control" placeholder="Your Email*">
                  </div>
                </div>
                <div class="row">
                  <div class="col form-group">
                    <input name="website" type="text" class="form-control" placeholder="Your Website">
                  </div>
                </div>
                <div class="row">
                  <div class="col form-group">
                    <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Post Comment</button>
                </div>

              </form>

            </div>
          </section><!-- /Comment Form Section -->
     <br>
        @foreach($pelanggan as $data)
          <form class="form-horizontal" role="form" method="POST" action="{{ url('pelanggan/update')}}/{{ $data->id }}">
            {{ csrf_field() }}

            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="id">
            
            <div class="mb-3 {{ $errors->has('nama_pelanggan') ? ' has-error' : '' }}">
              <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>

              <div>
                <input id="nama_pelanggan" maxlength="255" type="text" class="form-control " name="nama_pelanggan" value="{{ $data->nama_pelanggan }}" required autofocus autocomplete="off">

                @if ($errors->has('nama_pelanggan'))
                <span class="help-block">
                  <strong>{{ $errors->first('nama_pelanggan') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3 {{ $errors->has('no_hp') ? ' has-error' : '' }}">
              <label for="no_hp" class="form-label">No Hp</label>

              <div>
                <input id="no_hp" maxlength="255" type="text" class="form-control " name="no_hp" value="{{ $data->no_hp }}" required autofocus autocomplete="off">

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
                <input id="email" maxlength="255" type="text" class="form-control " name="email" value="{{ $data->email }}" required autofocus autocomplete="off">

                @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-offset-4">
                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>
                  Simpan
                </button>
                <a href="{{ route('pelanggan.index') }}" class="btn btn-success"><i class="fa fa-times"></i> Batal</a>
              </div>
            </div>
          </form>
        @endforeach
    </div>
    @endsection
       