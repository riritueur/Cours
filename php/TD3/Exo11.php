<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8" />
    </head>
    <body>
        <h1>1.1</h1>
        <?php
        echo "Récupération des valeurs du formulaire dans la page html (GET). <br/><br/>";
        if(!empty($_GET)){
            echo "Nom: <br/>".$_GET["firstname"]."<br/><br/>";
            echo "Prenom: <br/>".$_GET["lastname"]."<br/><br/>";
            echo "Email: <br/>".$_GET["email"]."<br/><br/>";
            echo "Radio: <br/>".$_GET["M"]."<br/><br/>";
            echo "Select: <br/>";
            foreach($_GET["select"] as $valeur){
                echo " - ".$valeur."<br/>";
            }
        }
        ?>
    </body>
</html>