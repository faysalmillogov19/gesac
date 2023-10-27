@extends('layout.dashroad')
 @section("content")
    <!-- Main content -->
    <section class="content center">
	 @if(Session::has('alert'))
		<div class="alert alert-success container" id="alert" role="alert">
					{{ session()->get('alert') }}
		</div>
	 @endif
      <div class="row">
        @include('activites.add')
        <div class="col-12">
          

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Activités</h3>
              <button  class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addModule">Ajouter <i class="nav-icon fa fa-plus"></i></button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <td>Code</td>
                  <td>Libelle</td>
                  <td>description</td>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                <tr>
                  <td>{{$row->code}}</td>
                  <td>{{$row->libelle}}</td>
                  <td>{{$row->description}}</td>
                  <td>
                        
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#updateModule{{$row->id}}" data-toggle="tooltip" data-placement="top" title="Modifier"><i class="nav-icon fa fa-pen"></i></button>
                        <button type="button"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#supprimer{{$row->id}}" data-toggle="tooltip" data-placement="top" title="Supprimer"> <i class="nav-icon fa fa-trash"></i></button>
                  </td>
                  @include('activites.update')
                </tr>
				  
                  @include('activites.delete')
                @endforeach
                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    @endsection