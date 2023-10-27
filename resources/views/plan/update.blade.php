<div class="modal fade" id="updateModule{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$row->id}}" aria-hidden="true">
<div class="modal-dialog" role="document" >
<div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Plan d'activté</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="modal-body" method="POST" action="{{route('plan.store')}}">
                @csrf

                @if($row->id)<input type="hidden" name='id' value="{{$row->id}}" required>@endif

                <div class="form-group">
                    <label for="exampleInputPassword1">Année *</label>
                    <select class="form-control" name="annee" required>
                        @if($row->annee)<option value="{{$row->annee}}">{{$row->libelle_annee}}</option>@endif
                        <option disabled></option>
                        @foreach($var['annees'] as $a)
                            <option value="{{$a->id}}">{{$a->libelle}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Strategie *</label>
                    <select type="date" class="form-control" name="strategie" required>
                       @if($row->strategie)<option value="{{$row->strategie}}">{{$row->libelle_strategie}}</option>@endif
                        <option disabled></option>
                        @foreach($var['strategies'] as $s)
                            <option value="{{$s->id}}">{{$s->libelle}}</option>
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