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

<?php require_once __DIR__. '/template/footer.php'; ?>
