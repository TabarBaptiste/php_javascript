function activerBouton() {
    var caseACocher = document.getElementById("caseACocher");
    var boutonValider = document.getElementById("boutonValider");

    // Activer le bouton si la case est cochée, sinon le griser
    boutonValider.disabled = !caseACocher.checked;

    // Appliquer le style en conséquence
    boutonValider.className = caseACocher.checked ? "" : "grise";
}

function validerFormulaire() {
    var caseACocher = document.getElementById("caseACocher");

    // Vérifier si la case est cochée avant de soumettre le formulaire
    if (!caseACocher.checked) {
        alert("Veuillez cocher la case avant de valider le formulaire.");
        return false; // Empêche la soumission du formulaire
    }

    // Autres validations ou traitement ici si nécessaire

    return true; // Permet la soumission du formulaire
}
