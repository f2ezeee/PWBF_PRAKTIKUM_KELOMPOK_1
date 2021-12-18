@extends('layouts.dashboard')

@section('container')

<div class="pagetitle">
    <h1>Data Santri</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item">Santri</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">

            @if (session()->has('success'))
            <div class="alert alert-success mt-2" role="alert">
              {{ session('success') }}
            </div>            
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger mt-2" role="alert">
              {{ session('error') }}
            </div>            
            @endif

            <a role="button" class="btn btn-primary mt-3 mb-1" data-bs-toggle="modal" 
            data-bs-target="#tambahSantriModal" >Tambah Data</a> 

            <!-- Table with stripped rows -->
            <table class="table" id="tablesantri">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Santri</th>
                  <th scope="col">Jenis Kelamin</th>
                  <th scope="col">Tanggal Lahir</th>
                  <th scope="col">Kota</th>
                  <th scope="col">Nama Walisiswa</th>
                  <th scope="col">Alamat Walisiswa</th>
                  <th scope="col">No Handphone</th>
                  <th scope="col">Email</th>
                  <th scope="col">Tanggal Masuk</th>
                  <th scope="col">Status</th>
                  <th scope="col" colspan="2">Action</th>
                </tr>
              </thead>

              <tbody>

                  @foreach ($santri as $item)
                  
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->namasantri }}</td>
                    <td>{{ $item->gender }}</td>
                    <td>{{ $item->tanggallhr }}</td>
                    <td>{{ $item->kotalhr }}</td>
                    <td>{{ $item->namaortu }}</td>
                    <td>{{ $item->alamatortu }}</td>
                    <td>{{ $item->hp }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->tanggalmasuk }}</td>
                    <td>{{ $item->aktif }}</td>

                    <td>
                      <a role="button" class="btn btn-success updateBtn" data-bs-toggle="modal" 
                      data-bs-target="#updateSantriModal" data-id={{ $item->idsantri }}>
                        Update
                      </a>
                    </td>
                    <td>
                      <a role="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSantriModal" 
                      data-id={{ $item->idbab }} data-nama="{{ $item->judul }}">
                        Delete
                      </a>
                    </td>
                    

                  </tr>
                  
                  @endforeach

                
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>


{{-- Modal Tambah Santri --}}
<div class="modal fade" id="tambahSantriModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: #6ab04c">Tambah Data Santri</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" id="formUpdate" action="santri/create" method="post">
          @csrf
          
          <div class="col-12">
            <label for="yourName" class="form-label">Nama Santri</label>
            <input type="text" name="namasantri" class="form-control" id="" required>
            <div class="invalid-feedback">Silahkan input nama santri</div>
          </div>
      
          <div class="col-12">
            <label for="yourEmail" class="form-label">Email Santri</label>
            <input type="email" name="email" class="form-control" id="" required>
            <div class="invalid-feedback">Silahkan input email santri</div>
          </div>
          
          {{-- jenis kelamin --}}
          <div class="col-12">
            <label for="yourUsername" class="form-label">Jenis Kelamin</label>
          <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="" value="M">
              <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="" value="F">
              <label class="form-check-label" for="inlineRadio2">Perempuan</label>
            </div>
          </div>
          
          <div class="col-12">
            <label for="yourUsername" class="form-label">Tanggal Lahir</label>
            <div class="input-group has-validation">
              <input type="date" name="tanggallhr" class="form-control" id="" required>
              <div class="invalid-feedback">Silahkan input tanggal lahir santri</div>
            </div>
          </div>
          
          <div class="col-12">
            <label for="yourUsername" class="form-label">Kota Lahir</label>
            <div class="input-group has-validation">
              <input type="text" name="kotalhr" class="form-control" id="" required>
              <div class="invalid-feedback">Silahkan input kota lahir santri</div>
            </div>
          </div>
      
          <div class="col-12">
            <label for="yourPassword" class="form-label">No Handphone</label>
            <input type="text" name="hp" class="form-control" id="" required>
            <div class="invalid-feedback">Silahkan input nomor handphone santri</div>
          </div>
      
          <div class="col-12">
            <label for="yourUsername" class="form-label">Tanggal Masuk</label>
            <div class="input-group has-validation">
              <input type="date" name="tanggalmasuk" class="form-control" id="" required>
              <div class="invalid-feedback">Silahkan input tanggal masuk santri</div>
            </div>
          </div>
      
          <div class="col-12">
            <label for="yourPassword" class="form-label">Nama Orang Tua</label>
            <input type="text" name="namaortu" class="form-control" id="" required>
            <div class="invalid-feedback">Silahkan input nama orang tua santri</div>
          </div>
      
          <div class="col-12">
          <label for="yourPassword" class="form-label">Alamat Orang Tua</label>
          <input type="text" name="alamatortu" class="form-control" id="" required>
            <div class="invalid-feedback">Silahkan input alamat orang tua santri</div>
          </div>
          
          <div class="col-12">
          <label for="yourPassword" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="" required>
            <div class="invalid-feedback">Silahkan input password santri</div>
          </div>
          
          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="acceptTerms" required>
              <label class="form-check-label" for="acceptTerms">Apakah anda yakin akan menambahkan data?</label>
              <div class="invalid-feedback">Silahkan klik kolom persetujuan terlebih dahulu</div>
            </div>
          </div>
          <div class="col-12">
            <button class="btn btn-primary w-100" type="submit">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


