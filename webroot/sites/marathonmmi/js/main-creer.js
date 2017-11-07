$(document).ready(function() {
    // click sur add img
    $('.addImg').on('click', function(event) {
        event.preventDefault();
        var nbAddImg = 1;
        $('article.ajoutImg').each(function(){
            nbAddImg ++;
        });
        var addImg = '<article class="ajout ajoutImg"><div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h2>Image n°'+nbAddImg+'</h2><div class="btnFile"><span>Choisissez votre fichier</span><input type="file" class="imgHistoire" id="fileBox'+nbAddImg+'" name="imgHistoire'+nbAddImg+'"></div><div class="inputPathFile"><input type="text" class="inputPathFileValidate" id="validate'+nbAddImg+'" disabled/></div><textarea type="text" id="descriptionIMGHistoire'+nbAddImg+'" placeholder="Partie '+nbAddImg+' de votre texte" name="descriptionIMGHistoire'+nbAddImg+'"></textarea><div class="divArrow"><div class="arrow"><i class="fa fa-arrow-up" id="aUp'+nbAddImg+'" aria-hidden="true"></i><br><i class="fa fa-arrow-down" id="aDown'+nbAddImg+'" aria-hidden="true"></i></div></div></div></div></article><hr>';
        if (nbAddImg <= 12) {
            $('.nbImg').html(nbAddImg);
            $('#creer form').append(addImg);
            $('.ajoutImg').slideDown(400);
            $('#descriptionIMGHistoire'+nbAddImg).focus();
            setTimeout(function () {
            }, 400);
        }else {
            $('.txtVariable').html('Vous ne pouvez plus ajouter d\'images');
        }
    });
    //focus IN textarea img
    $('body').on('focusin', '.ajoutImg textarea', function(event) {
        var parentTag = $(this).parent().get( 0 );
        $('.overlay-focus').fadeToggle('400');
        $(parentTag).css('zIndex', '9999999');
        $('.divAdd').css('zIndex', '9999999');
    });
    //focus OUT textarea img
    $('body').on('focusout', '.ajoutImg textarea', function(event) {
        var parentTag = $(this).parent().get( 0 );
        $('.overlay-focus').fadeToggle('400');
        setTimeout(function () {
            $(parentTag).css('zIndex', '1');
            $('.addImg').css('zIndex', '1');
        }, 350);
    });
     // Quand type file change => met ça value dans le type text
    $('body').on('change', '.imgHistoire', function() {//parcourt tous les input file
        var cmp = 1;
        $('.imgHistoire').each(function(index, el) { // Look chaque type file et met ça value dans le input text
            var valueFile = $(el).val().replace(/C:\\fakepath\\/i, '');
            var fileBox = $('#fileBox'+cmp).parent();
            $('#validate'+cmp).attr('value', valueFile);
                if ($('#validate'+cmp).val() !== '') {// si l'input a une value => change de couleur
                    $($('#validate'+cmp)).css({ //input txt
                            'box-shadow': '0 1px 0 #2ecc4f',
                            'border-bottom': '1px solid #2ecc4f',
                            'color': '#2ecc4f',
                    });
                    $(fileBox).css({ //input fileBox
                        'background': '#2ecc4f',
                        'color': 'white',
                    });
                }else{
                        $('#validate'+cmp).attr('value', 'Il manque une image');
                        $('#validate'+cmp).css('color', '#ee3728');
                        $(fileBox).css({ //input fileBox
                            'background': '#ee3728',
                            'color': 'white',
                        });
                }
            cmp++;
        });
    });
    // click sur les petites flèches
    var divTop = $('.divAdd').offset().top;
    var divAddHeight = $('.divAdd').height()+40;
    var divAddBtnLeft = $('.divAddBtn').offset().left;
    var envoyerHistoireRight = $(window).width() - $('.envoyerHistoire').offset().right;
$( document ).on( "scroll", function( event ) {
    var windowTop = $(window).scrollTop();
    console.log('w = '+windowTop+' div = '+ divTop);
$('html').css('margin-top', 'divAddBtnWidth');
    if (windowTop > divTop) {
        $('.divAdd').css({ // DIV
            'position': 'fixed',
            'top': 0,
            'left': 0,
            'right': 0,
            'padding-left': divAddBtnLeft,
            'padding-top': '10px',
            'padding-bottom': '10px',
            'display': 'block',
            'color': '#fff',
            'background': '#088df6',
        });
        $('.addImg').css({ // (+)
            'background': '#fff',
            'color': '#088df6',
        });
        $('input.btn.envoyerHistoire').css({ //BTN ENVOYER
            'background': 'white',
            'color': '#088df6',
            'margin-right' : envoyerHistoireRight,
        });
        $('body').css({ //BTN ENVOYER
            'margin-top': divAddHeight,
        });
    }else {
        $('.divAdd').css({ // DIV
            'position': 'relative',
            'padding-left': 0,
            'display': 'block',
            'color': '#000',
            'background': 'transparent',
        });
        $('.envoyerHistoire').css({ //BTN ENVOYER
            'background': '088df6',
            'color': 'white',
            'margin-right' : 0,
        });
        $('.addImg').css({ // (+)
            'background': '#088df6',
            'color': 'white',
        });
        $('.envoyerHistoire').css({ //BTN ENVOYER
            'background': '#088df6',
        });
        $('body').css({ //BTN ENVOYER
            'margin-top': 0,
        });
    }
});
    $('body').on('click', '.fa', function(event) {
        event.preventDefault();
        var idArrow = ($(this).attr('id'));
        $('#creer form').append(addImg);
    });
});
