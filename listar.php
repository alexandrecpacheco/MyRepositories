	<!-- Topo Menu -->
	<div id="logo">
		<div id="admin">Emerson - Area Administrativa</div>
	</div>

	<div id="menu">
	<ul>
		<li><a href="index.html">Home  |&nbsp;&nbsp;</a></li>
		<li><a href="upload.html">Incluir  |&nbsp;&nbsp;</a></li>
		<li><a href="listar.php">Excluir  |&nbsp;&nbsp;</a></li>
		<li><a href="logout.php">Sair!  </a></li>
	</ul>		
	</div><!-- Topo Menu -->

<title>EXCLUIR IMAGEM</title>
    <!-- Arquivos utilizados pelo jQuery lightBox plugin -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" media="screen" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
    <!-- / fim dos arquivos utilizados pelo jQuery lightBox plugin -->
    <!-- Ativando o jQuery lightBox plugin -->
    <script type="text/javascript">
    $(function() {
        $('#gallery a').lightBox();
    });
    </script>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#CCCCCC"><div align="center" class="style1"></div></td>
  </tr>
</table>

<?
require ("conectdb.php");
$sql = "SELECT * FROM fotos ORDER BY id DESC";
$limite = mysql_query("$sql");
while  ($sql = mysql_fetch_array ($limite) ) 
	{
		$arquivo = $sql['foto'];
		$id = $sql['id'];
		?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<th scope="col"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
				<tr>
					<th width="596" align="left" valign="top" scope="col">
					<div align="center" id="gallery">
					  <div align="left">
						<a href="imagens/<? echo'$arquivo';?>" rel="lightbox[roadtrip]">
						<img src="imagens/<? echo'$arquivo';?>" alt="UP!" width='230' height="172" border="2" border-color='#FF6600'/></a></div>
					</div>
					</th>
					<th width="106" align="left" valign="top" scope="col">&nbsp;</th>
				</tr>
				  <tr>
					<th height="24" align="left" valign="top" scope="col">&nbsp;</th>
					<th align="center" valign="top" bgcolor="#333333" scope="col"><a href="excluir.php?<? echo'id=$id';?>">EXCLUIR</a></th>
				</tr>
				</table>
			</th>
		  </tr>
		</table>
		<hr width="95%" color="#CCCCCC" />
<? 	} ?>

