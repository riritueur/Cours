<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
    </head>
    <body>
        <h1>Formulaire:</h1>
        <form action="Exo15.php" method="post">
            Nom:<br/>
            <input type="text" name="firstname" required><br/>
            Prénom:<br/>
            <input type="text" name="lastname" required><br/>
            Email:<br/>
            <input type="text" name="email" required><br/>
            
            <input id="radioButton" type="radio" name="M" value="M"/>
            M
            <input id="radioButton" type="radio" name="M" value="Mme"/>
            Mme
            <input id="radioButton" type="radio" name="M" value="Mlle"/>
            Mlle
            <br/>
            
            <select multiple id="select" name="select[]" size="6">
                <option value="St Emilion">St Emilion</option> 
                <option value="Château l'Hermitage">Château l’Hermitage</option>
                <option value="Entre les Deux Mers">Entre les Deux Mers</option>
                <option value="Fitou">Fitou</option> 
                <option value="Bandol">Bandol</option> 
                <option value="Côte de Provence">Côte de Provence</option> 
            </select>
            <br/>
            <br/>
            <input type="submit" name="Valider" />
            
        </form>
        
        <h1>1.5</h1>
        <?php
        if(!empty($_POST)){
            echo "Idem Exo14.php, mais on rédige un message avec de la mise en forme (POST).<br/><br/>";
            if(preg_match('#^([a-zA-Z\- ])+$#',$_POST["firstname"])){
                if(preg_match('#^([a-zA-Z\- ])+$#',$_POST["lastname"])){
                    if(preg_match("#^([a-zA-Z0-9\.\-_]){2,}@[a-zA-Z]{2,}\.[a-zA-Z]+$#", $_POST["email"])){
                        echo "Bonjour ".$_POST["M"]." ".$_POST["firstname"]." ".$_POST["lastname"].",<br/><br/>Nous vous remercions d'avoir commandé: <br/>";
                        foreach($_POST["select"] as $valeur){
                            echo " - ".$valeur."<br/>";
                        }
                        echo "<br/>Un mail de confirmation vous a été envoyé à l'adresse: ".$_POST["email"];
                    }
                    else{
                        echo "Email invalide <br/>";
                    }
                }
                else{
                    echo "Prénom invalide <br/>";
                }
            }
            else{
                echo "Nom invalide <br/>";
            }   
        }
        ?>
    </body>
</html>