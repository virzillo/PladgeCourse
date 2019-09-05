
        <div class="modal fade" id="addPekit" tabindex="-1" role="dialog" aria-labelledby="pekitlabel" aria-hidden="true" role="dialog" style="display: none;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Aggiungi quantità PEKIT</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                          <form action="{{ route('storage.store') }}"  id="formPekit"  method="POST">
                                @csrf
                             <input type="hidden" class="form-control" id="nome" name="nome" value="PEKIT">
                            
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Seleziona quantità:</label>
                                <input type="number" class="form-control" id="quantita" name="quantita">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Costo per unità:</label>
                                <input type="number" class="form-control" id="costo" name="costo">
                            </div>
                    </div>
                   
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                          <input type="hidden" name="action" id="action" />
                        <input type="hidden" name="tipo_invio" id="tipo_invio" />
                        <input type="submit" name="action_button" id="action_button" class="btn btn-primary" value="Add" />
                    </div>
                        </form>

                </div>
            </div>
        </div>
@if (isset($pekit))
         <div class="modal fade" id="editPekit" tabindex="-1" role="dialog" aria-labelledby="addCardLabel1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Modifica quantità PEKIT</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                          <form action="{{ route('storage.store') }}" method="POST">
                                @csrf
                             <input type="hidden" class="form-control" id="nome" name="nome" value="PEKIT">
                            
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Seleziona quantità:</label>
                                <input type="number" class="form-control" id="quantita" name="quantita" value="{{$pekit->quantita}}">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Costo per unità:</label>
                                <input type="number" class="form-control" id="costo" name="costo" value="{{$pekit->costo}}">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Inserisci</button>
                    </div>
                        </form>

                </div>
            </div>
        </div>
@endif