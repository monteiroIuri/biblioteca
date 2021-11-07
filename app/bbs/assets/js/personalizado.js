// ================================================ //
//  MODAL CONFIRMAR EXCLUIR REGISTRO BOOTSTRAP 5.1  //
// ================================================ //

$(document).ready(function () {
    $('a[data-confirm]').click(function () {
        var href = $(this).attr('href');

        if (!$('#confirm-delete').length) {
            $('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" aria-labelledby="confirm-deleteLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-danger"><h5 class="modal-title text-white" id="deleteDataLabel">EXCLUIR REGISTRO</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body">Tem certeza que deseja excluir o registro selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Cancelar</button><a class="btn btn-outline-danger" id="dataComfirmOk">Apagar</a></div></div></div></div>');
        }

        $('#dataComfirmOk').attr('href', href);
        $('#confirm-delete').modal('show');
        return false;
    });
});