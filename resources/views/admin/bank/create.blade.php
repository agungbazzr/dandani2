@extends('layout-admin')


@section('title', 'Bank')
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
            <li><a href="{{url('bank')}}">Bank</a></li>
            <li class="current">Tambah Bank</li>
          </ol>
        </div>
      </nav>
    </div>

    <!-- Main content -->
    <div class="container" data-aos="fade-up">
     <br>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('bank.store') }}">
            {{ csrf_field() }}
            
            <div class="mb-3 {{ $errors->has('nama_bank') ? ' has-error' : '' }}">
              <label for="nama_bank" class="form-label">Nama Bank</label>

              <div>
                <input id="nama_bank" maxlength="255" type="text" class="form-control " name="nama_bank" value="{{ old('nama_bank') }}" required autofocus autocomplete="off">

                @if ($errors->has('nama_bank'))
                <span class="help-block">
                  <strong>{{ $errors->first('nama_bank') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3 {{ $errors->has('nama_pemilik') ? ' has-error' : '' }}">
              <label for="nama_pemilik" class="form-label">Nama Pemilik</label>

              <div>
                <input id="nama_pemilik" maxlength="255" type="text" class="form-control " name="nama_pemilik" value="{{ old('nama_pemilik') }}" required autofocus autocomplete="off">

                @if ($errors->has('nama_pemilik'))
                <span class="help-block">
                  <strong>{{ $errors->first('nama_pemilik') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3 {{ $errors->has('no_rekening') ? ' has-error' : '' }}">
              <label for="no_rekening" class="form-label">No Rekening</label>

              <div>
                <input id="no_rekening" maxlength="255" type="text" class="form-control " name="no_rekening" value="{{ old('no_rekening') }}" required autofocus autocomplete="off">

                @if ($errors->has('no_rekening'))
                <span class="help-block">
                  <strong>{{ $errors->first('no_rekening') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3 {{ $errors->has('status_bank') ? ' has-error' : '' }}">
              <label for="status_bank" class="form-label">Status Bank</label>

              <div>
                <input id="status_bank" maxlength="255" type="text" class="form-control " name="status_bank" value="{{ old('status_bank') }}" required autofocus autocomplete="off">

                @if ($errors->has('status_bank'))
                <span class="help-block">
                  <strong>{{ $errors->first('status_bank') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3 {{ $errors->has('content') ? ' has-error' : '' }}">
              <label for="content" class="form-label">Content</label>

              <div>
                <input id="content" maxlength="" type="text" class="form-control " name="content" value="{{ old('content') }}" required autofocus autocomplete="off">

                @if ($errors->has('content'))
                <span class="help-block">
                  <strong>{{ $errors->first('content') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="mb-3">
                  <div class="col-md-offset-4">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check"></i>
                      Simpan
                    </button>
                    <a href="{{ route('bank.index') }}" class="btn btn-success"><i class="bi bi-arrow-left"></i> Batal</a>
                  </div>
                </div>
              </form>
            </div>
            @endsection
       