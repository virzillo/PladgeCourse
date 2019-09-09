
        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addCardLabel1" aria-hidden="true" role="dialog" style="display: none;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                          <form action="{{ route('storage.store') }}"  id="formadd"  method="POST">
                                @csrf
                             <input type="hidden" class="form-control" id="id" name="id">
                             <input type="hidden" class="form-control" id="nome" name="nome">
                            
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Seleziona quantità:</label>
                                <input type="number" class="form-control"  name="quantita">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Costo per unità:</label>
                                <input type="text" class="form-control" name="costo">
                            </div>
                    </div>
                   
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        <input type="submit" name="action_button" id="action_button" class="btn btn-primary" value="Add" />
                    </div>
                        </form>

                </div>
            </div>
        </div>
