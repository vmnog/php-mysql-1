<?php
include("../src/includes/cabecalho.2.php");
require_once("../src/bancos/global.php");

$categorias = listaCategorias($conexao);


?>

<h2>Formulário de produto</h2>
<div class="container ">
    <form action="adiciona-produto.php" method="post" enctype="multipart/form-data">
        <table class="table">
            <tr>
                <td>Imagem</td>
                <td>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input autofocus required type="file" class="custom-file-input " multiple name="imagem" value="Adicionar Imagens" id="fileInput" onchange="showname()">
                            <label class="custom-file-label" id="fileInputLabel"></label>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Nome</td>
                <td>
                    <input required class="form-control" type="text" name="nome" >
                </td>
            </tr>
            <tr>
                <td>Preço</td>
                <td><input required class="form-control" type="number" name="preco"></td>
            </tr>
            <tr>
                <td>Descrição</td>
                <td><textarea required class="form-control" name="descricao"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="checkbox" value="1" name="usado">
                    <label>Usado</label>
                </td>
            </tr>
            <tr>
                <td>Categoria</td>
                <td>
                    <select class="browser-default custom-select" name="categoria_id">
                        <?php foreach ($categorias as $categoria) : ?>
                            <option class="" type="radio" name="categoria_id" value="<?= $categoria['id'] ?>">
                                <?= $categoria['nome'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input class="btn btn-primary float-right" type="submit" value="Cadastrar"></td>
            </tr>

        </table>
    </form>
</div>
<?php include("../src/includes/rodape.2.php"); ?>