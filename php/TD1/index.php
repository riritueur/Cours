<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php
            $x=2;
            $y=4;
            $z=0;
            $g=12;
            $msg="Bonjour à tous";
            define("CONSTANT", "Bonjour le monde.");
    ?>
   
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

  </head>

  <body>
        <h1>TD1</h1>
        <h2>2.2</h2>
        <?php
            echo "$msg</br>";
        ?>
        <h2>2.4</h2>
        <?php
            $za = "<a href=\"unice.fr\" title=\"lien\">Site de l université</a></br></br>";
            echo $za;
        ?>
        <h2>2.5</h2>
        <?php
            echo "x=$x</br>";
            echo "y=$y</br>";
            echo "z=$z</br>";
            $z=$x*$y;
            echo "$x fois $y = $z";
        ?>
        <h2>3.1</h2>
        <?php
            echo 'chaine 1 - Doubles quotes</br>';
            echo "chaine 2 - Simples quotes</br>";
        ?>
        <h2>3.2</h2>
        <?php
            echo "Je m'appelle Martin</br></br></br>";
        
        ?>
        <h2>3.3</h2>
        <?php
            echo "Tests des fonctions de traitement de chaînes de caractères : <br/>";
            echo strlen($msg) ;
            echo '<br/>';
            echo strpos($msg,'j');
            echo '<br/>';
            echo strstr($msg,"tous");
            echo '<br/>';
            echo substr("abcdef", 0, -1);
            echo '<br/>';
            $phrase  = "You should eat fruits, vegetables, and fiber every day.\n";
            $healthy = array("fruits", "vegetables", "fiber");
            $yummy   = array("pizza", "beer", "ice cream");
            $newphrase = str_replace($healthy, $yummy, $phrase);
            $orig = "<strong>J'ai \"sorti\" le chien tout à l\'heure\n</strong>";
            $a = htmlentities($orig);
            $b = html_entity_decode($a);
            echo $a;
            echo '<br/>';
            $str = "Un 'apostrophe' en <strong>gras</strong>";
            echo  ($str);
            echo '<br/>';
            $pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
            $pieces = explode(" ", $pizza);
            echo $pieces[0];
            echo '<br/>';
            echo $pieces[1];
            echo '<br/>';
            addslashes($phrase);

            $tab = array('Hello', 'world', '!');
            $implode = implode(" ", $tab);
        
            ?>
        <h2>4.1 / 4.2 (Création des tables)</h2>
        <?php
            $renault= array(
            'Twingo',
            'Clio',
            'Megane',
            'Laguna');
        
            $peugeot= array(
            '107',
            '207',
            '308',
            '508');
        
            $citroen= array(
            'C1',
            'C3',
            'C4',
            'C5');
        
            $volkswagen= array(
            'Lupo',
            'Polo',
            'Golf',
            'Passat');
        
            $array = array(
            'Renault' => $renault,
            'Peugeot' => $peugeot,
            'Citroen' => $citroen,
            'Volkswagen' => $volkswagen);
            ?>
        <h2>4.3</h2>
        <?php
        
            foreach($array as $key => $val){
                foreach($val as $val1){
                    echo "$val1 <br/><br/>";
                }
            }
            ?>
        <h2>4.4</h2>
        <?php
            echo "Tests des fonctions count(), explode(), implode(), str_split(), array_pop(),
array_push(), sort(), rsort(), arsort() <br/>";
            echo count($array);
            $array = str_split($msg,2);
            
            $stack = array("orange", "banana", "apple", "raspberry");
            $fruit = array_pop($stack);
            print_r($stack);
            
            $stack = array("orange", "banana");
            array_push($stack, "apple", "raspberry");
            print_r($stack);
        
            sort($peugeot);
            foreach ($peugeot as $key => $val) {
                echo "$key = $val<br/>";
            }
            rsort($peugeot);
            foreach ($peugeot as $key => $val) {
                echo "$key = $val<br/>";
            }
            $fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");
            arsort($fruits);
            foreach ($fruits as $key => $val) {
                echo "$key = $val<br/><br/>";
            }
        ?>
      <br/>
      <br/>
      <br/>
      <a href="../index.php"><img src="../Entypo+/Entypo+/arrow-bold-left.svg" height="25px" width="45px"/>Retour index</a>
   
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>