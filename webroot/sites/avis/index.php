<?php
    session_save_path('php/sessions');
    ini_set('session.gc_probability', 1);
    session_start();
    
	include('php/includes/help_connexion.php');
	include('php/includes/help_verif.php');

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Commentaire</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="css/mdb.css" rel="stylesheet">
        <!-- Your custom styles (optional) -->
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <?php
        
//////////NAV
          include_ONCE 'php/includes/include_nav.php';
//////////Write article
          if(isset($_SESSION['login']) && !empty($_SESSION['login'])){
              include_ONCE 'php/includes/include_write_article.php';
          }
//////////Affiche article
          include_ONCE 'php/includes/include_affiche_article.php';
//////////Footer
          include_ONCE 'php/includes/include_footer.php';
//////////Script
          include_ONCE 'php/includes/include_script.php';
        ?>
        <script type="text/javascript">
            <?php if(isset($_SESSION['login']) && !empty($_SESSION['login'])){ ?>
            var session = "<?php echo $_SESSION["login"]; ?>";
            if(session != ""){
                //
                //
                /////////////////////// NB MAX
                //
                //
                var maxChr = 255; // limite max fixée 
                var maxChr2 = 45; // limite max fixée 
                function ID(i) {
                    return document.getElementById(i)
                }
                function red(nbrChr) {
                    return Math.round(255 * Math.pow(0.977, maxChr - nbrChr))
                }
                function red2(nbrChr2) {
                    return Math.round(255 * Math.pow(0.977, maxChr2 - nbrChr2))
                }
                function countChr() {
                    var len = ID('resume').value.length;
                    var len2 = ID('titre_article').value.length;
                    if (maxChr < len) {
                        ID('resume').value = ID('resume').value.substr(0, maxChr);
                        len = maxChr;
                    }  
                    if (maxChr2 < len2) {
                        ID('titre_article').value = ID('titre_article').value.substr(0, maxChr2);
                        len2 = maxChr2;
                    }
                    ID('cnt2').innerHTML = '<small><span style="color:rgb(' + red(len) + ',67,54)">' + len + ' caractère' + (1 < len ? 's' : '') + '</span> / ' + maxChr +'</small>';
                    ID('cnt').innerHTML = '<small><span style="color:rgb(' + red2(len2) + ',67,54)">' + len2 + ' caractère' + (1 < len2 ? 's' : '') + '</span> / ' + maxChr2 +'</small>';
                };
                (function () {
                    ID('resume').onkeyup = countChr;
                    ID('titre_article').onkeyup = countChr;
                    countChr();
                })();
                //
                //
                /////////////////////// SATISFACTION
                //
                //
                var rangeSlider = function(){
                  var slider = $('.range-slider'),
                      range = $('.range-slider__range'),
                      value = $('.range-slider__value'),
                      valueRange = document.getElementById("valueRange");

                  slider.each(function(){
                    value.each(function(){
                      var value = $(this).prev().attr('value');
                      $(this).html(value);
                    });

                    range.on('input', function(){
                      var color = valueRange.innerHTML;
                      color = Math.round(color*2.58+20);
                      var rouge = color - 255;
                      var vert = Math.round(color*0.78+20);
                      var blue = Math.round(color*0.31+20);

                      $(this).next(value).html(this.value);
                      $(value).css("background","rgb(" + Math.abs(rouge)  + ", " + Math.abs(vert)  + " , " + Math.abs(blue)  + ")");
                      $('<style>.range-slider__value::after{border-right:7px solid rgb('+ Math.abs(rouge)+ ','+ Math.abs(vert)+ ','+ Math.abs(blue)+ ')}</style>').appendTo('head');
                    });
                  });
                };
                rangeSlider();   
            }
            <?php } ?>
            
            

            
            
            
            
        </script>
    </body>
</html>