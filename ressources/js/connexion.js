/*function isPasswordValid() {
    var text = "";
    var password = document.getElementById("password");
    if (password.value.length < 8){
        text += "Le mot de passe est trop court. " + "<br>" + "Il doit contenir au moins 8 caractères avec une majuscule, un chiffre et un caractère spécial au moins !" + "<br>";
    }

    if (password.value.search("[A-Z]") == -1) {
        text += " Il manque une majuscule." + "<br>";
    }
    if (password.value.search("[a-z]") == -1) {
        text += " Il manque une minuscule." + "<br>";
    }
    if (password.value.search("[0-9]") == -1) {
        text += " Il manque un chiffre." + "<br>";
    }
    if (password.value.search("[?+.*&!,$/:]") == -1) {
        text += " Il manque un caractère spécial." + "<br>";
    }
    if (password.value.search("[ ]") != -1) {
        text += " Votre mot de passe ne doit pas contenir d'espaces." + "<br>";
    }

    document.getElementById('erreurs').innerHTML = text;
}*/

/*function show() {
    var mdp = document.getElementById('motdepasse');
    mdp.setAttribute('type', 'text');
}

function hide() {
    var mdp = document.getElementById('motdepasse');
    mdp.setAttribute('type', 'password');
}*/

function displayPassword() {
    var mdp = document.getElementById('motdepasse');
    if (mdp.getAttribute("type") == "password") {
        mdp.setAttribute('type', 'text');
    } else {
        mdp.setAttribute('type', 'password');
    }
}

function areAllFieldsCompleted() {
    var isComplete = true;
    var text = "";
    var password = document.getElementById("motdepasse").value;
    var login = document.getElementById("login").value;
    event.preventDefault();
    if (!login) {
        text += "Vous devez renseigner votre login. Il s'agit de l'adresse mail renseignée lors de votre inscription" + "\n" + "\n";
        isComplete = false;
    }
    if (!password) {
        text += "Vous devez renseigner votre mot de passe.";
        isComplete = false;
    }
    alert(text);
}