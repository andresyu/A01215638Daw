<?php
    session_start();
    
    if ($_POST["nombre"]=="Andres" && $_POST["password"]=="1234" ) {
        
        unset($_SESSION["error"]);
        
        $_SESSION["nombre"] = $_POST["nombre"];
        $_SESSION["apellido"] = $_POST["apellido"];
        
        $nombre = $_SESSION["nombre"];
        $apellido = $_SESSION["apellido"];
        
        include("partials/_header.html");
        include("partials/_forma2.html");
        include("partials/_footer.html"); 
        
    } else{
        $_SESSION["error"] = "Usuario y/o contraseña incorrectos";
        header("location: index.php");
    }
    
?>