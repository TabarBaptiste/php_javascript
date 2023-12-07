document.addEventListener("DOMContentLoaded", function () {
    afficherTablesMultiplication();
});

function afficherTablesMultiplication() {
    var tablesMultiplication = document.getElementById('tablesMultiplication');
    var tablesHtml = '';

    for (var i = 1; i <= 10; i++) {
        tablesHtml += table_mult(i);
    }

    tablesMultiplication.innerHTML = tablesHtml;
}

function table_mult(N) {
    var tableHtml = '<h2>Table de multiplication pour ' + N + '</h2>';
    tableHtml += '<table>';
    for (var i = 1; i <= 10; i++) {
        tableHtml += '<tr><td>' + N + ' x ' + i + '</td><td>=</td><td>' + (N * i) + '</td></tr>';
    }
    tableHtml += '</table>';

    return tableHtml;
}