{{-- Modal Update Santri --}}
<div class="modal fade" id="updateSantriModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: #6ab04c">Update Data Santri</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" id="formUpdate" action="santri/update/id" method="post">
          @csrf
          <div class="col-12">
            <label for="yourName" class="form-label">Nama Santri</label>
            <input type="text" name="namasantri" class="form-control" id="nama" required>
            <div class="invalid-feedback">Silahkan input nama santri</div>
          </div>
      
          <div class="col-12">
            <label for="yourEmail" class="form-label">Email Santri</label>
            <input type="email" name="email" class="form-control" id="email" required>
            <div class="invalid-feedback">Silahkan input email santri</div>
          </div>
          
          {{-- jenis kelamin --}}
          <div class="col-12">
            <label for="yourUsername" class="form-label">Jenis Kelamin</label>
          <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="lakilaki" value="M">
              <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="perempuan" value="F">
              <label class="form-check-label" for="inlineRadio2">Perempuan</label>
            </div>
          </div>
          
          <div class="col-12">
            <label for="yourUsername" class="form-label">Tanggal Lahir</label>
            <div class="input-group has-validation">
              <input type="date" name="tanggallhr" class="form-control" id="tanggallahir" required>
              <div class="invalid-feedback">Silahkan input tanggal lahir santri</div>
            </div>
          </div>
          
          <div class="col-12">
            <label for="yourUsername" class="form-label">Kota Lahir</label>
            <div class="input-group has-validation">
              <input type="text" name="kotalhr" class="form-control" id="kota" required>
              <div class="invalid-feedback">Silahkan input kota lahir santri</div>
            </div>
          </div>
      
          <div class="col-12">
            <label for="yourPassword" class="form-label">No Handphone</label>
            <input type="text" name="hp" class="form-control" id="nohp" required>
            <div class="invalid-feedback">Silahkan input nomor handphone santri</div>
          </div>
      
          <div class="col-12">
            <label for="yourUsername" class="form-label">Tanggal Masuk</label>
            <div class="input-group has-validation">
              <input type="date" name="tanggalmasuk" class="form-control" id="tglmasuk" required>
              <div class="invalid-feedback">Silahkan input tanggal masuk santri</div>
            </div>
          </div>
      
          <div class="col-12">
            <label for="yourPassword" class="form-label">Nama Orang Tua</label>
            <input type="text" name="namaortu" class="form-control" id="namaortu" required>
            <div class="invalid-feedback">Silahkan input nama orang tua santri</div>
          </div>
      
          <div class="col-12">
          <label for="yourPassword" class="form-label">Alamat Orang Tua</label>
          <input type="text" name="alamatortu" class="form-control" id="alamatortu" required>
            <div class="invalid-feedback">Silahkan input alamat orang tua santri</div>
          </div>
          
          <div class="col-12">
          <label for="yourPassword" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="password" required>
            <div class="invalid-feedback">Silahkan input password santri</div>
          </div>
          
          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="acceptTerms" required>
              <label class="form-check-label" for="acceptTerms">Apakah anda yakin akan menyimpan perubahan?</label>
              <div class="invalid-feedback">Silahkan klik kolom persetujuan terlebih dahulu</div>
            </div>
          </div>
          <div class="col-12">
            <button class="btn btn-primary w-100" type="submit">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Modal Delete Santri --}}
<div class="modal fade" id="deleteSantriModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation Dialog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin untuk menghapus data santri? <b><span></span></b> 
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-danger" href="">Delete</a>
        {{-- <button type="button" class="btn btn-danger" onclick="window.location.href='/logout'">Delete</button> --}}
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
    
@endsection

@section('customscript')
    @parent
    <script>
      const dataTable = new simpleDatatables.DataTable("#tablesantri", {
	    searchable: true,
    	fixedHeight: false,
      })
    </script>
@endsection