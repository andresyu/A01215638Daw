<!DOCTYPE HTML>  
<html>
<head>
    <meta charset="utf-8">
    <title>Lab 11</title>
    <link rel="stylesheet" type="text/css" href="lab11.css">
</head>
<body>  

<?php
$nombreErr = $correoErr = $generoErr = "";
$nombre = $correo = $genero = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nombre"])) {
    $nombreErr = "Nombre Requerido";
    
  } else {
    $nombre = test_input($_POST["nombre"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$nombre)) {
      $nombreErr = "Solo letras y espacios son permitidos"; 
    }
  }
  
  if (empty($_POST["correo"])) {
    $correoErr = "Email Requerido";
  } else {
    $correo = test_input($_POST["correo"]);
  
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
      $correoErr = "Formato de email necesita @ y ."; 
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["genero"])) {
    $generoErr = "El Genero es Requerido";
  } else {
    $genero = test_input($_POST["genero"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Laboratorio 11</h2>
<p><span class="error">* Campos Obligatorios.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  Nombre: <input type="text" name="nombre" value="<?php echo $nombre;?>">
  <span class="error">* <?php echo $nombreErr;?></span>
  <br><br>
  
  Correo: <input type="text" name="correo" value="<?php echo $correo;?>">
  <span class="error">* <?php echo $correoErr;?></span>
  <br><br>
  
  Comentarios:<br> <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea><br>
  <br><br>
  
  Genero:
  <input type="radio" name="genero" <?php if (isset($genero) && $genero=="femenino") echo "checked";?> value="femenino">Femenino
  <input type="radio" name="genero" <?php if (isset($genero) && $genero=="masculino") echo "checked";?> value="masculino">Masculino
  <span class="error">* <?php echo $generoErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Registrar">  
</form>

<?php
echo "<h2>Datos Guardados:</h2>";
echo $nombre;
echo "<br>";
echo $correo;
echo "<br>";
echo $comment;
echo "<br>";
echo $genero;
?> <br>
<br>

<h1>Preguntas a Respoder:</h1>

<h3>¿Por qué es una buena práctica separar el controlador de la vista?</h3>

<p>
    Porque se hace más segura la página ante varios tipos de ataques, porque el php y el script no son accesibles para los usuarios.
</p>

<h3>Aparte de los arreglos $_POST y $_GET, ¿qué otros arreglos están predefinidos en php y cuál es su función?</h3>

<p>
    $_REQUEST: Contiene el contenido de los métodos get, post y cookie<br>
    $_GLOBALS: Da una referencia de todas las variables globales<br>
    $_COOKIES: Variables pasadas al script<br>
    $_FILES: Elementos subidos en el pasado por el metodo Post<br>
    $_SERVER: Información del servidor en el que se encuentra el script<br>
    $_ENV: Variables pasadas al script mediante el método del entorno<br>
</p>

<h3>Explora las funciones de php, y describe 2 que no hayas visto en otro lenguaje y que llamen tu atención.</h3>

<p>
    password_hash: para encriptar contraseñas. <br>
    error_reporting: para mostrar los errores en la fase de desarrollo. <br>
    
</p>

<h3>¿Qué es XSS y cómo se puede prevenir?</h3>

<p>
    Es un cross-site scripting y se refiere a un tipo de ataque donde hacker inyectan codigo malicioso del lado del cliente en el output de la pagina.
    Las aplicaciones que no escapen de su output son vulnerables a este tipo de ataques. Puede ser prevenido mediante la implementacion de htmlspecialchars() ó htmlentities() en el output. [1]
</p>

<h3>Referencias:</h3>
<p>
    [1] https://medium.com/@jpmorris/how-to-prevent-xss-attacks-by-escaping-output-in-php-942204bf184<br>
    [2] https://www.w3schools.com/php/php_form_url_email.asp<br>
</p>

</body>
</html>