@extends('layout.dashroad')
 @section("content")
    <!-- Main content -->
    <section class="content center">
	 @if(Session::has('alert'))
		<div class="alert {{ session()->get('alert')[1] }} container" id="alert" role="alert">
					{{ session()->get('alert')[0] }}
		</div>
	 @endif
      <div class="row">
        @include('plan.add')
        <div class="col-12">
          

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Plans d'activité</h3>
              <button  class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addModule">Ajouter <i class="nav-icon fa fa-plus"></i></button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <td>Année</td>
                  <td>Stratégie</td>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                <tr>
                  <td>{{$row->libelle_annee}}</td>
                  <td>{{$row->libelle_strategie}}</td>
                  <td>

                        <a href="{{route('affectation_effet.show',$row->id)}}" data-toggle="tooltip" data-placement="top" title="Effets" class="btn btn-warning btn-sm" ><i class="nav-icon fas fa-compress-arrows-alt"></i></a>

                        <button type="button"  class="btn btn-info btn-sm" data-toggle="modal" data-target="#updateModule{{$row->id}}"> <i class="nav-icon fa fa-pen"></i></button>
                          
                        <button type="button"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#supprimer{{$row->id}}"> <i class="nav-icon fa fa-trash"></i></button>
                  </td>
                </tr>
				          @include('plan.update')
                  @include('plan.delete')
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