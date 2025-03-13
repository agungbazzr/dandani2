
@extends('layout-admin')
@section('content')
   <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">
    <div class="page-title">
      
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{url('bank')}}">Layanan</a></li>
            <li class="current">Bank</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->
     
      <div class="container" data-aos="fade-up">
         <!-- Section Title -->
      <div class="container section-title mt-5" data-aos="fade-up">
        <h2>Bank Layanan</h2>
        <p>Layanan Tersedia Dandani.id</p>
      </div><!-- End Section Title -->
      <div class="row">
        <div class="col-md-9">
          <a class="btn btn-primary mb-5" href="{{route('bank.create')}}"><i class="bi bi-plus"></i> Tambah</a>
        </div>
        <div class="col-md-3">
          <div class="search-widget widget-item">
            <form action="{{route('bank.index')}}" method="GET">
              <input required type="text" name="query" value="<?php if(isset($_GET['query'])) echo $_GET['query']; ?>">
              <button type="submit"  title="Search"><i class="bi bi-search"></i></button>
            </form>
          </div>
        </div>
      </div>
      
          <div class="table-responsive">
            <table id="tbl_data" class="table" style="width:100%">
            <thead>
              <tr>
                <th class="text-center">No.</th>
                
								<th class="text-center">Id</th>
								<th class="text-center">Nama Bank</th>
								<th class="text-center">Nama Pemilik</th>
								<th class="text-center">No Rekening</th>
								<th class="text-center">Status Bank</th>
								<th class="text-center">Content</th>
                <th class="text-center">Action</th>

              </tr>
            </thead>
            <tbody>
              @foreach($bank as $data )
              <tr>
                <td class="text-center">{{ ($bank->perPage() * ($bank->currentPage() - 1)) + $loop->iteration }}</td>
                
								<td class="text-center">{{ $data->id }}</td>
								<td class="text-center">{{ $data->nama_bank }}</td>
								<td class="text-center">{{ $data->nama_pemilik }}</td>
								<td class="text-center">{{ $data->no_rekening }}</td>
								<td class="text-center">{{ $data->status_bank }}</td>
								<td class="text-center">{{ $data->content }}</td>
                <td class="text-center">
                  <a href="{{ url('bank/destroy')}}/{{ $data->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="bi bi-trash"></i> Hapus</a> |
                  <a href="{{ url('bank/edit')}}/{{ $data->id }}" class="btn btn-success"><i class="bi bi-pencil"></i> Edit</a>
                </td>
              </tr>
              @endforeach
            </tbody>
            </table>
            {{ $bank->links() }}

          </div>
        </div>
      </div>
    </section><!-- /Starter Section Section -->
    <section id="starter-section" class="starter-section section">
    </section><!-- /Starter Section Section -->
      
@endsection
