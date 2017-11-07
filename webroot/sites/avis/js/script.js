//$(document).ready(function(){
    //
    //
    /////////////////////// ROTATION FA "ECRIRE ARTICLE"
    //
    //
    var ecrireOpen = false;
    $(".articleDiv h2").click(function() {

        if(ecrireOpen == false){
            ecrireOpen = true;
            $(".fa-caret-down").css("transform", "rotate(0deg)");
        }
        else{
            $(".fa-caret-down").css("transform", "rotate(-90deg)");
            ecrireOpen = false;
        }
    });
    //
    //
    /////////////////////// AJOUT INPUT POSITIF
    //
    //
    var plein = false;
    var y = 0;
    var positifContent = document.getElementsByClassName("classPositif" + y)[0];
    function positifFunc() {
        if (this.value == "") {
        }
        if (positifContent.value == "") {
            plein = false;
        } else {
            if (plein == false && y < 4) {
                y = y + 1;
                $(".divPositif > .div-positif:last-child").after(
                    '<div class="md-form div-positif"> <div class="icon-cercle" id="icon-positif"> <i class="fa fa-plus"></i> </div> <input type="text" class="md-textarea classPositif' + y + '" id="positif" name="review_goods[]" placeholder="Positif" name="review_goods[]" onchange="positifFunc()"></input> </div>'
                );
                plein = false;
            }
            $(positifContent).addClass("positif-full");
        }
        positifContent = $(".divPositif input")[y];
    }
    //
    //
    /////////////////////// AJOUT INPUT NEGATIF
    //
    //
    var plein2 = false;
    var z = 0;
    var negatifContent = document.getElementsByClassName("classNegatif" + z)[0];
    function negatifFunc() {
        negatifContent = document.getElementsByClassName("classNegatif" + z)[0];
        if (negatifContent.value == "") {
            plein2 = false;
        } else {
            if (plein2 == false && z < 4) {
                z = z + 1;
                $(".div-negatif:last-child").after(
                    '<div class="md-form div-negatif"> <div class="icon-cercle" id="icon-negatif"> <i class="fa fa-minus"></i> </div> <input type="text" class="md-textarea classNegatif' + z + '" id="negatif" placeholder="Négatif" name="review_bad[]" onchange="negatifFunc()"></input> </div>'
                );
                plein = false;
            }
            $(negatifContent).addClass("negatif-full");
        }
        negatifContent = $(".divNegatif input")[z];
    }
    //
    //
    /////////////////////// NOTE SUR ARTICLE (couleur)
    //
    //
    var note_value = document.getElementsByClassName("note_value");
    var cmp = 0;
    for (var i = 0; i < note_value.length; i++) {
        cmp +=1;
        var noteI = "note" +cmp;
        var color = note_value[i].innerHTML;
        color = Math.round(color*2.58+20);
        var rouge = color - 255;
        var vert = Math.round(color*0.78+20);
        var blue = Math.round(color*0.31+20);
        $('.note'+cmp).css("background","rgb(" + Math.abs(rouge)  + ", " + Math.abs(vert)  + " , " + Math.abs(blue)  + ")");  
    }
    


//});//FIN