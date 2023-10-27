<div class="modal fade" id="updateModule{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$row->id}}" aria-hidden="true">
<div class="modal-dialog" role="document" >
<div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Affectation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="modal-body" method="POST" action="{{route('affectation_activite.store')}}">
                @csrf

                @if($row->id)<input type="hidden" name='id' value="{{$row->id}}" required>@endif

                @if($var['plan']) <input type="hidden" name='affectation_produit' value="{{$var['plan']->id}}" required> @endif

                  <div class="form-group">
                    <label for="exampleInputPassword1">Activté *</label>
                    <select class="form-control" name="activite" required>
                        <option value="{{$row->activite}}">{{$row->libelle}}</option>
                        <option disabled></option>
                        @foreach($var['activites'] as $pr)
                            <option value="{{$pr->id}}">{{$pr->libelle}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Direction *</label>
                    <select class="form-control" name="responsable" required>
                        <option value="{{$row->responsable}}">{{$row->direction}}</option>
                        <option disabled></option>
                        @foreach($var['responsables'] as $r)
                            <option value="{{$r->id}}">{{$r->direction}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Période</label>
                    <br/>
                    <div class="form-check form-check-inline">
                      <label class="form-check-label" for="inlineRadio1">T1</label>
                      <input class="form-check-input" type="radio" name="T1" id="inlineRadio1" value="option1">
                      <label class="form-check-label" for="inlineRadio1"></label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label class="form-check-label" for="inlineRadio1">T2</label>
                      <input class="form-check-input" type="radio" name="T2" id="inlineRadio2" value="option2">
                      <label class="form-check-label" for="inlineRadio2"></label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label class="form-check-label" for="inlineRadio1">T3</label>
                      <input class="form-check-input" type="radio" name="T3" id="inlineRadio3" value="option2" >
                      <label class="form-check-label" for="inlineRadio3"></label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label class="form-check-label" for="inlineRadio1">T4</label>
                      <input class="form-check-input" type="radio" name="T4" id="inlineRadio3" value="option4" >
                      <label class="form-check-label" for="inlineRadio4"></label>
                    </div>
                  </div>


                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregister</button>
                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
                  </div>
            </form>
            
        </div>
    </div>
</div>