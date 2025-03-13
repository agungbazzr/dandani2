@extends('layout-admin')


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
            <li><a href="{{url('tukang')}}">Tukang</a></li>
            <li class="current">Tambah Tukang</li>
          </ol>
        </div>
      </nav>
    </div>

    <!-- Main content -->
    <div class="container" data-aos="fade-up">
     <br>
          <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin_tukang.store') }}">
            {{ csrf_field() }}
            
            <div class="mb-3">
                <label class="form-label font-weight-bold">Foto</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
            
                <!-- error message untuk title -->
                @error('image')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 {{ $errors->has('nama_tukang') ? ' has-error' : '' }}">
              <label for="nama_tukang" class="form-label">Nama Tukang</label>

              <div>
                <input id="nama_tukang" maxlength="255" type="text" class="form-control " name="nama_tukang" value="{{ old('nama_tukang') }}" required autofocus autocomplete="off">

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
                <input id="email" maxlength="255" type="text" class="form-control " name="email" value="{{ old('email') }}" required autofocus autocomplete="off">

                @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3 {{ $errors->has('geo_lat') ? ' has-error' : '' }}">
              <label for="geo_lat" class="form-label">Geo Lat</label>

              <div>
                <input id="geo_lat" maxlength="255" type="text" class="form-control " name="geo_lat" value="{{ old('geo_lat') }}" required autofocus autocomplete="off">

                @if ($errors->has('geo_lat'))
                <span class="help-block">
                  <strong>{{ $errors->first('geo_lat') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3 {{ $errors->has('geo_long') ? ' has-error' : '' }}">
              <label for="geo_long" class="form-label">Geo Long</label>

              <div>
                <input id="geo_long" maxlength="255" type="text" class="form-control " name="geo_long" value="{{ old('geo_long') }}" required autofocus autocomplete="off">

                @if ($errors->has('geo_long'))
                <span class="help-block">
                  <strong>{{ $errors->first('geo_long') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3 {{ $errors->has('alamat') ? ' has-error' : '' }}">
              <label for="alamat" class="form-label">Alamat</label>

              <div>
                <input id="alamat" maxlength="" type="text" class="form-control " name="alamat" value="{{ old('alamat') }}" required autofocus autocomplete="off">

                @if ($errors->has('alamat'))
                <span class="help-block">
                  <strong>{{ $errors->first('alamat') }}</strong>
                </span>
                @endif
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
       