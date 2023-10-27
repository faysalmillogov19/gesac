<div class="modal fade" id="addModule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Affectation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="modal-body" method="POST" action="{{route('affectation_produit.store')}}">
                @csrf
                  
                  @if($var['plan']) <input type="hidden" name='affectation_effet' value="{{$var['plan']->id}}" required> @endif

                  <div class="form-group">
                    <label for="exampleInputPassword1">Produit *</label>
                    <select class="form-control" name="produit" required>
                        <option disabled></option>
                        @foreach($var['produits'] as $pr)
                            <option value="{{$pr->id}}">{{$pr->libelle}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregister</button>
                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
                  </div>
            </form>
            
        </div>
    </div>
</div>