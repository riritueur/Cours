<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
    </head>
    <body>
        <h1>Formulaire:</h1>
        <form action="Exo13.php" method="post">
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
        
        <h1>1.3</h1>
        <?php
        if(!empty($_POST)){
        echo "Récupération des valeurs du formulaire dans la même page php. Les champs nom, prenom et email sont obligatoires (POST).<br/><br/>";
        echo "Nom: <br/>".$_POST["firstname"]."<br/><br/>";
        echo "Prenom: <br/>".$_POST["lastname"]."<br/><br/>";
        echo "Email: <br/>".$_POST["email"]."<br/><br/>";
        echo "Radio: <br/>".$_POST["M"]."<br/><br/>";
        echo "Select: <br/>";
        foreach($_POST["select"] as $valeur){
            echo " - ".$valeur."<br/>";
        }
        }
        ?>
    </body>
</html>