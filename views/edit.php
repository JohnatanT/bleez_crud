<?php require_once __DIR__. '/template/header.php'; ?>

<div class="container">
    <h2>Editar Produto: <?php echo $vars['product'][0]->name ?></h2>
    <form action="?r=/update" method="post" name="edit-form" class="form" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $vars['product'][0]->id ?>" />
        <label for="name">Nome</label>
        <input required type="text" name="name" id="name" class="form-control" value="<?php echo $vars['product'][0]->name ?>">

        <label for="price">Preço</label>
        <input required type="text" name="price" id="price" class="form-control" value="<?php echo $vars['product'][0]->price ?>">

        <label for="description">Descrição</label>
        <input required type="text" name="description" id="description" class="form-control" value="<?php echo $vars['product'][0]->description ?>">

        <label for="photo">Foto do produto</label>
        <input type="file" name="photo" id="photo" class="form-control"><br /><br />
        <img src="<?php echo "img/" .$vars['product'][0]->image_name ?>" heigth="400px" width="400px" alt="Imagem do Produto">
        <br>
        <br>
        <input type="submit" name="create" value="Atualizar" class="btn btn-info">
    </form>
</div>


<?php require_once __DIR__. '/template/footer.php'; ?>