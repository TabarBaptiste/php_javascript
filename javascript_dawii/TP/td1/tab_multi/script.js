document.addEventListener("DOMContentLoaded", function () {
    var tableMultiplication = document.getElementById('tableMultiplication');

    // Utilisation de prompt pour demander la valeur par défaut (9)
    var inputMultiple = prompt("Entrez le nombre pour la table de multiplication (par défaut: 9)", "9");
    if (inputMultiple !== null && !isNaN(inputMultiple)) {
        afficherTableMultiplication(parseInt(inputMultiple));
    } else {
        // Si l'utilisateur annule ou entre une valeur non valide, afficher un message
        tableMultiplication.innerHTML = "Valeur non valide. Utilisez le formulaire pour entrer un nombre.";
    }

    var form = document.querySelector('form');
    form.addEventListener('submit', function (event) {
        event.preventDefault();

        var inputMultiple = document.getElementById('inputMultiple').value;
        if (!isNaN(inputMultiple)) {
            afficherTableMultiplication(parseInt(inputMultiple));
        } else {
            tableMultiplication.innerHTML = "Veuillez entrer un nombre valide.";
        }
    });

    function afficherTableMultiplication(multiple) {
        var tableHtml = '<h2>Table de multiplication pour ' + multiple + '</h2>';
        tableHtml += '<table>';
        for (var i = 1; i <= 10; i++) {
            tableHtml += '<tr><td>' + multiple + ' x ' + i + '</td><td>=</td><td>' + (multiple * i) + '</td></tr>';
        }
        tableHtml += '</table>';
        tableMultiplication.innerHTML = tableHtml;
    }
});
