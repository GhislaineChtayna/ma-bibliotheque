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

mysqli_select_db( $Conndb,$database_Conndb);
$query_Connexioncreationcompte = "SELECT * FROM utilisateur";
$Connexioncreationcompte = mysqli_query( $Conndb,$query_Connexioncreationcompte) or die(mysqli_error($Conndb));
$row_Connexioncreationcompte = mysqli_fetch_assoc($Connexioncreationcompte);
$totalRows_Connexioncreationcompte = mysqli_num_rows($Connexioncreationcompte);

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysqlii_real_escape_string") ? mysqlii_real_escape_string($theValue) : mysqlii_escape_string($theValue);

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
<title>Creer un compte</title>
<link href="style css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
</head>
<body><div id="page">
  <div id="haut">
    <h1><img src="img/LOGO en-tete.gif" width="96" height="51" />  Ma Biblio en ligne</h1>
  </div>
  <div id="nav">
    <ul>
      <li></li>
      <li><a href="Parcourir la bibliotheque.php">Parcourir la bibliothèque</a></li>
      <li><a href="Se connecter.php">Se connecter</a></li>
      <li><a href="Creer un compte.php" class="active" id="navl"><strong>Créer un compte</strong></a></li>
    </ul>
  </div>
  <div id="contenu">
    <table width="535" border="0" cellspacing="10">
      <caption>
        Création de compte utilisateur
      </caption>
      <tr>
        <td width="248">Nom :</td>
        <td width="253"><?php echo $row_Connexioncreationcompte['nom']; ?></td>
      </tr>
      <tr>
        <td>Prénom : </td>
        <td><?php echo $row_Connexioncreationcompte['prenom']; ?></td>
      </tr>
      <tr>
        <td>E-mail</td>
        <td><?php echo $row_Connexioncreationcompte['email']; ?></td>
      </tr>
      <tr>
        <td>Mot de passe : </td>
        <td><?php echo $row_Connexioncreationcompte['mdp']; ?></td>
      </tr>
      <tr>
        <td>Confirmation du mot de passe :</td>
        <td><?php echo $row_Connexioncreationcompte['mdp']; ?></td>
      </tr>
    </table>
    <form id="form1" name="form1" method="post" action="">
      <label>
        <input type="submit" name="Validation de la création du compte" id="Validation de la création du compte" value="Envoyer" />
      </label>
    </form></div>
  <div id="pied">
    <p>Tous droits réservés <strong>©</strong> Ma Biblio, Ghislaine Chtayna</p>
  </div>
</div>
</body>
</html>
<?php
mysqli_free_result($Connexioncreationcompte);
?>
</body>
</html>