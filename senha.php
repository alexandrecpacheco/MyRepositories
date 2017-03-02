<?php
ob_start();
$login = "admin"; //armazena o usuário dentro da variável $login
$senha = "admin"; //armazena a senha dentro da variável $senha

//se o usuário digitado for igual ao que esta ali em cima, e a senha também
if ($login == $_POST['usuario'] && $senha == $_POST['password'])
//entao execute isto
{
//aqui vai entrar a novidade, antes de redirecionarmos
//vamos salvar algumas informações para utilizar depois

//primeiro eu dou o valor 1 para a variável $validacao
$validacao = "1"; //usaremos essa variável para verificar se ele está logado, se o usuário não tiver o valor 1 nessa variável ele não está logado!
$usuario = $_POST['usuario']; // puxa o nome do usuário digitado no formulario do index.html
//inicio uma Sessao (session e similar a uma gaveta movel)
session_start();
//gravo as informações das variáveis dentro das sessões
$_SESSION['usuario'] = $usuario;
$_SESSION['validacao'] = $validacao;

//Pronto agora redirecione o usuário para a página secreta

//abre a página secretaaaa
header("Location: admin.php");
}
//senao
else
{
//exiba um alerta dizendo que a senha esta errada
echo "<meta HTTP-EQUIV='refresh' CONTENT='7;URL=index.html'>";
echo "<br>";
echo "<p align='center'>Usuário ou Senha Incorreta Por Favor volte e Digite Novamente</p>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<p align='center'>Em 7 Segundo você será redirecionado para Tela de Login</p>";
echo "<br>";
echo "<br>";
echo "<p align='center'><a href=index.html>VOLTAR</a></p>";
}
?>
<script type="text/javascript">
alert("Login ou Senha Incorreta!");
</script>

