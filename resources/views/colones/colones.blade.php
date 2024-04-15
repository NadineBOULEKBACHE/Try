@extends('welcome')
@section('title')
Liste des Colones
@stop

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <title>AdminLTE 3 | Starter</title> -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    @include('layouts.navbar')
    <!-- /.navbar -->

    @include('layouts.sidebar')

    @if (session()->has('Add'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-left: 18.7%; margin-top:0.2%;">
      <strong>{{ session()->get('Add') }}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Liste des Colones</h1>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="float: right;">
                Ajouter Colone
              </button>
            </div><!-- /.col -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Libelle Colone</th>
                    <th>Libelle rayon</th>
                    <th></th>
                  </tr>
                </thead>

                <tbody>
                  <?php $i = 0; ?>
                  @foreach($colones as $Colone)
                  <?php $i++; ?>
                  <tr>
                    <td>{{$i}}</td>
                    <td>{{$Colone->Colone_libelle}}</td>
                    <td>{{$Colone->rayon->libelle}}</td>
                    <td>

                      <button class="modal-effect btn btn-sm btn-info" data-libelle="{{ $Colone->Colone_libelle }}" data-pro_id="{{ $Colone->id }}" data-section_libelle="{{ $Colone->rayon->Colone_libelle }}" data-target="#edit_Product">Modifier</button>



                      <button class="modal-effect btn btn-sm btn-danger " data-pro_id="{{ $Colone->id }}" data-product_libelle="{{ $Colone->Colone_libelle }}" data-toggle="modal" data-target="#modaldemo9">Supprimer</button>

                    </td>
                  </tr>

                  @endforeach
                </tbody>

              </table>
            </div>

          </div>
        </div>
        <!-- /.row -->

        <!-- add -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajout colone</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{ route('colones.store') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Libelle colone</label>
                    <input type="text" class="form-control" id="Colone_libelle" name="Colone_libelle" required>
                  </div>

                  <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Rayon</label>
                  <select name="rayons_id" id="rayons_id" class="form-control" required>
                    <option value="" selected disabled> -- sélectionner rayon --</option>
                    @foreach ($rayons as $rayons)
                    <option value="{{ $rayons->id }}">{{ $rayons->libelle }}</option>
                    @endforeach
                  </select>


                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Confirmer</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- edit -->
        <div class="modal fade" id="edit_Product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier rayon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action='/update' method="post">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                <div class="modal-body">

                  <div class="form-group">
                    <label for="title">Libelle colone:</label>

                    <input type="hidden" class="form-control" name="pro_id" id="pro_id" value="">

                    <input type="text" class="form-control" name="Colone_libelle" id="Colone_libelle">
                  </div>


                </div>


            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Modifier</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
            </form>
          </div>
        </div>
      </div>


    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('layouts.footer')
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../../plugins/jszip/jszip.min.js"></script>
  <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
  <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
  <!-- Page specific script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>

</html>