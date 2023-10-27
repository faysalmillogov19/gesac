<div class="modal fade" id="updateModule{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$row->id}}" aria-hidden="true">
<div class="modal-dialog" role="document" >
<div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Affectation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="modal-body" method="POST" action="{{route('affectation_effet.store')}}">
                @csrf

                @if($row->id)<input type="hidden" name='id' value="{{$row->id}}" required>@endif

                @if($var['plan']) <input type="hidden" name='plan' value="{{$var['plan']->id}}" required> @endif

                  <div class="form-group">
                    <label for="exampleInputPassword1">Effet *</label>
                    <select class="form-control" name="effet" required>
                        <option value="{{$row->effet}}">{{$row->libelle}}</option>
                        <option disabled></option>
                        @foreach($var['effets'] as $ef)
                            <option value="{{$ef->id}}">{{$ef->libelle}}</option>
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