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
        <div class="col-4">
          <ul class="list-group">
            <li class="list-group-item active">Plan d'activité</li>
            <li class="list-group-item"> Année:@if($var['plan']->libelle_annee) {{$var['plan']->libelle_annee}} @endif</li>
            <li class="list-group-item"> Strategie nationale:@if($var['plan']->libelle_strategie) {{$var['plan']->libelle_strategie}} @endif</li>
            <li class="list-group-item">  Effet:@if($var['plan']->code_effet) {{$var['plan']->code_effet}}/ @if($var['plan']->libelle_effet) {{$var['plan']->libelle_effet}} @endif @endif</li>
            <li class="list-group-item"> Produit : @if($var['plan']->code_produit) {{$var['plan']->code_produit}} @endif / @if($var['plan']->libelle_produit) {{$var['plan']->libelle_produit}} @endif </li>
            <li class="list-group-item"> Activité : @if($var['plan']->code_activite) {{$var['plan']->code_activite}} @endif / @if($var['plan']->libelle_activite) {{$var['plan']->libelle_activite}} @endif </li>
            <li class="list-group-item"> @if($var['plan']->affectation_produit) <a type="button" href="{{route('sous_activite_meo.show',$var['plan']->affectation_produit)}}" class="btn btn-ligth text-info"><i class="fas fa-arrow-alt-circle-left"></i> Retour </a> @endif</li>
          </ul>
        </div>
        <div class="col-8">
          

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Mise en œvre sous activté</h3>
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
                  <td>T1</td>
                  <td>T2</td>
                  <td>T3</td>
                  <td>T4</td>
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
                    @if(boolval($row->T1))
                     <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked disabled>
                     </div>
                    @endif
                  </td>
                  <td>
                    @if(boolval($row->T2))
                     <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked disabled>
                     </div>
                    @endif
                  </td>
                  <td>
                    @if(boolval($row->T3))
                     <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked disabled>
                    </div>
                    @endif
                  </td>
                  <td>
                    @if(boolval($row->T4))
                      <div class="form-check">
                       <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked disabled>
                      </div>
                    @endif
                  </td>
                  <td>
                        <a href="{{route('realisation_sous_activite.show',$row->id)}}" data-toggle="tooltip" data-placement="top" title="Réalisation" class="btn btn-secondary btn-sm" ><i class="nav-icon fas fa-sliders-h"></i></a>

                        <a href="{{route('depense_sous_activite.show',$row->id)}}" data-toggle="tooltip" data-placement="top" title="Dépenses" class="btn btn-warning btn-sm" ><i class="nav-icon fas fa-coins"></i></a>
                  </td>
                </tr>
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