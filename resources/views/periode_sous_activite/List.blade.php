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
        @include('periode_sous_activite.add')
        <div class="col-4">
          <ul class="list-group">
            <li class="list-group-item active">Plan d'activité</li>
            <li class="list-group-item"> Année:@if($var['plan']->libelle_annee) {{$var['plan']->libelle_annee}} @endif</li>
            <li class="list-group-item"> Strategie nationale:@if($var['plan']->libelle_strategie) {{$var['plan']->libelle_strategie}} @endif</li>
            <li class="list-group-item">  Effet:@if($var['plan']->code_effet) {{$var['plan']->code_effet}}/ @if($var['plan']->libelle_effet) {{$var['plan']->libelle_effet}} @endif @endif</li>
            <li class="list-group-item"> Produit : @if($var['plan']->code_produit) {{$var['plan']->code_produit}} @endif / @if($var['plan']->libelle_produit) {{$var['plan']->libelle_produit}} @endif </li>
            <li class="list-group-item"> Activité : @if($var['plan']->code_activite) {{$var['plan']->code_activite}} @endif / @if($var['plan']->libelle_activite) {{$var['plan']->libelle_activite}} @endif </li>
            
            <li class="list-group-item"> Sous activité : @if($var['plan']->code_sous_activite) {{$var['plan']->code_sous_activite}} @endif / @if($var['plan']->libelle_sous_activite) {{$var['plan']->libelle_sous_activite}} @endif </li>
            <li class="list-group-item"> @if($var['plan']->affectation_activite) <a type="button" href="{{route('sous_activite.show',$var['plan']->affectation_activite)}}" class="btn btn-ligth text-info"><i class="fas fa-arrow-alt-circle-left"></i> Revenir à la sous ativité </a> @endif</li>
          </ul>
        </div>
        <div class="col-8">
          

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Périodes sous activité</h3>
              <button  class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addModule">Ajouter <i class="nav-icon fa fa-plus"></i></button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <td>Début</td>
                  <td>Fin</td>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                <tr>
                  <td>{{date('d/M/Y', strtotime($row->debut))}}</td>
                  <td>{{date('d/M/Y', strtotime($row->fin))}}</td>
                  <td>
                        
                        <button type="button"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#supprimer{{$row->id}}"> <i class="nav-icon fa fa-trash"></i></button>
                  </td>
                </tr>
				  
                  @include('periode_sous_activite.delete')
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