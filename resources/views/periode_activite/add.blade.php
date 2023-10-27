<div class="modal fade" id="addModule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Périodes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="modal-body" method="POST" action="{{route('periode_activite.store')}}">
                @csrf
                  
                  @if($var['plan']) <input type="hidden" name='affectation_activite' value="{{$var['plan']->id}}" required> @endif

                  <div class="form-group">
                    <label for="exampleInputPassword1">Début *</label>
                    <input type="date" class="form-control" name="debut" id="exampleInputPassword1" placeholder="Début" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Fin *</label>
                    <input type="date" class="form-control" name="fin" id="exampleInputPassword1" placeholder="Fin" required>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregister</button>
                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
                  </div>
            </form>
            
        </div>
    </div>
</div>