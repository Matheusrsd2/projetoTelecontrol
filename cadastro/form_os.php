<?php

include_once('../conexao.php');
?>

<html>
<head>
    <title>Ordem de Serviço</title>
    <link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/cadastros.css">
    <link href="https://fonts.googleapis.com/css?family=Arsenal&display=swap" rel="stylesheet">
</head>

<body>
    <h4>Criar Ordem de Serviço</h4>
    <form action="processa_os.php" id="form-cliente" method="post">
        <div class="col-sm-8">
            <label>Cliente (Somente os clientes ativos no sistema)</label>
            <select class="form-control" name="cliente">
                <option> </option>
                <?php
                $sql    = "SELECT * FROM cliente where status <> 'INATIVO'";
                $result = mysqli_query($conexao, $sql);
                while ($dados = mysqli_fetch_assoc($result)){ ?>
                    <option value="<?php echo $dados['nome'];?>">
                    <?php echo $dados['nome'];?>
                    </option><?php
                } ?>
            </select>
        </div>
        <div class="col-sm-8">
            <label>Técnico</label>
            <select class="form-control" name="tecnico">
                <option> </option>
                <?php
                $sql    = "SELECT * FROM usuario";
                $result = mysqli_query($conexao, $sql);
                while ($dados = mysqli_fetch_assoc($result)){ ?>
                    <option value="<?php echo $dados['nome'];?>">
                    <?php echo strtoupper($dados['nome']);?>
                    </option><?php
                } ?>
            </select>
        </div>
        <div class="col-sm-8">
            <label>Produto</label>
            <input type="text" class="form-control" name="produto">
        </div>
        <div id="status" class="col-md-2">
            <label>Status</label>
            <select class="form-control" name="status">
            <option>ATIVO</option>
        </div>
        <input type="submit" class="btn btn-warning" value="Salvar">
    </form>
</body>