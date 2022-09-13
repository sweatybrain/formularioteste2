<?php

//------------------conexao--------------------
try{
    $pdo = new PDO("mysql: dbname=crudmiriam; host=localhost", "root", "");

} catch (PDOException $e) {
    echo "Erro com banco de dados: " .$e->getMessage();

} catch (Exception $e) {
    echo "Erro generico" .$e->getMessage();

}

//------------------------insert------------------
/* $nome = "miriam";
$telefone = "99999999";
$email = "teste@gmail.com";

$res = $pdo->prepare("INSERT INTO pessoa(nome, telefone, email) VALUES (:n, :t, :e)");

 //metodo com parametros
$res->bindParam(':n', $nome);
$res->bindParam(':t', $telefone);
$res->bindParam(':e', $email);
$res->execute();
 */

/* $pdo->query("INSERT INTO pessoa(nome, telefone, email) VALUES ('Miriam, '9999990000', 'teste@gmail.com')"); */

//-------------------------delete----------------------

/* $cmd = $pdo->prepare("DELETE FROM pessoa WHERE id= :id");
$id = 1;
$cmd->bindValue(":id", $id);
$cmd->execute(); */

/* $cmd = $pdo->query("DELETE FROM pessoa WHERE id = '4' ");
 */

//------------------------update-----------------
/* $cmd = $pdo->prepare("UPDATE pessoa SET email = :e WHERE id = :id");
$cmd->bindValue(":e", "Miriam@gmail.com");
$cmd->bindValue(":id", 1);
$cmd->execute();

$res = $pdo->query("UPDATE pessoa SET email='novo@email.com' WHERE id = '4' ");

 */

 //-----------------------select-------------------

/* $cmd = $pdo->prepare("SELECT * FROM pessoa WHERE id = :id");
$cmd->bindValue(":id", 4);
$cmd->execute();
$resultado = $cmd->fetch(PDO::FETCH_ASSOC);

foreach ($resultado as $key => $value)
{
    echo $key.": ".$value "<br>";
}

?> */