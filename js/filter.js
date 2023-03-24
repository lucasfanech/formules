// Description: Filtre les lignes d'un tableau en fonction de la valeur saisie dans une barre de recherche
    $(document).ready(function() {
    // Ecouteur d'événements pour la barre de recherche
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        // Boucle sur toutes les lignes du tableau
        $("table tbody tr").filter(function() {
            // Récupération des colonnes à filtrer
            var columns = $(this).find("td");
            // Boucle sur les colonnes pour vérifier si elles contiennent la valeur recherchée
            for (var i = 0; i < columns.length; i++) {
                var columnText = $(columns[i]).text().toLowerCase();
                if (columnText.indexOf(value) > -1) {
                    // Mettre en gras les caractères de la colonne correspondant à la recherche
                    var startIndex = columnText.indexOf(value);
                    var endIndex = startIndex + value.length;
                    var highlightedText = "<span style='font-weight:bold'>" + columnText.substring(startIndex, endIndex) + "</span>";
                    var newText = columnText.substring(0, startIndex) + highlightedText + columnText.substring(endIndex, columnText.length);
                    $(columns[i]).html(newText);
                    return false;
                }
            }
            // Si aucune colonne ne contient la valeur recherchée, on cache la ligne
            return true;
        }).hide();
        // Affichage des lignes correspondant à la recherche
        $("table tbody tr").filter(function() {
            var columns = $(this).find("td");
            for (var i = 0; i < columns.length; i++) {
                var columnText = $(columns[i]).text().toLowerCase();
                if (columnText.indexOf(value) > -1) {
                    return true;
                }
            }
            return false;
        }).show();
    });
});
