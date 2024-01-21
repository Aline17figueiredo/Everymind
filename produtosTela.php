<!DOCTYPE html>
<html lang="en">
<head>
    <title>Produtos</title>
</head>
<body>
    <h1>Produtos</h1>
    <form action="produtosControle.php">
        <input class="input" type="search" name="search" placeholder="Pesquisar">
        <input type="hidden" name="a" value="search">
        <input class="button" type="submit" name="submit" value="Submit">
    </form>
    <a class="button" href="produtosCRUD.php?a=goToNew">Novo Produto</a>
    <div class="content">
        <table class="table">
            <thead>
                <tr>
                    <th>Codigo do Protudo</th>
                    <th>Nome do Prudoto</th>
                    <th>Descricao do Produto</th>
                    <th>Preco do Produto</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($resultData as $data): ?>
                    <tr>
                        <td> <?= $data["CodigoProduto"]; ?> </td>
                        <td> <?= $data["NomeProduto"]; ?> </td>
                        <td> <?= $data["DescricaoProduto"]; ?> </td>
                        <td> <?= $data["PrecoProduto"]; ?> </td>
                        <td> 
                            <a class="button btn-edit" href="produtoCRUD.php?a=search&v=editCreate&search=<?= $data['CodigoProduto'] ?>">Editar</a>
                            <button class="button btn-delete" onclick="verifyDelete(<?= $data['CodigoProduto'] ?>)">Deletar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
<script>
    function verifyDelete(CodigoProduto)
    {
        let result = confirm('Você tem certeza que deseja deletar o Produto : '+CodigoProduto);
        console.log(result);
        if(result)
        {
            window.location.replace('produtosCRUD.php?a=delete&CodigoProduto='+CodigoProduto);
        }
    }
    function reload()
    {
        window.location.replace('produtoTela.php');
    }
</script>
</html>