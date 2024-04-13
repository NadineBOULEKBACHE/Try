@extends('welcome')
@section('title')
Liste des directions
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

    @include('layouts.navbar')

    @include('layouts.sidebar')

    @if ($errors->any())
    <div class="alert alert-danger" style="margin-left: 18.7%; margin-top:0.2%;">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    @if (session()->has('Add'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-left: 18.7%; margin-top:0.2%;">
      <strong>{{ session()->get('Add') }}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif

    @if (session()->has('delete'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-left: 18.7%; margin-top:0.2%;">
      <strong>{{ session()->get('delete') }}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif

    @if (session()->has('edit'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-left: 18.7%; margin-top:0.2%;">
      <strong>{{ session()->get('edit') }}</strong>
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
              <h1 class="m-0">Liste des directions</h1>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default" style="float: right;">
                Ajouter direction
              </button>
            </div><!-- /.col -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>nom</th>
                    <th>description</th>
                    <th></th>

                  </tr>
                </thead>

                <tbody>
                  <?php $i = 0     ?>
                  @foreach($directions as $x)
                  <?php $i++ ?>
                  <tr>
                    <td>{{$i}}</td>
                    <td>{{$x->nom}}</td>
                    <td>{{$x->description}}</td>
                    <td>

                      <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale" data-id="{{ $x->id }}" data-nom="{{ $x->nom }}" data-description="{{ $x->description }}" data-toggle="modal" href="#exampleModal2"><i class="las la-pen">Modifier</i></a>



                      <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale" data-id="{{ $x->id }}" data-nom="{{ $x->nom }}" data-toggle="modal" href="#modaldemo8"><i class="las la-trash">Supprimer</i></a>

                    </td>

                  </tr>
                  @endforeach
                </tbody>

              </table>
            </div>

          </div>

          <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Ajout direction</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('directions.store') }}" method="post" autocomplete="off">
                    {{ csrf_field() }}

                    <div class="form-group">
                      <label for="exampleInputEmail1">Nom direction</label>
                      <input type="text" class="form-control" id="section_name" name="nom">
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Description</label>
                      <input type="text" class="form-control" id="description" name="description"></input>
                    </div>

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success">Confirmer</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                  </form>
                </div>

              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->


          </div>
          <!-- /.modal -->






        </div>
        <!-- edit -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier direction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form action="directions/update" method="post" autocomplete="off">
                  {{ method_field('patch') }}
                  {{ csrf_field() }}
                  <div class="form-group">
                    <input type="hidden" name="id" id="id" value="">
                    <label for="recipient-name" class="col-form-label">Nom direction:</label>
                    <input class="form-control" name="nom" id="nom" type="text">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Description:</label>
                    <input type="text" class="form-control" id="description" name="description"></input>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Confirmer</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <!-- delete -->
        <div class="modal" id="modaldemo8">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
              <div class="modal-header">
                <h6 class="modal-title">Supprimer direction</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
              </div>
              <form action="directions/destroy" method="post">
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <div class="modal-body">
                  <p>Etes-vous sûr de vouloir supprimer cette direction ?</p><br>
                  <input type="hidden" name="id" id="id" value="">
                  <input class="form-control" name="nom" id="nom" type="text" readonly>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                  <button type="submit" class="btn btn-danger">Confirmer</button>
                </div>
            </div>
            </form>
          </div>
        </div>




        <!-- /.row -->
      </div><!-- /.container-fluid -->




    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



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
  <script>
    $('#exampleModal2').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget)
      var id = button.data('id')
      var nom = button.data('nom')
      var description = button.data('description')
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #nom').val(nom);
      modal.find('.modal-body #description').val(description);
    })
  </script>
  <script>
    $('#modaldemo8').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget)
      var id = button.data('id')
      var nom = button.data('nom')
      var modal = $(this)
      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #nom').val(nom);
    })
  </script>
</body>

</html>