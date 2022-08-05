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
$query_ConnexionIC = "SELECT nom,prenom,email FROM utilisateur";
$ConnexionIC = mysqli_query($Conndb, $query_ConnexionIC) or die(mysqli_error($Conndb));
$row_ConnexionIC = mysqli_fetch_assoc($ConnexionIC);
$totalRows_ConnexionIC = mysqli_num_rows($ConnexionIC);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Information du compte utilisateur</title>
<link href="style css/style.css" rel="stylesheet" type="text/css" />
</head>
<body><div id="page">
  <div id="haut">
    <h1> <img src="img/LOGO en-tete.gif" width="96" height="56" />  Ma Biblio en ligne</h1>
  </div>
  <div id="nav">
    <ul>
      <li></li>
      <li><a href="Parcourir la bibliotheque.php">Parcourir la bibliothèque</a></li>
      <li><a href="Prets en cours.php">Prêts en cours</a></li>
      <li><a href="Information du compte.php" class="active" id="navl"><strong>Information du compte</strong></a></li>
      <li><a href="logout.php">Se déconnecter</a></li>
    </ul>
  </div>
  <div id="contenu">
    <table width="476" border="0" cellspacing="10">
      <caption>
        Information du compte utilisateur
      </caption>
      <tr>
        <td width="148">Nom :</td>
        <td width="218"><?php echo $row_ConnexionIC['nom']; ?></td>
      </tr>
      <tr>
        <td>Prénom : </td>
        <td><?php echo $row_ConnexionIC['prenom']; ?></td>
      </tr>
      <tr>
        <td>E-mail : </td>
        <td><?php echo $row_ConnexionIC['email']; ?></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <form id="form1" name="form1" method="post" action="">
      <label>
        <input type="submit" name="Modifier le compte" id="Modifier le compte" value="Envoyer" />
      </label>
    </form>
  </div>
  <div id="pied">
    <p>Tous droits réservés <strong>©</strong> Ma Biblio, Ghislaine Chtayna</p>
  </div>
</div>
</body>
</html>
<?php
mysqli_free_result($ConnexionIC);
?>
