@extends('layouts.dashboard')

@section('container')


<div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Datatables</h5>
            <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">Bab</th>
                  <th scope="col">Judul</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>

              <tbody>

                  {{-- @foreach ($bab as $item)
                  
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->bab }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->keterangan }}</td>
                  </tr>
                  
                  @endforeach --}}
                  
                  <tr>
                    <th scope="row">1</th>  
                    <td>Lorem ipsum dolor sit.</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, similique magni sit nostrum distinctio neque maxime expedita fugit ratione, dicta consectetur architecto inventore, veritatis exercitationem quis cum iure quae a!</td>
                    <td>
                      <a href="#">
                        <i class="bi bi-pencil-square"></i>
                      </a>
                      <a href="#">
                        <i class="bi bi-x-square"></i>
                      </a>
                    </td>
                  </tr>
                
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>


@endsection