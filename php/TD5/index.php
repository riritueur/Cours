<!DOCTYPE html>

<?php
    function creatTable(){
      $array = scandir(".");
      $files = array();

      foreach($array as $elem){
        $files[$elem] = filesize($elem);
      }
      print_r($files);
      echo '<br/>';
    }

    function changeMod($path, $perm){
        chmod($path, $perm);
      echo sprintf('%o', fileperms($path)); // TODO
    }


    function listerFichiersExt($path, $ext){
        $array = scandir($path);
        $ret = array();
        foreach($array as $elem){
            if(preg_match('#.'.$ext.'#', $elem))
                array_push($ret,$elem);
        }
        print_r($ret);
        echo '<br/>';
    }

    
?>


<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

  </head>
  <body>
    
        <br/>
        <h1>TD5</h1>
        <br/>
        <br/>
        <h1>1.1</h1>
        <p>Fonctions de manipulation des répertoires:</p>
        <p>Créer un répertoire: mkdir<br/>Renommer un répertoire: rename<br/>Supprimer un répertoire: rmdir</p>
                
        <?php mkdir("test",0755); ?>
        <?php rename("test","testeu"); ?>
        <?php rmdir("testeu"); ?>
        
        <p>mkdir échoue si le dossier existe déjà ou si les permissions ne permettent pas la création de dossier. Pour cela, on peut utiliser chmod pour obtenir les droits.</p>
        
        <h1>1.2</h1>
        <?php listerFichiersExt(".", "txt");?>
        
        <h1>1.3</h1>
        <?php creatTable(); ?>
        
        <h1>1.4</h1>
        <?php changeMod("test.txt", 0700); ?>
        <br/>
        
        <h1>2.1</h1>
        
        // TODO
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