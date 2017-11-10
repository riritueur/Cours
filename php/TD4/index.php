<!DOCTYPE html>

<html lang="fr">
  <head>
   
        <?php
          function recupMarques(){
              $fichier = fopen('File/Voitures.txt', 'r+');
              $i=0;
              $marque = explode("\t", fgets($fichier));
              foreach($marque as $cle => $elem){
                  if($i % 2 == 0)
                      print $elem."\t";
                  $i++;
              }
          }

          function recupModeles(){
              $fichier = fopen('File/Voitures.txt', 'r+');
              $decal = fgets($fichier);
              $i = 0;
              while(($ligne = fgets($fichier)) != false){
                  $marque = explode("\t", $ligne);
                  echo '<br/>';
                  foreach($marque as $cle => $elem){
                      if($i % 2 == 0)
                          print $elem."\t";
                      $i++;
                  }
                  $i = 0;
              }
          }

          function recupPrixBorne($min, $max){
              $fichier = fopen('File/Voitures.txt', 'r+');
              $decal = fgets($fichier);
              $i = 0;
              while(($ligne = fgets($fichier)) != false){
                  $marque = explode("\t", $ligne);
                  echo '<br/>';
                  foreach($marque as $cle => $elem){
                      if($i % 2 == 1 && $elem >= $min && $elem <= $max)
                          echo $marque[$cle-1].'<br/>';
                      $i++;
                  }
                  $i = 0;
              }
          }

          function recupPrixMarque($min, $max, $marq){
              $fichier = fopen('File/Voitures.txt', 'r+');
              $decal = fgets($fichier);
              $list = explode("\t", $decal);
              $j = -1;
              foreach($list as $cle1 => $elem1){
                  if($elem1 == $marq)
                      $j = $cle1;
              }
              if($j != -1){
                  $i = 0;
                  while(($ligne = fgets($fichier)) != false){
                      $marque = explode("\t", $ligne);
                      echo '<br/>';
                      foreach($marque as $cle => $elem){
                          if($i % 2 == 1 && $elem >= $min && $elem <= $max && $cle-1 == $j)
                              echo $marque[$cle-1].'<br/>';
                          $i++;
                      }
                      $i = 0;
                  }
              }
          }

    ?>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

  </head>
  <body>
    
        <br/>
        <h1>TD4</h1>
        <br/>
        <br/>
        <?php $fichier = fopen('File/Voitures.txt', 'r+'); ?>
        <h1>1.1</h1>
        <p>Lecture du fichier</p>
        <?php
            $ligne = fgets($fichier);
            echo $ligne . '<br/>';
            $ligne = fgets($fichier);
            echo $ligne . '<br/>';
            $ligne = fgets($fichier);
            echo $ligne . '<br/>';
            $ligne = fgets($fichier);
            echo $ligne . '<br/>';
            $ligne = fgets($fichier);
            echo $ligne . '<br/>';
        ?>
        <h1>1.2</h1>
        <p>Récupération des marques</p>
        <?php
        recupMarques();
        ?>
        
        <h1>1.3</h1>
        <p>Récupération des modèles</p>
        <?php
        recupModeles();
        ?>
        
        <h1>1.4</h1>
        <p>Récupération des modèles dont le prix est entre 122 et 457 (à titre d'exemple)</p>
        <?php
        recupPrixBorne(122,457);
        ?>
        
        <h1>1.5</h1>
        <p>Récupération des modèles dont le prix est entre 122 et 1000 et appartenant à la marque Peugeot (à titre d'exemple)</p>
        <?php
        recupPrixMarque(122,1000,"Peugeot");
        ?>
        
        <h1>1.6</h1>
        <p>Récupération des modèles</p>
        <?php
        $fichier = fopen('File/Voitures.txt', 'r+');
        $decal = fgets($fichier);
        $vehicules = array();
        $i=0;
        $j=1;
        $marque = explode("\t", $decal);
        foreach($marque as $cle => $elem){
            if($i % 2 == 0)
                $vehicules[(($j)-1)/2] = $elem;
            $i++;
            $j++;
        }
        $modprix = array();
        $j = 0;
        $k = 0;
        while(($ligne = fgets($fichier)) != false){
            $i = 0;
            $marque = explode("\t", $ligne);
            foreach($marque as $cle => $elem){
                if($i % 2 == 0)
                    $modele = $elem;
                if($i % 2 == 1){
                    $prix = $elem;
                    $modprix[(($j)-1)/2] = array($modele => $prix);
                }
                $i++;
                $j++;
            }
            $vehicules[$k] = $modprix;
        }
        foreach($vehicules as $cle => $elem1){
            foreach($elem1 as $cle1 => $elem2){
                foreach($elem2 as $cle2 => $elem3){
                    echo $cle2.' '.$elem3.'<br/>';
            }   
            }
            echo '<br/>';
        }
        ?>
        
        <h1>2.1</h1>
        <form action="upload_file.php" method="post" enctype="multipart/form-data">
        <label for="file">Fichier 1 :</label>
        <input type="file" name="file" id="file" />
        <br />
            <label for="file">Fichier 2 :</label>
        <input type="file" name="file" id="file" />
        <br />
            <label for="file">Fichier 3:</label>
        <input type="file" name="file" id="file" />
        <br />
            <label for="file">Fichier 4:</label>
        <input type="file" name="file" id="file" />
        <br />
            <label for="file">Fichier 5:</label>
        <input type="file" name="file" id="file" />
        <br />
        <input type="submit" name="submit" value="Valider" />
        </form>
        
        <?php
        $array = array(
            "Renault" => array("Twingo" => 9999, "Clio"=>11999, "Megane"=>14999, "Laguna"=>17999), 
            "Peugeot" => array("107"=>145555, "207"=>14532, "308"=>142236, "508"=>111111), 
            "Citroen" => array("C1"=>78888, "C3"=>554, "C4"=>1123, "C5"=>5498), 
            "Volkswagen" => array("Lupo"=>214655, "Polo"=>14452, "Golf"=>357498, "Passat"=>149632));
            $fichier = fopen("Voituretable.csv","w+");
            foreach($array as $cle1 => $elem1){
                $marque = array($cle1);
                 fputcsv($fichier, $marque, ";");
                 foreach($elem1 as $modele => $prix){
                     $modele = array("", $modele, $prix);
                     fputcsv($fichier, $modele, ";");
                }
            }
        ?>
        
        
        <?php fclose($fichier); ?>
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