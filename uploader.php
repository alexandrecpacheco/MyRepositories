<?php require_once('Connections/galeria.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_galeria, $galeria);
$query_fotos = "SELECT * FROM fotos ORDER BY id DESC";
$fotos = mysql_query($query_fotos, $galeria) or die(mysql_error());
$row_fotos = mysql_fetch_assoc($fotos);
$totalRows_fotos = mysql_num_rows($fotos);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UPLOAD</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
<script type="text/javascript" src="js/multiUpload.js"></script>
</head>
<style type="text/css">
	@import "css/multiUpload.css";
</style>

<body>
<script type="text/javascript">
	var uploader = new multiUpload('uploader', 'uploader_files', {
		swf:            'swf/multiUpload.swf', // 
		script:         'upload.php',
		expressInstall: 'swf/expressInstall.swf',
		multi:          true
	});
</script>

<div id="uploader"></div>
<div id="uploader_files"></div>

<p><a href="javascript:uploader.startUpload();">INICIAR UPLOAD</a> | <a href="javascript:uploader.clearUploadQueue();">LIMPAR UPLOAD</a></p>
<p>&nbsp;</p>

<!-- Arquivos utilizados pelo jQuery lightBox plugin -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" media="screen" />
    <!-- / fim dos arquivos utilizados pelo jQuery lightBox plugin -->
    
    <!-- Ativando o jQuery lightBox plugin -->
    <script type="text/javascript">
    $(function() {
        $('#gallery a').lightBox();
    });
    </script>
   	<style type="text/css">
	/* jQuery lightBox plugin - Gallery style */
	#gallery {
		background-color: #444;
		padding: 10px;
		width: 779px;
	}
	#gallery ul { list-style: none; }
	#gallery ul li { display: inline; }
	#gallery ul img {
		border: 5px solid #3e3e3e;
		border-width: 5px 5px 20px;
	}
	#gallery ul a:hover img {
		border: 5px solid #fff;
		border-width: 5px 5px 20px;
		color: #fff;
	}
	#gallery ul a:hover { color: #fff; }
	</style>
<body>
<table width="779" border="0" align="center">
  <tr>
    <td><div align="center" id="gallery">
      <?php do { ?>
        <a href="imagens/<?php echo $row_fotos['foto']; ?>" rel="lightbox[roadtrip]"><img src="imagens/<?php echo $row_fotos['foto']; ?>" width="150" height="150" /></a>
        <?php } while ($row_fotos = mysql_fetch_assoc($fotos)); ?></div></td>
  </tr>
</table>
<form>
  <div align="center">
    <INPUT TYPE="button" VALUE="Atualizar" onClick='parent.location="javascript:location.reload()"'>
  </div>
</form>
</body>
</html>
