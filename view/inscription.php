<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="../ressources/css/generalCss.css">
    <link rel="stylesheet" type="text/css" href="../ressources/css/inscription.css">
</head>

<body>
    <h1> Inscription </h1>
    <div id="divForm">
    <form id='form' method="post" action=".php" onsubmit="return valideFormulaire(this)">
			<label>Adresse mail</label>
                <input type="email" name='mail' >
        
            <label>Pseudo</label>
            	<input type="text" name='pseudo' >
        
            <p class="erreurs" id="erreurs"></p>
            <label>Mot de passe</label>
            <input type="password"  name="motdepasse" placeholder="Saisissez le mot de passe" id="motdepasse" onkeyup ="motDePasseConforme(this.form)" onblur ="motDePasseCorrespondant(this.form)"  >
            <label>Confirmation du mot de passe</label>
            <input type="password" name="motdepasse2" placeholder="Confirmez le mot de passe" id="motdepasse2" onblur ="motDePasseCorrespondant(this.form)">
            <input type="image" src="../ressources/images/mdp.png"id="masque" title="Masquer/demasquer le mot de passe pour vérifier" onclick="affichageMotDePasse()">

            
            <br>
            <input type="checkbox"  id="accept" name="accept"> <label for="accept">J'accepte les conditions générales</label>
            <br>
        
            <input id="inscription" type="submit" value="S'inscrire >">
        
            
                
    </form>
    </div>
    <script type="text/javascript" src="../ressources/js/inscription.js">
             
    </script>
</body>
</html>