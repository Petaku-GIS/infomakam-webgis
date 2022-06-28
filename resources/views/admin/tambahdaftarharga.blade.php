@extends('admin/template')

@section('content')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Masukkan data</h1>
                <form action="{{url('admin/daftar-harga/tambah')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan data nama" style="width: 25%" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Masukkan data deskripsi" style="width: 25%" required>
                    </div>
                    <div class="form-group">
                        <label for="ketersediaan">Ketersediaan</label>
                        <input type="number" class="form-control" id="ketersediaan" name="ketersediaan" placeholder="Masukkan jumlah ketersediaan" style="width: 25%" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan harga" style="width: 25%" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Lokasi makam</label><br>
                        <select class="custom-select my-1 mr-sm-2" name="makam_id" id="inlineFormCustomSelectPref" style="width: 25%" required>
                            <option selected hidden>Pilih lokasi makam</option>
                            @foreach ($makam as $item)
                                <option value="{{$item->id}}">{{$item->nama_makam}}</option>
                            @endforeach
                          </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; InfoMakam 2022</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
@endsection