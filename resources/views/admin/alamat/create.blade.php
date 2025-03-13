@extends('layout-admin')


@section('title', 'Alamat')
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
            <li><a href="{{url('alamat')}}">Alamat</a></li>
            <li class="current">Tambah Alamat</li>
          </ol>
        </div>
      </nav>
    </div>

    <!-- Main content -->
    <div class="container" data-aos="fade-up">
     <br>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('alamat.store') }}">
            {{ csrf_field() }}
            
            <div class="mb-3 {{ $errors->has('id_pemilik') ? ' has-error' : '' }}">
              <label for="id_pemilik" class="form-label">Id Pemilik</label>

              <div>
                <input id="id_pemilik" maxlength="255" type="text" class="form-control " name="id_pemilik" value="{{ old('id_pemilik') }}" required autofocus autocomplete="off">

                @if ($errors->has('id_pemilik'))
                <span class="help-block">
                  <strong>{{ $errors->first('id_pemilik') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3 {{ $errors->has('title') ? ' has-error' : '' }}">
              <label for="title" class="form-label">Title</label>

              <div>
                <input id="title" maxlength="255" type="text" class="form-control " name="title" value="{{ old('title') }}" required autofocus autocomplete="off">

                @if ($errors->has('title'))
                <span class="help-block">
                  <strong>{{ $errors->first('title') }}</strong>
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
                    <a href="{{ route('alamat.index') }}" class="btn btn-success"><i class="bi bi-arrow-left"></i> Batal</a>
                  </div>
                </div>
              </form>
            </div>
            @endsection
       