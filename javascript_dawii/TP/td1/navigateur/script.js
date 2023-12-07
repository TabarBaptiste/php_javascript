function afficherPropriete(nom, valeur) {
    var infoElement = document.getElementById('resultat');
    
    // Afficher la propriété spécifiée
    infoElement.innerHTML = nom + " : " + valeur;
}