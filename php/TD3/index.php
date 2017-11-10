<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../css/bootstrap.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>
    <h1>TD3</h1>
     
      <section>

              <p>Veuillez renseigner vos coordonnées (les champs * sont obligatoires)</p>

              <form method="post">

                  <label >Nom *<input name="nom" type="text" required="" placeholder="Ex : Peres" class="margeF"></label>
                <br/>

                  <label >Prenom *<input name="prenom" type="text" required="" placeholder="Ex : Richard" class="margeF"></label>
                    <br/>
                  <label >Mail *<input name="mail" type="email" required="" placeholder="Ex : mlg420@blaze.it" class="margeF"></label>

                    <br/>
                  <label >Téléphone *<input name="telephone" type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" placeholder="Ex : 0612345678" class="margeF"></label>
                    <br/>

                  <label >Mot de passe *<input name="mdp" type="password" required="" class="margeF"></label>
                    <br/>

                  <label >Confirmation mot de passe *<input name="mdp2" type="password" required="" class="margeF"></label>
                    <br/>
                    
                  <label >Abonnement</label>
                  <select>
                      <option value="Free">Free</option>
                      <option value="Prenium">Prenium</option>
                      <option value="Ultimate">Ultimate de la mort qui tue</option>
                      <option value="Mashallah">True Survivor</option>  
                  </select>
                    <br/>
                    <br/>
                  <label >Voulez vous recevoir la newsletter du site de l'impossible ?</label>
                  <input class="choix" name="liste" type="checkbox">
                  <input type="submit" value="Valider">
                  <input type="reset" value="Effacer">

                </form>
                <h1><a href="forms.php"><img src="../Entypo+/Entypo+/arrow-bold-right.svg" height="45px" width="65px"/>Exercice 2</a></h1> 
            
        </section>
      
      
      <a href="../index.php"><img src="../Entypo+/Entypo+/arrow-bold-left.svg" height="25px" width="45px"/>Retour index</a>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>