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
$query_Connexionmcu = "SELECT * FROM utilisateur";
$Connexionmcu = mysqli_query($Conndb, $query_Connexionmcu) or die(mysqli_error($Conndb));
$row_Connexionmcu = mysqli_fetch_assoc($Connexionmcu);
$totalRows_Connexionmcu = mysqli_num_rows($Connexionmcu);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modification du compte utilisateur</title>
<link href="style css/style.css" rel="stylesheet" type="text/css" />
</head>

<body><div id="page">
  <div id="haut">
    <h1><img src="img/LOGO en-tete.gif" width="96" height="51" />  Ma Biblio en ligne</h1>
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
    <form id="form2" name="form2" method="post" action="">
      <table width="656" border="0" cellspacing="10">
        <caption>
          Modification du compte
        </caption>
        <tr>
          <td width="274">Nom :</td>
          <td width="348"><?php echo $row_Connexionmcu['nom']; ?></td>
        </tr>
        <tr>
          <td>Prénom : </td>
          <td><?php echo $row_Connexionmcu['prenom']; ?></td>
        </tr>
        <tr>
          <td>E-mail : </td>
          <td><?php echo $row_Connexionmcu['email']; ?></td>
        </tr>
        <tr>
          <td>Nouveau mot de passe : </td>
          <td><?php echo $row_Connexionmcu['sel']; ?></td>
        </tr>
        <tr>
          <td>Confirmation du nouveau mot de passe : </td>
          <td><?php echo $row_Connexionmcu['sel']; ?></td>
        </tr>
      </table>
      <p>
        <label>
          <input type="submit" name="Modification du compte" id="Modification du compte" value="Envoyer" />
        </label>
      </p>
    </form>
  </div>
  <div id="pied">
    <p>Tous droits réservés <strong>©</strong> Ma Biblio, Ghislaine Chtayna</p>
  </div>
</div>
</body>
</html>
<?php
mysqli_free_result($Connexionmcu);
?>
