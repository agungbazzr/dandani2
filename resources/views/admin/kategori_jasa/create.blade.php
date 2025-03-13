@extends('layout-admin')


@section('title', 'Kategori_jasa')
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
            <li><a href="{{url('kategori_jasa')}}">Kategori Jasa</a></li>
            <li class="current">Tambah Kategori Jasa</li>
          </ol>
        </div>
      </nav>
    </div>

    <!-- Main content -->
    <div class="container" data-aos="fade-up">
     <br>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('kategori_jasa.store') }}">
            {{ csrf_field() }}
            
            <div class="mb-3 {{ $errors->has('nama_kategori_jasa') ? ' has-error' : '' }}">
              <label for="nama_kategori_jasa" class="form-label">Nama Kategori Jasa</label>

              <div>
                <input id="nama_kategori_jasa" maxlength="255" type="text" class="form-control " name="nama_kategori_jasa" value="{{ old('nama_kategori_jasa') }}" required autofocus autocomplete="off">

                @if ($errors->has('nama_kategori_jasa'))
                <span class="help-block">
                  <strong>{{ $errors->first('nama_kategori_jasa') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3 {{ $errors->has('keterangan_kategori_jasa') ? ' has-error' : '' }}">
              <label for="keterangan_kategori_jasa" class="form-label">Keterangan Kategori Jasa</label>

              <div>
                <input id="keterangan_kategori_jasa" maxlength="" type="text" class="form-control " name="keterangan_kategori_jasa" value="{{ old('keterangan_kategori_jasa') }}" required autofocus autocomplete="off">

                @if ($errors->has('keterangan_kategori_jasa'))
                <span class="help-block">
                  <strong>{{ $errors->first('keterangan_kategori_jasa') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3">
                  <div class="col-md-offset-4">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check"></i>
                      Simpan
                    </button>
                    <a href="{{ route('kategori_jasa.index') }}" class="btn btn-success"><i class="bi bi-arrow-left"></i> Batal</a>
                  </div>
                </div>
              </form>
            </div>
            @endsection
       