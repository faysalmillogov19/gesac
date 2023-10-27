<div class="modal fade" id="updateModule{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$row->id}}" aria-hidden="true">
<div class="modal-dialog" role="document" >
<div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dépense</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="modal-body" method="POST" action="{{route('depense_activite.store')}}" enctype="multipart/form-data">
                @csrf

                @if($row->id)<input type="hidden" name='id' value="{{$row->id}}" required>@endif

                @if($var['plan']) <input type="hidden" name='activite' value="{{$var['plan']->id}}" required> @endif

                  <div class="form-group">
                    <label for="exampleInputPassword1">Objet *</label>
                    <input class="form-control" name="objet" @if($row->objet) value="{{$row->objet}}" @endif id="exampleInputPassword1" required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Source financement *</label>
                    <select class="form-control" name="source" id="exampleInputPassword1" required>
                        @if($row->source)<option value="{{$row->source}}">{{$row->libelle}}</option>@endif
                        @foreach($var['source_financements'] as $d)
                        <option value="{{$d->id}}">{{$d->libelle}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Montant *</label>
                    <input type="number" class="form-control" name="montant" id="exampleInputPassword1" placeholder="Montant" @if( $row->montant ) value="{{$row->montant}}" @endif required>
                  </div>

                  <div class="form-group">
                    <label for="formFileSm" class="form-label">Piece jointe</label>
                    <input class="form-control form-control-sm" id="formFileSm" type="file" name="piece">
                  </div>

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregister</button>
                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
                  </div>
            </form>
            
        </div>
    </div>
</div>