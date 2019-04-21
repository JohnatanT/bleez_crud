<?php require_once __DIR__. '/template/header.php'; ?>

<div class="main">
    <div class="container">
        <h2 class="title">Página de Produtos</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Preço</th>
                <th scope="col">Descrição</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($vars['products'] as $product) { ?>
                    <tr>
                    <th scope="row"><?php echo $product->id ?></th>
                    <td><?php echo $product->name ?></td>
                    <td>R$ <?php echo number_format($product->price, 2, ',', '.') ?></td>
                    <td><?php echo $product->description ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Novo Produto
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h1>Cadastro de Produto</h1>
        <form action="?r=/create" enctype="multipart/form-data" name="cadastro" method="POST" class="form">
        Nome:<br />
        <input type="text" name="name"  class="form-control" required><br /><br />
        Preço:<br />
        <input type="number" name="price"  class="form-control" required><br /><br />
        Descrição:<br />
        <input type="text" name="description"  class="form-control" required><br /><br />
        Foto de exibição:<br />
        <input type="file" name="photo"  class="form-control" required><br /><br />
        <input type="submit" name="create" value="Cadastrar" / class="btn btn-info">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php require_once __DIR__. '/template/footer.php'; ?>
