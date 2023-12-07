function afficherURL() {
    var resultat = document.getElementById("resultat");
    resultat.innerHTML = "URL du navigateur : " + document.location.href;
}

function afficherNomNavigateur() {
    var resultat = document.getElementById("resultat");
    resultat.innerHTML = "Nom du navigateur : " + navigator.appName;
}

function afficherVersionNavigateur() {
    var resultat = document.getElementById("resultat");
    resultat.innerHTML = "Version du navigateur : " + navigator.appVersion;
}

function afficherNomCodage() {
    var resultat = document.getElementById("resultat");
    resultat.innerHTML = "Nom de codage du navigateur : " + navigator.appCodeName;
}

function afficherUserAgent() {
    var resultat = document.getElementById("resultat");
    resultat.innerHTML = "User Agent du navigateur : " + navigator.userAgent;
}

function afficherPlatform() {
    var resultat = document.getElementById("resultat");
    resultat.innerHTML = "Plateforme du navigateur : " + navigator.platform;
}
