<?php

require_once "../../../app/models/CrudProdutos.php";
require_once "../../../app/models/Produto.php";
$crud = new CrudProdutos();

$listaProdutos = $crud->getProdutos();

?>
<tbody>
<tr>
    <?php foreach($listaProdutos as $prod): ?>
    <a href=""><?= $prod->id_categoria ?></a>

</tr>
<?php endforeach; ?>

</tbody>
