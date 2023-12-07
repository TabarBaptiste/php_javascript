// table_multiplication.js

// Déclaration et initialisation de la variable N
var userInput = prompt("Entrez un nombre pour N (par défaut, N = 9) :");
var N = userInput ? parseInt(userInput) : 9;

var tableHtml = '<table border="1">';
tableHtml += '<tr><th>Nombre</th><th>Résultat</th></tr>';

for (var i = 1; i <= 10; i++) {
    var resultat = N * i;
    tableHtml += '<tr><td>' + N + ' x ' + i + '</td><td>' + resultat + '</td></tr>';
}

tableHtml += '</table>';

document.getElementById('table-container').innerHTML = tableHtml;
