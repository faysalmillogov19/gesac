<div class="modal fade" id="updateModule{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$row->id}}" aria-hidden="true">
<div class="modal-dialog" role="document" >
<div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Année</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="modal-body" method="POST" action="{{route('annee.store')}}">
                @csrf

                @if($row->id)<input type="hidden" name='id' value="{{$row->id}}" required>@endif

                  <div class="form-group">
                    <label for="exampleInputPassword1">Libéllé *</label>
                    <input type="text" class="form-control" name="libelle" id="exampleInputPassword1" placeholder="Libelle" 
                    @if( $row->libelle ) value="{{$row->libelle}}" @endif required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">description</label>
                    <textarea class="form-control" name="description" placeholder="Description" required>@if($row->libelle) {{$row->description}} @endif</textarea>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregister</button>
                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
                  </div>
            </form>
            
        </div>
    </div>
</div>