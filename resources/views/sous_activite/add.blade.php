<div class="modal fade" id="addModule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sous activité</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="modal-body" method="POST" action="{{route('sous_activite.store')}}">
                @csrf

                   @if($var['plan'])<input type="hidden" name='affectation_activite' value="{{$var['plan']->id}}" required>@endif

                  <div class="form-group">
                    <label for="exampleInputPassword1">Code *</label>
                    <input type="text" class="form-control" name="code" id="exampleInputPassword1" placeholder="Code" required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Libéllé *</label>
                    <input type="text" class="form-control" name="libelle" id="exampleInputPassword1" placeholder="Libelle" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">description</label>
                    <textarea class="form-control" name="description" placeholder="Description" required></textarea>
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