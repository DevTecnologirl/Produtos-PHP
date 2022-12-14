<html>
<meta charset=UTF-8>
CADASTRO DE PRODUTOS: <hr>
<form method=POST>
Código: <input type=text name=codigo>
Nome: <input type=text name=nome>
Preco: <input type="number" name=preco>
Quantidade: <input type="number" name=quantidade>
<input type=submit name=botao value="Gravar Produto">
</form>
</html>
<?php
if(isset($_POST["botao"])){
//Fazendo a conexão com o MySQL Query Browser, via código.
$conexao=mysql_connect("localhost:3306","root", "root");
mysql_select_db("produto",$conexao);
//Criando as variáveis para manipulação dos dados.
$codigo = $_POST["codigo"];
$nome = $_POST["nome"];
$preco = $_POST["preco"];
$quantidade = $_POST["quantidade"];
//Inserindo os dados na tabela do MySQL Query Browser.
mysql_query("insert into Produtos
values('$codigo','$nome','$preco','$quantidade')",$conexao);
//Exibindo os dados da tabela do MySQL Query Browser.
$consulta = mysql_query("select * from Produtos",$conexao);
while($_GET = mysql_fetch_array($consulta))
{
echo "<br>Código:".$_GET['codigo'];
echo " - Nome:".$_GET['nome'];
echo " - Preco:".$_GET['preco'];
echo " - Quantidade:".$_GET['quantidade'];
echo " - Total:".$_GET['quantidade']*$_GET['preco'];
}
//Encerrando a conexão com o MySQL Query Browser.
mysql_close($conexao);
}
?>