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
    
        <br/>
        <h1>TD2</h1>
        <br/>
        <br/>
        <h2>1.1</h2>
        <br/>
        <p>Afficher le nombre de mot dans la phrase : "Un deux trois quatre" :<br/></p>
            <?php
                $txt = "Un deux trois quatre";
                $array = explode(' ', $txt);
                //$array = array_filter($array, 'empty');
                echo count($array);
            ?>
        <br/>
        <br/>
      
        <h2>1.2</h2>
        <br/>
        <p>Afficher le nombre de mot dans la phrase : "Un deux trois quatre. Cinq six sept huit. Neuf." :<br/></p>
            <?php
                $txt = "Un deux trois quatre. Cinq six sept huit. Neuf.";
                $array = explode('.', $txt);
                echo count($array)-1;
            ?>
        <br/>
        <br/>
      
        <h2>1.3</h2>
        <br/>
        <p>Inverser les mots de la phrase :"Un deux trois quatre" :<br/></p>
            <?php
                $txt = "Un deux trois quatre";
                $tab2= array();
                $tab= array();
                $tab = explode(" ", $txt);
                for($i=count(explode(" ", $txt));$i!=0;$i--){
                    array_push($tab2,$tab[$i-1]);
                };
                print_r($tab2) ;
            ?>
        <br/>
        <br/>
        
        <h2>1.4</h2>
        <br/>
        <p>Inverser les mots de la phrase :"Un deux trois quatre" :<br/></p>
            <?php
                echo "Nous n'avons pas trouvé la réponse à cette question."            
        ?>
        <br/>
        <br/>
      
        <h2>1.5</h2>
        <br/>
        <p>Génération mot de passe de 4 lettres et 4 chiffres à partir d'un nom : "totoro"<br/></p>
            <?php
                $nom = "totoro";
                $spt = "" ;
                for($i=0; $i<4; $i++)
                    $spt .= $nom[rand(0, strlen($nom)-1)];            

                for($j=0; $j<4; $j++)
                    $spt .=  strval(rand(0, 9));
                echo '<strong>' . $spt . '</strong>';
            ?>
        <br/>
        <br/>
      
        <h2>2.1</h2>
        <br/>
        <p>Création d'une variable globale :<br/></p>
            <?php
                function test() {
                $g = "variable locale";

                    echo '$g dans le contexte global : ' . $GLOBALS['g'] . "<br/>";
                    echo '$g dans le contexte courant : ' . $g . "<br/>";
                }
      
                test();
            ?>
        <br/>
        <br/>
      
        <h2>2.2 et 2.3</h2>
        <br/>
        <p>Affichage variables d'environnement ==> <a href="env.php">Exercice sur les variables</a></p>
        
        <br/>
        <h2>3</h2>
        <br/>
            <?php
                echo "Bonjour nous sommes le " . date('l jS \of F Y h:i:s A');
                echo date('Y m w');
                echo date('h:i:s');
            ?>
        <br/>
            <?php
                echo date("l jS \of F Y h:i:s A", mktime(12, 12, 12, 1, 1, 2012));
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