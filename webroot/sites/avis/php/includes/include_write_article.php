<div class="container">
    <div class="col-xs-12 col-sm-12 col-md-12 m-t-3">
        <div class="jumbotron hoverable articleDiv">
            <h2 aria-hidden="true" role="button" data-toggle="collapse" href="#write" aria-expanded="false" aria-controls="write"><i class="fa fa-pencil prefix write_article_icon"></i>Écrire un article <i class="fa fa-caret-down" role="button"></i></h2>
            <form class="form-inline collapse" action="php/traitement_write_article.php" method="POST" enctype="multipart/form-data" role="form" id="write">
                <hr/>
                <!--titre-->
                <div class="row m-t-2">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="md-form">
                            <input type="text" id="titre_article" name="titre_article" placeholder="exemple : Logo / carte de visite / site web pour l'entreprise X">
                            <label for="titre_article">Travail effectué</label>
                            <p id="cnt" class="pull-right">
                                <small><span>0 caractère</span> / 255</small>
                            </p>
                        </div>
                    </div>
                </div>
                <!--resumé-->
                <div class="row m-t-2">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="md-form">
                            <input type="text" id="resume" length="10" name="resume_article" placeholder="Description du contexte (pourquoi ce projet)">
                            <label for="resume">Contexte</label>
                            <p id="cnt2" class="pull-right">
                                <small><span>0 caractère</span> / 255</small>
                            </p>
                        </div>
                    </div>
                </div>
                <!--content-->
                <div class="row m-t-2">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="md-form">
                            <textarea type="text" class="md-textarea" id="content_article" name="content_article" placeholder=" Votre ressenti, les plus et les moins"></textarea>
                            <label for="content_article">Votre message</label>
                        </div>
                    </div>
                </div>
                <!--positif-->
                <div class="row m-t-2">
                    <div class="col-xs-6 col-sm-6 col-md-6 divPositif">
                        <div class="md-form div-positif">
                            <div class="icon-cercle" id="icon-positif"> <i class="fa fa-plus"></i> </div>
                            <input type="text" class="md-textarea classPositif0" id="positif" placeholder="Positif" name="review_goods[]" onchange="positifFunc()"></input>
                        </div>
                    </div>
                    <!--negatif-->
                    <div class="col-xs-6 col-sm-6 col-md-6 divNegatif">
                        <div class="md-form div-negatif">
                            <div class="icon-cercle" id="icon-negatif"> <i class="fa fa-minus"></i> </div>
                            <input type="text" class="md-textarea classNegatif0" id="negatif" placeholder="Négatif" name="review_bad[]" onchange="negatifFunc()"></input>
                        </div>
                    </div>
                </div>
                <!--satisfaction-->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="range-slider">
                            <label for="satisfaction_article">Satisfaction</label>
                            <br/>
                            <input class="range-slider__range" type="range" value="70" min="0" max="100" name="satisfaction_article" id="satisfaction_article">
                            <span class="range-slider__value" id="valueRange">70</span>
                        </div>
                    </div>
                    <!--Submit-->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-offset-3 col-md-6">
                            <button type="submit" class="btn btn-primary btn-lg w100p m-t-3 p-t-2 p-b-2" role="button">Envoyer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
