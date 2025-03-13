
@extends('layout-admin')
@section('content')
   <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">
    <div class="page-title">
      
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{url('jasa')}}">Layanan</a></li>
            <li class="current">Jasa</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->
     
      <div class="container" data-aos="fade-up">
         <!-- Section Title -->
      <div class="container section-title mt-5" data-aos="fade-up">
        <h2>Jasa Layanan</h2>
        <p>Layanan Tersedia Dandani.id</p>
      </div><!-- End Section Title -->
      <div class="row">
        <div class="col-md-9">
          <a class="btn btn-primary mb-5" href="{{route('jasa.create')}}"><i class="bi bi-plus"></i> Tambah</a> <a class="btn btn-primary mb-5" href="{{route('kategori_jasa.create')}}"><i class="bi bi-plus"></i> Tambah Kategori Jasa</a>
        </div>
        <div class="col-md-3">
          <div class="search-widget widget-item">
            <form action="{{route('jasa.index')}}" method="GET">
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
                
								<th class="text-center">Nama Jasa</th>
								<th class="text-center">Jenis Jasa</th>
								<th class="text-center">Harga Jasa</th>
								<th class="text-center">Waktu Estimasi</th>
								<th class="text-center">Keterangan Jasa</th>
                <th class="text-center">Action</th>

              </tr>
            </thead>
            <tbody>
              @foreach($jasa as $data )
              <tr>
                <td class="text-center">{{ ($jasa->perPage() * ($jasa->currentPage() - 1)) + $loop->iteration }}</td>
                
								<td class="">{{ $data->nama_jasa }}</td>
								<td class="">{{ $data->jenis_jasa }}</td>
								<td class="text-center">{{ number_format($data->harga_jasa,0) }}</td>
								<td class="text-center">{{ $data->waktu_estimasi }}</td>
								<td class="">{{ $data->keterangan_jasa }}</td>
                <td class="text-center">
                  <a href="{{ url('jasa/destroy')}}/{{ $data->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="bi bi-trash"></i> Hapus</a> |
                  <a href="{{ url('jasa/edit')}}/{{ $data->id }}" class="btn btn-success"><i class="bi bi-pencil"></i> Edit</a>
                </td>
              </tr>
              @endforeach
            </tbody>
            </table>
            {{ $jasa->links() }}

          </div>
        </div>
      </div>
    </section><!-- /Starter Section Section -->
    <section id="starter-section" class="starter-section section">
    </section><!-- /Starter Section Section -->
      
@endsection
