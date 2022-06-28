@extends('admin/template')
@section('content')

    @if (session('success'))
        <script>
            Swal.fire(
                'Berhasil!',
                '{{ session("success") }}',
                'success'
            )
        </script>
    @endif
    
    @if (session('error'))
        <script>
            Swal.fire(
                'Gagal!',
                '{{ session("error") }}',
                'error'
            )
        </script>
    @endif

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
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Daftar harga</h1>
                    <a href="{{url('admin/daftar-harga/tambah')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-upload fa-sm text-white-50"></i> Tambah data</a>
                </div>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Ketersediaan</th>
                                        <th>Harga</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($daftarHarga as $daftarHarga)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$daftarHarga->name}}</td>
                                            <td>{{$daftarHarga->description}}</td>
                                            <td>{{$daftarHarga->ketersediaan}}</td>
                                            <td>{{$daftarHarga->harga}}</td>
                                            <td>
                                                <a href="{{url('admin/daftar-harga/edit/'.$daftarHarga->id)}}" class="btn btn-primary">Edit</a>
                                                <a data-toggle="modal" data-target="#deleteModal{{$daftarHarga->id}}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        <!-- Delete Modal-->
                                        <div class="modal fade" id="deleteModal{{$daftarHarga->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Apakah anda yakin ingin menghapus data ini ?</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                        <form action="{{url('admin/daftar-harga/delete/'.$daftarHarga->id)}}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

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

                

            