function addData() {
    // Récupération des données du formulaire
    var name = $("#name").val();
    var type = $("#type").val();
    var formula = $("#formula").val();
    var comment = $("#comment").val();
    var description = $("#description").val();

    // Envoi des données via une requête Ajax à la page de traitement PHP
    $.ajax({
        url: "add_data.php",
        type: "POST",
        data: {
            name: name,
            type: type,
            formula: formula,
            comment: comment,
            description: description
        },
        success: function(response) {
            // Recharge la page pour afficher la nouvelle donnée
            location.reload();
        },
        error: function(xhr, status, error) {
            // Affiche une erreur si la requête a échoué
            alert("Une erreur est survenue lors de l'ajout de la donnée.");
        }
    });
}