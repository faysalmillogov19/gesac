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
        @include('affectation_produit.add')
        <div class="col-4">
          <ul class="list-group">
            <li class="list-group-item active">Plan d'activité</li>
            <li class="list-group-item">Année:@if($var['plan']->libelle_annee) {{$var['plan']->libelle_annee}} @endif</li>
            <li class="list-group-item">Strategie nationale:@if($var['plan']->libelle_strategie) {{$var['plan']->libelle_strategie}} @endif</li>
            <li class="list-group-item">Effet: @if($var['plan']->code_effet) {{$var['plan']->code_effet}} @endif / @if($var['plan']->libelle_effet) {{$var['plan']->libelle_effet}} @endif</li>
            <li class="list-group-item"> @if($var['plan']->plan) <a type="button" href="{{route('affectation_effet.show',$var['plan']->plan)}}" class="btn btn-ligth text-info"><i class="fas fa-arrow-alt-circle-left"></i> Revenir aux effets </a> @endif</li>
          </ul>
        </div>
        <div class="col-8">
          

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Affectation Produit</h3>
              <button  class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addModule">Ajouter <i class="nav-icon fa fa-plus"></i></button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <td>Code</td>
                  <td>Libelle</td>
                  <td>Description</td>
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
                        <a href="{{route('affectation_activite.show',$row->id)}}" data-toggle="tooltip" data-placement="top" title="Activité" class="btn btn-warning btn-sm" ><i class="nav-icon fas fa-clipboard-list"></i></a>

                        <button type="button"  class="btn btn-info btn-sm" data-toggle="modal" data-target="#updateModule{{$row->id}}" data-toggle="tooltip" data-placement="top" title="Modifier"> <i class="nav-icon fa fa-pen"></i></button>

                        <button type="button"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#supprimer{{$row->id}}" data-toggle="tooltip" data-placement="top" title="Supprimer"> <i class="nav-icon fa fa-trash"></i></button>
                  </td>
                </tr>
				          @include('affectation_produit.update')
                  @include('affectation_produit.delete')
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