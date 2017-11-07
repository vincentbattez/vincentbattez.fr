$(document).ready(function() {
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////SCROLL ANCRE
    $('.js-scrollTo').on('click', function() { // Au clic sur un élément
        var page = $(this).attr('href'); // Page cible
        var speed = 750; // Durée de l'animation (en ms)
        $('html, body').animate({
            scrollTop: $(page).offset().top - 60
        }, speed); // Go
        return false;
    });
////////////////////////////////////////////////////////////////////////////////////////////////////////////////// BTN CLICK SUR RESERVER
    $('#exitReserver, div#opacity').on('click', function() {
        $('#reserverAll').fadeOut(300);
    });
    $('#btnReserver').on('click', function() {
        $('#reserverAll').fadeIn(300);
    });
////////////////////////////////////////////////////////////////////////////////////////////////////////////////// BTN CLICK SUR SUPPRIMER
    $('body').on('click','#exitReserver, div#opacity, .btn-retour', function() {
        $('#containerSupprimer').fadeOut(300).remove();
    });
    $('.suppArticleID').on('click', function() {
        var idOeuvre = $(this).attr('id');
        var suppOeuvre = 'idOeuvre='+idOeuvre+'';
        var DivSupprimer = '<div class="container-fluid" id="containerSupprimer"> <div class="row" id="divReserver"> <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 flex-center"> <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-center z-depth-2" id="contentReserver"> <span id="exitReserver"></span> <h3 class="m-t-1">Voulez-vous vraiment supprimer l\'oeuvre ?</h3> <hr> <div class="divSupprimer"> <button class="btn btn-principal btn-retour" role="button">retour</button> <a href="../php/traitement/effacer.php?'+suppOeuvre+'" class="lienSupp"><button class="btn btn-principal btn-supprimer" role="button">Supprimer</button></a> </div> </div> <div id="opacity"></div> </div> </div> </div>';
        $('body').append(DivSupprimer);
        $('#containerSupprimer').fadeIn(300);
    });

    $('.suppMusiqueID').on('click', function() {
        var idOeuvre = $(this).attr('id');
        var suppOeuvre = 'idMusique='+idOeuvre+'';
        var DivSupprimer = '<div class="container-fluid" id="containerSupprimer"> <div class="row" id="divReserver"> <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 flex-center"> <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-center z-depth-2" id="contentReserver"> <span id="exitReserver"></span> <h3 class="m-t-1">Voulez-vous vraiment supprimer l\'oeuvre ?</h3> <hr> <div class="divSupprimer"> <button class="btn btn-principal btn-retour" role="button">retour</button> <a href="../php/traitement/removeMusique.php?'+suppOeuvre+'" class="lienSupp"><button class="btn btn-principal btn-supprimer" role="button">Supprimer</button></a></div></div> <div id="opacity"></div> </div></div></div>';
        $('body').append(DivSupprimer);
        $('#containerSupprimer').fadeIn(300);
    });


    $('.suppEvenementID').on('click', function() {
        var idOeuvre = $(this).attr('id');
        var suppOeuvre = 'idEvenement='+idOeuvre+'';
        var DivSupprimer = '<div class="container-fluid" id="containerSupprimer"> <div class="row" id="divReserver"> <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 flex-center"> <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-center z-depth-2" id="contentReserver"> <span id="exitReserver"></span> <h3 class="m-t-1">Voulez-vous vraiment supprimer l\'évenement ?</h3> <hr> <div class="divSupprimer"> <button class="btn btn-principal btn-retour" role="button">retour</button> <a href="php/traitement/removeEvenement.php?'+suppOeuvre+'" class="lienSupp"><button class="btn btn-principal btn-supprimer" role="button">Supprimer</button></a></div></div> <div id="opacity"></div> </div></div></div>';
        $('body').append(DivSupprimer);
        $('#containerSupprimer').fadeIn(300);
    });

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////// Modif musique
    $('#musique .modifiArticle').on('click', function(event) {
        event.preventDefault();
        var idMusique = $(this).attr('id');
        var title = $('#mu'+idMusique+ ' h4');
        var auteur = $('#mu'+idMusique+ ' h4 strong').html();
        var titre = $('#mu'+idMusique+ ' h4 span').html();
        console.log(auteur);
        console.log(titre);
        $(title).fadeOut('400', function() {$(this).remove();});
        setTimeout(function () {
            $(title).after('<form action="../php/traitement/modifMusique.php" method="post"><div class="modifMusiqueDiv"><input type="text" name="modifi_auteur" class="modifMusique" placeholder="Auteur" value="'+auteur+'"> <input type="text" name="modifi_titre" class="modifMusique" placeholder="Titre" value="'+titre+'"> <input type="submit" class="btn btn-primary modifMusiqueBtn" name="btnModifier"><input type="hidden"name="idMusique" value="'+idMusique+'"></div></form>');
            $('#mu'+idMusique+' .modifMusiqueDiv').css('display', 'none');
            $('#mu'+idMusique+' .modifMusiqueDiv').fadeIn('400');
        }, 300);
    });
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////// Modif EVENEMENT
    $('#evenement .modifiArticle').on('click', function(event) {
        event.preventDefault();
        var idEvenement = $(this).attr('id');
        var title = $('#ev'+idEvenement+ ' h3');
        var date = $('#ev'+idEvenement+ ' h3 small').html();
        var texte = $('#ev'+idEvenement+ ' p').html();
        var titre = $('#ev'+idEvenement+ ' h3 span').html();
        $(title).fadeOut('400', function() {$(this).remove();});
        $('#ev'+idEvenement+ ' p').fadeOut('400', function() {$(this).remove();});
        setTimeout(function () {
            $(title).after('<form action="php/traitement/modifEvenement.php" method="post"><div class="modifEvenementDiv"><input type="text" name="modifi_titre" class="modifMusique" placeholder="titre" value="'+titre+'"> <input type="text" name="modifi_date" class="modifMusique" placeholder="date" value="'+date+'"> <br> <textarea type="text" name="modifi_texte" class="md-textarea" placeholder="Description">'+texte+'</textarea><input type="submit" class="btn btn-primary modifMusiqueBtn" name="btnModifier"><input type="hidden"name="idEvenement" value="'+idEvenement+'"></div></form>');
            $('#ev'+idEvenement+' .modifEvenementDiv').css('display', 'none');
            $('#ev'+idEvenement+' .modifEvenementDiv').fadeIn('400');
        }, 300);
    });

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// NB CARACTERE
    $('#propos').on('keyup', function(event) {
        event.preventDefault();
        var value = document.getElementById("propos").value;
        var nbCaractere = value.length;
        var nbMax = 255;
        $('.nbCaractere').html(nbCaractere);
        if (nbCaractere > nbMax) {
            var htmlFinal = value.substr(0, nbMax);
            $('#propos').val(htmlFinal);
        }
        $('.compteur').css('color', 'rgb('+nbCaractere+',0,0)');

    });
}); // FIN DU SCRIPT
