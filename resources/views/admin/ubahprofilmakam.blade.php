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
                <form action="{{url('admin/profil-makam/edit')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="text" name="id" value="{{$makam->id}}" hidden>
                    <div class="form-group">
                        <label for="name">Nama lahan pemakaman</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan data nama" style="width: 25%" required value="{{$makam->name}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Masukkan data deskripsi" style="width: 25%" required value="{{$makam->description}}">
                    </div>
                    <div class="form-group">
                        <label for="ketersediaan">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan data alamat" style="width: 25%" required value="{{$makam->alamat}}">
                    </div>
                    <div class="form-group">
                        <label for="harga">Nomor Whatsapp</label>
                        <input type="text" class="form-control" id="whatsapp_contact" name="whatsapp_contact" placeholder="Masukkan nomor whatsapp" style="width: 25%" required value="{{$makam->whatsapp_contact}}">
                    </div>
                    <div class="form-group">
                        <label for="harga">Nomor HP</label>
                        <input type="number" class="form-control" id="phone_contact" name="phone_contact" placeholder="Masukkan nomor HP" style="width: 25%" value="{{$makam->whatsapp_contact}}">
                    </div>
                    <div class="form-group">
                        <label for="harga">Photo</label>
                        <input type="file" accept="image/png, image/gif, image/jpeg" class="form-control-file" id="photos" name="photos" style="width: 25%">
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
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