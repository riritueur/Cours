<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
    </head>
    <body>
        <h1>Formulaire:</h1>
        <form action="Exo12.php" method="get">
            
            Nom:<br/>
            <input type="text" name="firstname"><br/>
            Prénom:<br/>
            <input type="text" name="lastname"><br/>
            Email:<br/>
            <input type="text" name="email"><br/>
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
        
        <h1>1.2</h1>
        <?php
        if(!empty($_GET)){
            echo "Récupération des valeurs du formulaire dans la même page php (GET). <br/>";
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