<?php

require_once 'pessoa.php';
$p = new Pessoa("crudmiriam", "localhost", "root", "");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="estilo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro pessoa</title>
</head>
<body>

<?php
if(isset($_POST['nome'])){

    if(isset($_GET['id_up']) && !empty($_GET['id_up'])){

        $id_upd = addslashes($_GET['id_up']);
        $nome = addslashes($_POST['nome']);
        $telefone = addslashes($_POST['telefone']);
        $email = addslashes($_POST['email']);
        
        if(!empty($nome) && !empty($telefone) && !empty($email)){
   
           $p->atualizarDados($id_upd, $nome, $telefone, $email);


    }else{
        $nome = addslashes($_POST['nome']);
        $telefone = addslashes($_POST['telefone']);
        $email = addslashes($_POST['email']);
        
        if(!empty($nome) && !empty($telefone) && !empty($email)){
   
           if(!$p->cadastrarPessoa($nome, $telefone, $email)){
               echo "E-mail ja cadastrado";
           }
   
        }else{
           echo "Preencha todos os campos";
        }

    }
    }
     $nome = addslashes($_POST['nome']);
     $telefone = addslashes($_POST['telefone']);
     $email = addslashes($_POST['email']);
     
     if(!empty($nome) && !empty($telefone) && !empty($email)){

        $p->cadastrarPessoa($nome, $telefone, $email);
        header("location:index.php");

     }else{
        echo "Preencha todos os campos";
     }

}

?>
<?php 
    if(isset($_GET['id_up'])){
        $id_update = addslashes($_GET['id_up']);
        $res = $p->buscarDadosPessoa($id_update);

    }
    ?>

<section id="esquerda">
    <form method="POST" id="myForm">
        <h2>cadastrar pessoa</h2>
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" required
        value="<?php if(isset($res)){echo $res['nome'];}?>"
        >
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone" required
        value="<?php if(isset($res)){echo $res['telefone'];}?>">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required
        value="<?php if(isset($res)){echo $res['email'];}?>">

        <input type="submit" value="<?php if(isset($res)){echo "Atualizar";}else{echo "Cadastrar";} ?>">
</form>


</section>
<section id="direita">

    <table>
        <tr id="titulo">
            <td>Nome</td>
            <td>Telefone</td>
            <td colspan="2">E-mail</td>
</tr>

<?php
    $dados = $p->buscarDados();

    if(count($dados) > 0)
    {
        for ($i=0; $i < count($dados); $i++) {
            echo "<tr>";
            foreach ($dados[$i] as $k => $v) {
                    if($k != "id") {
                        echo "<td>".$v."</td>";
                    }
            }
            ?>
            <td><a class="edit-btn" href="index.php?id_up=<?php echo $dados[$i]['id']; ?>">Editar</a> <a class="del-btn" href="index.php?id=<?php echo $dados[$i]['id']; ?>">Excluir</a>
    <?php
            echo "</tr>";
        }
    } else{

        ?>
        <div class="aviso">
<h4>ainda nao ha cadastros</h4>
    </div>
  <?php
    }

    ?>

    
</table>

</section>


);
});

    </script>
    
</body>
</html>

<?php

if(isset($_GET['id'])) {
    $id_pessoa = addslashes($_GET['id']);
    $p->excluirPessoa($id_pessoa);
    header("location: index.php");
}

?>