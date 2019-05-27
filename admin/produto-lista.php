<?php
    include ("../src/includes/cabecalho.2.php");
	require_once("../src/bancos/global.php");

    $getRemovido = array_key_exists("removido", $_GET);
    $removido = $getRemovido == "true";

    if ($removido) :?>
        <p class="alert-success" >Produto apagado com sucesso!</p >
    <?php endif; ?>

    <table class="table table-bordered table-striped ">
<?php
    $produtos = listaProdutos($conexao);

	if(count($produtos) === 0){
		echo '<p style="color:red;">*Sem produtos para listar!</p>';
	}
    foreach ($produtos as $produto):
?>
    <tr>
        <td class="align-middle"><?=$produto['nome'];?></td>
        <td class="text-center align-middle"><?=$produto['preco'];?></td>
        <td class="align-middle"><?=substr($produto['descricao'],0,50).'...';?></td>
        <td class="align-middle"><?=$produto['categoria_nome'];?></td>
        <td class="text-center">
            <form action="visualiza-produto.php?id=<?=$produto['id']?>" method="post">
                <input type="hidden" name="id" value="<?=$produto['id'];?>">
                <button class="btn btn-info">Visualizar</button>
            </form>
        </td>
        <td class="text-center">
            <form action="produto-altera-formulario.php?id=<?=$produto['id'];?>" method="post">
                <input type="hidden" name="id" value="<?=$produto['id'];?>">
                <button class="btn btn-warning">Alterar</button>
            </form>
        </td>
        <td class="text-center">
            <form action="remove-produto.php?id=<?=$produto['id'];?>" method="post">
                <input type="hidden" name="id" value="<?=$produto['id'];?>">
                <button class="btn btn-danger">Remover</button>
            </form>
        </td>
    </tr>
<?php
    endforeach;
?>
    </table>
<a href="produto-formulario.php"><button class="btn btn-primary float-left">+</button></a>
<?php include ("../src/includes/rodape.2.php"); ?>

