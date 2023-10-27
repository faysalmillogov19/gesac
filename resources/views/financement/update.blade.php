<div class="modal fade" id="updateModule{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$row->id}}" aria-hidden="true">
<div class="modal-dialog" role="document" >
<div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Financement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="modal-body" method="POST" action="{{route('financement.store')}}">
                @csrf

                @if($row->id)<input type="hidden" name='id' value="{{$row->id}}" required>@endif

                @if($var['plan']) <input type="hidden" name='activite' value="{{$var['plan']->id}}" required> @endif

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
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregister</button>
                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
                  </div>
            </form>
            
        </div>
    </div>
</div>