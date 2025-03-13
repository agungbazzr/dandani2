
@extends('layout-admin')
@section('content')
   <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">
    <div class="page-title">
      
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{url('pelanggan')}}">Layanan</a></li>
            <li class="current">Pelanggan</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->
     
      <div class="container" data-aos="fade-up">
         <!-- Section Title -->
      <div class="container section-title mt-5" data-aos="fade-up">
        <h2>Pelanggan Layanan</h2>
        <p>Layanan Tersedia Dandani.id</p>
      </div><!-- End Section Title -->
      <div class="row">
        <div class="col-md-9">
          <a class="btn btn-primary mb-5" href="{{route('pelanggan.create')}}"><i class="bi bi-plus"></i> Tambah</a>
        </div>
        <div class="col-md-3">
          <div class="search-widget widget-item">
            <form action="{{route('pelanggan.index')}}" method="GET">
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
                
								<th class="">Nama Pelanggan</th>
								<th class="text-center">Username</th>
								<th class="text-center">Email</th>
                <th class="text-center">Action</th>

              </tr>
            </thead>
            <tbody>
              @foreach($pelanggan as $data )
              <tr>
                <td class="text-center">{{ ($pelanggan->perPage() * ($pelanggan->currentPage() - 1)) + $loop->iteration }}</td>
                
								<td>{{ $data->name }}</td>
								<td>{{ $data->username }}</td>
								<td>{{ $data->email }}</td>
                <td class="text-center">
                 
                  <a href="{{ url('pelanggan/edit')}}/{{ $data->id }}" class="btn btn-success"><i class="bi bi-eye"></i> View</a>
                </td>
              </tr>
              @endforeach
            </tbody>
            </table>
            {{ $pelanggan->links() }}

          </div>
        </div>
      </div>
    </section><!-- /Starter Section Section -->
    <section id="starter-section" class="starter-section section">
    </section><!-- /Starter Section Section -->
      
@endsection
