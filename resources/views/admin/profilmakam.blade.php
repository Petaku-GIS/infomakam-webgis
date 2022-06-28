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
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Profil makam</h1>
                    <a href="{{url('admin/profil-makam/tambah')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-upload fa-sm text-white-50"></i> Tambah lahan makam</a>
                </div>
                <div class="card-columns">
                    @foreach ($makam as $makam)
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{$makam->photos}}" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title">{{$makam->nama_makam}}</h5>
                            <p class="card-text">{{$makam->description}}</p>
                            <a href="{{url('admin/daftar-harga/edit/'.$makam->id)}}" class="btn btn-primary">Ubah</a>
                            <a data-toggle="modal" data-target="#deleteModal{{$makam->id}}" class="btn btn-danger">Hapus</a>
                            </div>
                        </div>
                        <!-- Delete Modal-->
                        <div class="modal fade" id="deleteModal{{$makam->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <form action="{{url('admin/profil-makam/delete/'.$makam->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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