<div class="modal fade" id="addModule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Responsable</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="modal-body" method="POST" action="{{route('responsable.store')}}">
                @csrf
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Direction *</label>
                    <input type="text" class="form-control" name="direction" id="exampleInputPassword1" placeholder="Direction" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">description</label>
                    <textarea class="form-control" name="description" placeholder="Description" required></textarea>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregister</button>
                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
                  </div>
            </form>
            
        </div>
    </div>
</div>