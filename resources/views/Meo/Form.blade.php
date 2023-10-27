@extends('layout.dashroad')
 @section("content")
<section class="content">
      <form class="container-fluid" action="{{route('meo.store')}}" method="POST">
        @csrf
        <div class="row h-100 justify-content-center align-items-center">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Recherche</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Plan *</label>
                    <select class="form-control" name="plan" id="getEffet" required>
                      <option></option>
                      @foreach($var['plan'] as $plan)
                        <option value="{{$plan->id}}">{{$plan->libelle_annee}} {{$plan->libelle_strategie}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="exampleInputPassword1">Effet *</label>
                      <select name="effet" class="custom-select" id="getProduit" required>
                        
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputPassword1" >Produit *</label>
                      <select name="produit" class="custom-select" id="ListProduit" required>
                        <option></option>
                      </select>
                    </div>

                  </div>
                  
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Rechercher</button>
                </div>
            </div>
            <!-- /.card -->

          </div>
        </div>
        <!-- /.row -->
</form><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection