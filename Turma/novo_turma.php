
<!-- Modal -->
<div class="modal-fullscreen-md-down">
  <div class="modal fade text-center mx-auto" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-bg-success">
        <div class="modal-header">
          <h4 class="modal-title m-2" id="exampleModalLabel">Cadastrar Turma</h4>
          <hr>
          <button type="button" class="btn-close btn btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="?page=salvar" method="POST">
            <input type="hidden" name="acao" value="cadastrar" /> 
            <div class="m-3">
              <label for="descricao" class="h5 m-2">Descrição :</label>
              <span class="badge bg-info">3 letras e 2 números</span>
              <input type="text" placeholder="Informe o código da turma" name="descricao" 
              id="descricao" class="form-control text-center mt-3 w-75 mx-auto"/>
            </div>
            <button type="submit" class="btn btn-outline-info btn-lg m-3 mt-3">Cadastrar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>    
<script>
    $(document).ready(function () {
      $('#descricao').inputmask({
        mask: 'AAA99', // 3 letras + 2 números
        definitions: {
          'A': {
            validator: '[A-Za-z]',
            casing: 'upper'
          }
        }
      });
    });
</script>
<script>
  const myModal = document.getElementById('myModal')
  const myInput = document.getElementById('myInput')

  myModal.addEventListener('shown.bs.modal', () => {
    myInput.focus()
  })
</script>