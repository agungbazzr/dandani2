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
     <br>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('pelanggan.store') }}">
            {{ csrf_field() }}
            
            <div class="mb-3 {{ $errors->has('nama_pelanggan') ? ' has-error' : '' }}">
              <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>

              <div>
                <input id="nama_pelanggan" maxlength="255" type="text" class="form-control " name="nama_pelanggan" value="{{ old('nama_pelanggan') }}" required autofocus autocomplete="off">

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
            <div class="mb-3">
                  <div class="col-md-offset-4">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check"></i>
                      Simpan
                    </button>
                    <a href="{{ route('pelanggan.index') }}" class="btn btn-success"><i class="bi bi-arrow-left"></i> Batal</a>
                  </div>
                </div>
              </form>
            </div>
            @endsection
       