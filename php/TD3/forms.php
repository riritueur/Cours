
          
<!DOCTYPE html>
<html>
    <head> 
    <link rel="stylesheet" href="../css/bootstrap.css">
    </head>
    <body>
    
         <h2>Manipulation de tables</h2>
        <?php
            $renault= array(
            'Twingo' => 1000,
            'Clio' => 2000,
            'Megane' => 3000,
            'Laguna' => 4000);
        
            $peugeot= array(
            '107' => 5000,
            '207' => 6000,
            '308' => 7000,
            '508' => 8000
            );
        
            $citroen= array(
            'C1'=> 9000,
            'C3'=> 10000,
            'C4'=> 11000,
            'C5'=> 12000
            );
            $volkswagen= array(
            'Lupo' => 13000,
            'Polo'=> 14000,
            'Golf'=> 15000,
            'Passat'=> 16000
            );

            // <?php $volkswagen["Lupo"] = 13001;  ? > <?php echo $_POST["age"]; ? >
            //$volkswagen["Polo"] = 14001;
            /*echo "affichage des variables de la table initialisée auparavant.<br/>";
            echo '<pre>';
            print_r($volkswagen);
            echo '<pre/>';
            */
            echo '<br>';
  
            foreach($volkswagen as $cle => $element)
            {
                echo '[' . $cle . '] vaut ' . $element . '<br/>';
            }
            
            $array = array(
            'Renault' => $renault,
            'Peugeot' => $peugeot,
            'Citroen' => $citroen,
            'Volkswagen' => $volkswagen);
      
            echo '<br>';
            echo '<pre>';
            //print_r($array);
            echo '<pre/>';
            
            if(!empty($_POST["choix"]) && !empty($_POST["new_marq"]) && !empty($_POST["new_prix"])){
              $array[$_POST["choix"]][$_POST["new_marq"]] = $_POST["new_prix"];    
            }
            
            echo '[' . $cle . '] vaut ' . $element . '<br/>';
            
            echo '<br/><br/><form action="forms.php" method="post">';
            foreach($array as $elements)
            {
              foreach($elements as $cle => $element)
              {
                echo '<input type="text" name="lol" value="'. $element .'"/>';
                echo '<input type="text" name="lol" value="'. $cle .'"/><br/>';
              }
              echo '<br/>';
            }
            
            echo'<select name="choix">';
            foreach($array as $cle => $element)
            {
              echo '<option value="'.  $cle .'"> '.  $cle .'</option>';
            }
            echo '</select>';
            echo '<input type="text" name="new_marq" />';
            echo '<input type="text" name="new_prix" /><br/><br/><br/>';
            echo '<input type="submit" name="Valider"/>
            </form><br/><br/>';
      
            
            ?>
           
            <br/><br/>
             <a href="index.php"><img src="../Entypo+/Entypo+/arrow-bold-left.svg" height="20px" width="40px"/>Retour TD3</a><br/><br/>
             <a href="../index.php"><img src="../Entypo+/Entypo+/arrow-bold-left.svg" height="25px" width="45px"/>Retour index</a>
    </body>
</html>