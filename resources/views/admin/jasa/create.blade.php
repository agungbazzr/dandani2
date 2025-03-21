@extends('layout-admin')


@section('title', 'Jasa')
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
            <li><a href="{{url('jasa')}}">Jasa</a></li>
            <li class="current">Tambah Jasa</li>
          </ol>
        </div>
      </nav>
    </div>

    <!-- Main content -->
    <div class="container" data-aos="fade-up">
     <br>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('jasa.store') }}">
            {{ csrf_field() }}
            
            <div class="mb-3 {{ $errors->has('nama_jasa') ? ' has-error' : '' }}">
              <label for="nama_jasa" class="form-label">Nama Jasa</label>

              <div>
                <input id="nama_jasa" maxlength="255" type="text" class="form-control " name="nama_jasa" value="{{ old('nama_jasa') }}" required autofocus autocomplete="off">

                @if ($errors->has('nama_jasa'))
                <span class="help-block">
                  <strong>{{ $errors->first('nama_jasa') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3 {{ $errors->has('jenis_jasa') ? ' has-error' : '' }}">
              <label for="jenis_jasa" class="form-label">Jenis Jasa</label>

              <div>
              <select class="form-control form-select-lg" name="jenis_jasa" id="jenis_jasa" aria-label=".form-select-sm example">
                  <option selected>Pilih Jenis Jasa</option>
                  @foreach($KategoriJasa as $data )
                  <option value="{{ $data->nama_kategori_jasa }}">{{ $data->nama_kategori_jasa }}</option>
                @endforeach
              </select>

                @if ($errors->has('jenis_jasa'))
                <span class="help-block">
                  <strong>{{ $errors->first('jenis_jasa') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3 {{ $errors->has('harga_jasa') ? ' has-error' : '' }}">
              <label for="harga_jasa" class="form-label">Harga Jasa</label>

              <div>
                <input id="harga_jasa" maxlength="255" type="text" class="form-control " name="harga_jasa" value="{{ old('harga_jasa') }}" required autofocus autocomplete="off">

                @if ($errors->has('harga_jasa'))
                <span class="help-block">
                  <strong>{{ $errors->first('harga_jasa') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3 {{ $errors->has('waktu_estimasi') ? ' has-error' : '' }}">
              <label for="waktu_estimasi" class="form-label">Waktu Estimasi</label>

              <div>
                <input id="waktu_estimasi" maxlength="255" type="text" class="form-control " name="waktu_estimasi" value="{{ old('waktu_estimasi') }}" required autofocus autocomplete="off">

                @if ($errors->has('waktu_estimasi'))
                <span class="help-block">
                  <strong>{{ $errors->first('waktu_estimasi') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3 {{ $errors->has('keterangan_jasa') ? ' has-error' : '' }}">
              <label for="keterangan_jasa" class="form-label">Keterangan Jasa</label>

              <div>
                <input id="keterangan_jasa" maxlength="" type="text" class="form-control " name="keterangan_jasa" value="{{ old('keterangan_jasa') }}" required autofocus autocomplete="off">

                @if ($errors->has('keterangan_jasa'))
                <span class="help-block">
                  <strong>{{ $errors->first('keterangan_jasa') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3">
                  <div class="col-md-offset-4">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check"></i>
                      Simpan
                    </button>
                    <a href="{{ route('jasa.index') }}" class="btn btn-success"><i class="bi bi-arrow-left"></i> Batal</a>
                  </div>
                </div>
              </form>
            </div>
            @endsection
       