document.addEventListener("DOMContentLoaded", function() {
    var boutonCalculer = document.getElementById("calculerBtn");

    boutonCalculer.addEventListener("click", function() {
        calculerCarre();
    });

    function calculerCarre() {
        var nombre = document.getElementById("inputNombre").value;
        
        if (!isNaN(nombre)) {
            var carre = nombre * nombre;
            document.getElementById("resultat").innerHTML = "Le carré de " + nombre + " est : " + carre;
        } else {
            document.getElementById("resultat").innerHTML = "Veuillez entrer un nombre valide.";
        }
    }
});
