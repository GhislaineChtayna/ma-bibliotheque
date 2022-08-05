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
$query_Connexionpbr = "SELECT * FROM livre";
$Connexionpbr = mysqli_query($Conndb, $query_Connexionpbr) or die(mysqli_error($Conndb));
$row_Connexionpbr = mysqli_fetch_assoc($Connexionpbr);
$totalRows_Connexionpbr = mysqli_num_rows($Connexionpbr);

mysqli_select_db($Conndb, $database_Conndb);
$query_Connexionpbr2 = "SELECT * FROM auteur";
$Connexionpbr2 = mysqli_query( $Conndb,$query_Connexionpbr2) or die(mysqli_error($Conndb));
$row_Connexionpbr2 = mysqli_fetch_assoc($Connexionpbr2);
$totalRows_Connexionpbr2 = mysqli_num_rows($Connexionpbr2);

mysqli_select_db($Conndb, $database_Conndb);
$query_Connexionpbr3 = "SELECT * FROM genre";
$Connexionpbr3 = mysqli_query($Conndb, $query_Connexionpbr3) or die(mysqli_error($Conndb));
$row_Connexionpbr3 = mysqli_fetch_assoc($Connexionpbr3);
$totalRows_Connexionpbr3 = mysqli_num_rows($Connexionpbr3);

mysqli_select_db( $Conndb,$database_Conndb);
$query_Connexionpbr4 = "SELECT * FROM editeur";
$Connexionpbr4 = mysqli_query($Conndb, $query_Connexionpbr4) or die(mysqli_error($Conndb));
$row_Connexionpbr4 = mysqli_fetch_assoc($Connexionpbr4);
$totalRows_Connexionpbr4 = mysqli_num_rows($Connexionpbr4);

mysqli_select_db( $Conndb, $database_Conndb);
$query_Connexionpbr5 = "SELECT * FROM paragraphe";
$Connexionpbr5 = mysqli_query($Conndb, $query_Connexionpbr5) or die(mysqli_error($Conndb));
$row_Connexionpbr5 = mysqli_fetch_assoc($Connexionpbr5);
$totalRows_Connexionpbr5 = mysqli_num_rows($Connexionpbr5);

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

mysqli_select_db( $Conndb,$database_Conndb);
$query_Connexionpb = "SELECT * FROM langue";
$Connexionpb = mysqli_query( $Conndb,$query_Connexionpb) or die(mysqli_error($Conndb));
$row_Connexionpb = mysqli_fetch_assoc($Connexionpb);
$totalRows_Connexionpb = mysqli_num_rows($Connexionpb);

mysqli_select_db( $Conndb, $database_Conndb);
$query_Connexiondb1 = "SELECT * FROM genre";
$Connexiondb1 = mysqli_query( $Conndb,$query_Connexiondb1) or die(mysqli_error($Conndb));
$row_Connexiondb1 = mysqli_fetch_assoc($Connexiondb1);
$totalRows_Connexiondb1 = mysqli_num_rows($Connexiondb1);

mysqli_select_db($Conndb, $database_Conndb);
$query_Connexiondb2 = "SELECT * FROM auteur";
$Connexiondb2 = mysqli_query( $Conndb,$query_Connexiondb2) or die(mysqli_error($Conndb));
$row_Connexiondb2 = mysqli_fetch_assoc($Connexiondb2);
$totalRows_Connexiondb2 = mysqli_num_rows($Connexiondb2);

mysqli_select_db($Conndb, $database_Conndb);
$query_Connexiondb3 = "SELECT titre FROM livre";
$Connexiondb3 = mysqli_query($Conndb, $query_Connexiondb3) or die(mysqli_error($Conndb));
$row_Connexiondb3 = mysqli_fetch_assoc($Connexiondb3);
$totalRows_Connexiondb3 = mysqli_num_rows($Connexiondb3);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta charset=utf-8" />
<title>Parcourir la bibliothèque</title>
<link href="style css/style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body><div id="page">
  <div id="haut">
    <h1><img src="img/LOGO en-tete.gif" width="96" height="51" />  Ma Biblio en ligne</h1>
  </div>
  <div id="nav">
    <ul>
      <li></li>
      <li><a href="Parcourir la bibliotheque.php" class="active" id="navl"><strong>Parcourir la bibliothèque</strong></a></li>
      <li><a href="Prets en cours.php">Prêts en cours</a></li>
      <li><a href="Information du compte.php">Information du compte</a></li>
      <li><a href="logout.php">Se déconnecter</a></li>
    </ul>
  </div>
  <div id="contenu">
    <h1>Recherche :</h1>
    <form id="form2" name="form2" method="post" action="">
      <table width="701" border="0" cellspacing="10">
        <tr>
          <th width="131" scope="col">Titre : </th>
          <th width="134" scope="col">Auteur : </th>
          <th width="134" scope="col">Genre :</th>
          <th width="244" scope="col">Langue : </th>
        </tr>
        <tr>
          <td><?php echo $row_Connexiondb3['titre']; ?></td>
          <td><?php echo $row_Connexiondb2['nom']; ?></td>
          <td><?php echo $row_Connexiondb1['nom']; ?></td>
          <td><?php echo $row_Connexionpb['nom']; ?></td>
        </tr>
      </table>
      <p>
        <label>
          <input type="submit" name="Parcourir la bibliotheque" id="Parcourir la bibliotheque" value="Envoyer" />
        </label>
      </p>
    </form>
  </div>
   <div id="contenu">
    <h1>Resultats : </h1>
    <form id="form1" name="form1" method="post" action="">
      <img src="img/Les Miserables.png" width="117" height="184" />
      <table width="534" border="0" cellspacing="10">
        <tr>
          <th scope="col">Titre : </th>
          <th scope="col"><?php echo $row_Connexionpbr['titre']; ?></th>
        </tr>
        <tr>
          <td>Auteur :</td>
          <td><?php echo $row_Connexionpbr2['nom']; ?></td>
        </tr>
        <tr>
          <td>Genre :</td>
          <td><?php echo $row_Connexionpbr3['nom']; ?></td>
        </tr>
        <tr>
          <td>ISBN :</td>
          <td><?php echo $row_Connexionpbr['isbn']; ?></td>
        </tr>
        <tr>
          <td>Date de publication : </td>
          <td><?php echo $row_Connexionpbr['date_publication']; ?></td>
        </tr>
        <tr>
          <td>Editeur : </td>
          <td><?php echo $row_Connexionpbr4['nom']; ?></td>
        </tr>
        <tr>
          <td>Presentation :</td>
          <td><?php echo $row_Connexionpbr5['texte']; ?></td>
        </tr>
        <tr>
          <td>Disponibilite :</td>
          <td>Oui</td>
        </tr>
      </table>
    </form>
  </div>
  <div id="pied">
    <p>Tous droits réservés <strong>©</strong> Ma Biblio, Ghislaine Chtayna</p>
  </div>
</div>
</body>
</html>
<?php
mysqli_free_result($Connexionpbr);

mysqli_free_result($Connexionpbr2);

mysqli_free_result($Connexionpbr3);

mysqli_free_result($Connexionpbr4);

mysqli_free_result($Connexionpbr5);

mysqli_free_result($Connexionpb);

mysqli_free_result($Connexiondb1);

mysqli_free_result($Connexiondb2);

mysqli_free_result($Connexiondb3);
?>
