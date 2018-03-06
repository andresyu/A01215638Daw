<?php
    session_start();
    require_once("util.php");
    
    if(isset($_SESSION["nombre"]))
    {
        include("partials/_header.html");
        
        $nombre = $_SESSION["nombre"];
        $apellido = $_SESSION["apellido"];
        
        include("partials/_dentroForm.html");
        include("partials/_footer.html"); 
        
    }else if ($_POST["nombre"]=="Andres" && $_POST["password"]=="1234" ) {
        
        unset($_SESSION["error"]);
        
        $_SESSION["nombre"] = $_POST["nombre"];
        $_SESSION["apellido"] = $_POST["apellido"];
        
        $nombre = $_SESSION["nombre"];
        $apellido = $_SESSION["apellido"];
        
        include("partials/_header.html");
        include("partials/_dentroForm.html");
        include("partials/_footer.html"); 
        
    } else if($_POST["usuario"]!="Andres" || $_POST["password"]!="1234") {
        
        $_SESSION["error"] = "Usuario y/o contraseña incorrectos";
        header("location: index.php");
    }
    
?>