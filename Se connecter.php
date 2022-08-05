<?php require_once('Connections/Conndb.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  //if (PHP_VERSION < 6) {
//    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
//  }
//
//  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($theValue) : mysqli_escape_string($theValue);

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
$query_Connexionseconnecter = "SELECT email, mdp FROM utilisateur";
$Connexionseconnecter = mysqli_query( $Conndb,$query_Connexionseconnecter) or die(mysqli_error($Conndb));
$row_Connexionseconnecter = mysqli_fetch_assoc($Connexionseconnecter);
$totalRows_Connexionseconnecter = mysqli_num_rows($Connexionseconnecter);
?>
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Se connecter</title>
<link href="style css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="page">
  <?php do { ?>
    <div id="haut">
      <h1><img src="img/LOGO en-tete.gif" width="96" height="51" />  Ma Biblio en ligne</h1>
  </div>
    <div id="nav">
      <ul>
        <li></li>
        <li><a href="Parcourir la bibliotheque.php">Parcourir la bibliothèque</a></li>
        <li><a href="Se connecter.php" class="active" id="navl">Se connecter</a></li>
        <li><a href="Creer un compte.php">Créer un compte</a></li>
      </ul>
    </div>
    <div id="contenu">
      <table width="451" border="0" cellspacing="10">
        <caption>
          Connexion
        </caption>
        <tr>
          <td width="116">E-mail :</td>
          <td width="301"><p><?php echo $row_Connexionseconnecter['email']; ?></p></td>
        </tr>
        <tr>
          <td>Mot de passe :</td>
          <td><?php echo $row_Connexionseconnecter['mdp']; ?></td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <form id="form1" name="form1" method="post" action="">
        <label>
          <input type="submit" name="Se connecter" id="Se connecter" value="Envoyer" />
        </label>
      </form>
    </div>
    <div id="pied">
      <p>Tous droits réservés <strong>©</strong> Ma Biblio, Ghislaine Chtayna</p>
    </div>
    <?php } while ($row_Connexionseconnecter = mysqli_fetch_assoc($Connexionseconnecter)); ?>
</div>
</body>
</html>
<?php
mysqli_free_result($Connexionseconnecter);
?>
