<div class="modal fade" id="addModule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Périodes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="modal-body" method="POST" action="{{route('plan.store')}}">
                @csrf
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Année *</label>
                    <select class="form-control" name="annee" required>
                        <option disabled></option>
                        @foreach($var['annees'] as $a)
                            <option value="{{$a->id}}">{{$a->libelle}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Strategie *</label>
                    <select type="date" class="form-control" name="strategie" required>
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