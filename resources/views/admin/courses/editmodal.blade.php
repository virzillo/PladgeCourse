<div class="modal fade" id="editModules" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modifica esame</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                        aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('modules.update' , $module->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="hidden" name="course_id" value="{{$corso->id}}">
                        <input type="hidden" name="course_id" value="{{$module->id}}">

                        <input type="text" class="form-control" name="nome" value="{{$module->nome}}"> </div>
                    <div class="form-group">
                        <label>Descrizione</label>
                        <textarea class="form-control" name="descrizione" value="{{$module->descrizione}}"> </textarea>

                    </div>
                    <div class="form-group">
                        <label>Importo</label>
                        <input type="text" class="form-control" name="costo" value="{{$module->costo}}">
                    </div>

                    <div class="form-group">
                        <label>Durata</label>
                        <input type="number" class="form-control" name="durata" value="{{$module->durata}}">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                <button type="submit" class="btn btn-success">Salva</button>
            </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
