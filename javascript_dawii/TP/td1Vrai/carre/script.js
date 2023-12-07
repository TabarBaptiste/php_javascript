// Définition de la fonction sans paramètre pour calculer le carré
function carreSansParametre() {
    var nombre = parseInt(prompt("Entrez un nombre pour calculer son carré :"));
    if (!isNaN(nombre)) {
        var carre = nombre * nombre;
        alert("Le carré de " + nombre + " est : " + carre);
    } else {
        alert("Veuillez entrer un nombre valide !");
    }
}

// Définition de la fonction avec paramètre pour calculer le carré
function carreAvecParametre(nombre) {
    if (!isNaN(nombre)) {
        var carre = nombre * nombre;
        return carre;
    } else {
        return "Veuillez entrer un nombre valide !";
    }
}

function calculerEtAfficher() {
    var inputElement = document.getElementById("inputNombre");
    var nombre = parseInt(inputElement.value);
    var resultat = carreAvecParametre(nombre);
    if (!isNaN(resultat)) {
        alert("Le carré de " + nombre + " est : " + resultat);
    } else {
        alert(resultat);
    }
}