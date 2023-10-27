<div class="modal fade" id="updateModule{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$row->id}}" aria-hidden="true">
<div class="modal-dialog" role="document" >
<div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Réalisation sous activité</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="modal-body" method="POST" action="{{route('realisation_sous_activite.store')}}">
                @csrf
                  
                  @if($row->id) <input type="hidden" name='id' value="{{$row->id}}" required> @endif

                  @if($var['plan']) <input type="hidden" name='sous_activite' value="{{$var['plan']->id}}" required> @endif

                  <div class="form-group">
                    <label for="exampleInputPassword1">Libelle </label>
                    <input type="text" class="form-control" name="libelle" @if($row->libelle) value="{{$row->libelle}}" @endif  id="exampleInputPassword1" placeholder="Libéllé" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Début *</label>
                    <input type="date" class="form-control" name="debut" @if($row->debut) value="{{$row->debut}}" @endif id="exampleInputPassword1" placeholder="Début" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Fin *</label>
                    <input type="date" class="form-control" name="fin" @if($row->fin) value="{{$row->fin}}" @endif id="exampleInputPassword1" placeholder="Fin" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Taux (en %) *</label>
                    <input type="number" class="form-control" name="taux" @if($row->taux) value="{{$row->taux}}" @endif id="exampleInputPassword1" placeholder="Taux" required>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregister</button>
                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
                  </div>
            </form>
            
        </div>
    </div>
</div>