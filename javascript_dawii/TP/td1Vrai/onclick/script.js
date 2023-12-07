function afficherTable() {
    var inputNombre = document.getElementById("nombre");
    var nombre = parseInt(inputNombre.value);

    var resultatZone = document.getElementById("resultat");
    resultatZone.value = "";

    if (!isNaN(nombre)) {
        for (var i = 1; i <= 10; i++) {
            var ligne = nombre + " x " + i + " = " + (nombre * i) + "\n";
            resultatZone.value += ligne;
        }
    } else {
        resultatZone.value = "Veuillez entrer un nombre valide !";
    }
}