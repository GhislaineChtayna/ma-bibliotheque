<?php require_once('Connections/Conndb.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($theValue) : mysqli_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
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

mysqli_select_db($Conndb, $database_Conndb);
$query_Connexionpc1 = "SELECT * FROM pret";
$Connexionpc1 = mysqli_query($Conndb, $query_Connexionpc1) or die(mysqli_error($Conndb));
$row_Connexionpc1 = mysqli_fetch_assoc($Connexionpc1);
$totalRows_Connexionpc1 = mysqli_num_rows($Connexionpc1);

mysqli_select_db($Conndb, $database_Conndb);
$query_Connexionpc2 = "SELECT * FROM livre";
$Connexionpc2 = mysqli_query($Conndb, $query_Connexionpc2) or die(mysqli_error($Conndb));
$row_Connexionpc2 = mysqli_fetch_assoc($Connexionpc2);
$totalRows_Connexionpc2 = mysqli_num_rows($Connexionpc2);

mysqli_select_db($Conndb, $database_Conndb);
$query_Connexionpc3 = "SELECT * FROM genre";
$Connexionpc3 = mysqli_query($Conndb, $query_Connexionpc3) or die(mysqli_error($Conndb));
$row_Connexionpc3 = mysqli_fetch_assoc($Connexionpc3);
$totalRows_Connexionpc3 = mysqli_num_rows($Connexionpc3);

mysqli_select_db($Conndb, $database_Conndb);
$query_Connexionpc4 = "SELECT * FROM auteur";
$Connexionpc4 = mysqli_query($Conndb, $query_Connexionpc4) or die(mysqli_error($Conndb));
$row_Connexionpc4 = mysqli_fetch_assoc($Connexionpc4);
$totalRows_Connexionpc4 = mysqli_num_rows($Connexionpc4);

mysqli_select_db($Conndb, $database_Conndb);
$query_Connexionpc5 = "SELECT * FROM editeur";
$Connexionpc5 = mysqli_query($Conndb, $query_Connexionpc5) or die(mysqli_error($Conndb));
$row_Connexionpc5 = mysqli_fetch_assoc($Connexionpc5);
$totalRows_Connexionpc5 = mysqli_num_rows($Connexionpc5);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>pret en cours</title>
<link href="style css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<body><div id="page">
  <div id="haut">
    <h1><img src="img/LOGO en-tete.gif" width="96" height="51" />  Ma Biblio en ligne</h1>
  </div>
  <div id="nav">
    <ul>
      <li></li>
      <li><a href="Parcourir la bibliotheque.php">Parcourir la bibliothèque</a></li>
      <li><a href="Prets en cours.php" class="active" id="navl"><strong>Prêts en cours</strong></a></li>
      <li><a href="Information du compte.php">Information du compte</a></li>
      <li><a href="logout.php">Se déconnecter</a></li>
    </ul>
  </div>
    <div id="contenu">
    <form id="form1" name="form1" method="post" action="">
      <input type="image" name="imageField" id="imageField" src="img/Les Miserables.png" />
      <table width="505" border="0" cellspacing="10">
        <tr>
          <th width="119" scope="col">Titre : </th>
          <th width="352" scope="col"><?php echo $row_Connexionpc2['titre']; ?></th>
        </tr>
        <tr>
          <td>Genre : </td>
          <td><?php echo $row_Connexionpc3['nom']; ?></td>
        </tr>
        <tr>
          <td>Date de publication : </td>
          <td><?php echo $row_Connexionpc2['date_publication']; ?></td>
        </tr>
        <tr>
          <td>Auteur : </td>
          <td><?php echo $row_Connexionpc4['nom']; ?></td>
        </tr>
        <tr>
          <td>ISBN : </td>
          <td><?php echo $row_Connexionpc2['isbn']; ?></td>
        </tr>
        <tr>
          <td>Editeur : </td>
          <td><?php echo $row_Connexionpc5['nom']; ?></td>
        </tr>
        <tr>
          <td>Date du prêt : </td>
          <td><?php echo $row_Connexionpc1['date_debut']; ?></td>
        </tr>
        <tr>
          <td><p>Fin du prêt :</p></td>
          <td><?php echo $row_Connexionpc1['date_fin']; ?></td>
        </tr>
      </table>
      <p>
        <label>
          <input name="Prolonger la période de prêt" type="submit" class="active" id="Prolonger la période de prêt" value="Prolonger la période de prêt" />
        </label>
      </p>
    </form>
<h1>&nbsp;</h1>
<h2>&nbsp;</h2>
<p>&nbsp;</p>
  </div>
  <div id="pied">
    <p>Tous droits réservés <strong>©</strong> Ma Biblio, Ghislaine Chtayna</p>
  </div>
</div>
</body>
</html>
<?php
mysqli_free_result($Connexionpc1);

mysqli_free_result($Connexionpc2);

mysqli_free_result($Connexionpc3);

mysqli_free_result($Connexionpc4);

mysqli_free_result($Connexionpc5);
?>
