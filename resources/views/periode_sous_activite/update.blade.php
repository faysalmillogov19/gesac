<div class="modal fade" id="updateModule{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$row->id}}" aria-hidden="true">
<div class="modal-dialog" role="document" >
<div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Année</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="modal-body" method="POST" action="{{route('periode_activite.store')}}">
                @csrf

                @if($row->id)<input type="hidden" name='id' value="{{$row->id}}" required>@endif

                @if($var['id_activite']) <input type="hidden" name='activite' value="{{$var['id_activite']}}" required> @endif

                  <div class="form-group">
                    <label for="exampleInputPassword1">Début *</label>
                    <input type="date" class="form-control" name="debut" id="exampleInputPassword1" placeholder="Début" @if( $row->debut ) value="{{$row->debut}}" @endif required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Fin *</label>
                    <input type="date" class="form-control" name="fin" id="exampleInputPassword1" placeholder="Fin" @if( $row->fin ) value="{{$row->fin}}" @endif required>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregister</button>
                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
                  </div>
            </form>
            
        </div>
    </div>
</div>