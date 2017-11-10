<?php
    if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg")) && ($_FILES["file"]["size"] < 100000)) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br />";
        }
        else{
            if (file_exists("upload/" . $_FILES["file"]["name"]))
                echo $_FILES["file"]["name"] . " existe déjà. ";
            else {
                move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $_FILES["file"]["name"]);
                echo "Image enregistrée avec succès dans : upload/" . $_FILES["file"]["name"];
            }   
        }
    } 
    else
        echo "Image invalide";
?>