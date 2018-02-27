<?php
    session_start();
    
    if(isset($_SESSION["nombre"]) ) 
    {
        unset($_SESSION["error_archivo"]);
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                
        $check = getimagesize($_FILES["imagen"]["tmp_name"]);
        
        if($check !== false) 
        {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } 
        else 
        {
            $_SESSION["error_archivo"] = "El archivo no es una imagen";
            $uploadOk = 0;
        }
                
        if (file_exists($target_file)) 
        {
            $_SESSION["error_archivo"] =  "El archivo ya existe";
            $uploadOk = 0;
        }
        
        if ($_FILES["imagen"]["size"] > 500000) 
        {
            $_SESSION["error_archivo"] =  "El archivo es muy grande.";
            $uploadOk = 0;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
        {
            $_SESSION["error_archivo"] = "Lo siento solo los formatos: JPG, JPEG, PNG & GIF son permitidos.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) 
        {
        
        } 
        else 
        {
            if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) 
            {
                echo "The file ". basename( $_FILES["imagen"]["name"]). " has been  uploaded.";
                $_SESSION["ruta_archivo"] = $target_file;
            }
            else 
            {
                $_SESSION["error_archivo"] =  "No se puede";
            }
        }
            
        if(isset($_SESSION["error_archivo"])) 
        {
            
            header("location:login.php");
        }
        
        $_SESSION["archivo"] = $target_file;
        header("location:login.php");
        
    } else {
        header("location:index.php");
    }
?>