<?php
    session_start();
    require_once("util.php");
    if (isset($_POST["name"]))
    {
        include("partials/_header.html");
        $NombreContacto = getContactosbyNombre($_POST["name"]);
        include("partials/_dentroForm.html");
        include("partials/_footer.html"); 
        
    }
?>