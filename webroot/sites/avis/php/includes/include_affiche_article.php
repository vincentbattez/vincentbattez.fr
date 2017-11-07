    <?php
$i= (int) 0;
////////////AFFICHE ARTICLES
$query_afficheArticles = $bdd->query('SELECT articles.id, titre,idutilisateurs, date, resume, content, aime, commentaires, satisfaction, login FROM articles JOIN utilisateurs ON utilisateurs.id = articles.idutilisateurs ORDER BY date'); 

if(!empty($query_afficheArticles)){
    
while ($data = $query_afficheArticles->fetch()){
$i += 1;

////////////REGARDE SI DANS LES ARTICLES LE USER CURRENT A DEJA LIKE POUR CHANGER LA COULEUR DU BUTTON
if(isset($_SESSION['login']) && !empty($_SESSION['login'])){
    $like = "false";
    $idActicleCurrent= (int) $data['id'];
    $query_idutilisateurs = $bdd->query('SELECT idutilisateurs, idarticle, id FROM articles_aime;');

       while ($data_idutilisateurs = $query_idutilisateurs->fetch()){ // regarde dans le BDD si j'ai déjà liké
            $bddIDarticle = (int) $data_idutilisateurs['idarticle'];
           if($bddIDarticle == $idActicleCurrent){
            $bddIDuser = (int) $data_idutilisateurs['idutilisateurs'];
           }

            if ($idActicleCurrent == $bddIDarticle && !empty($bddIDarticle)){
                if($_SESSION['idutilisateurs'] == $bddIDuser && !empty($bddIDuser)){
                    $like = "true";
                    break;

                }else{
                    $like = "false";
                }
            }
       }$query_idutilisateurs->closeCursor(); // Termine le traitement de la requête
}
        ?>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 m-t-3">
                    <div class="jumbotron hoverable">
        <?php
////////////////////////CROIX POUR SUPPRIMER ARTICLE
                if(isset($_SESSION['idutilisateurs'])){
                    if ($_SESSION['idutilisateurs'] == $data['idutilisateurs']){
                echo 
                    '
                    <form action="php/traitement_effacerArticle.php" method="POST">
                        <button type="submit" class="btn_remove btn_remove_article button_moche pull-right" role="button" name="remove" value="'.$data['id'].'">
                            <i class="fa fa-times btn_remove remove"></i>
                        </button>
                    </form>
                    ';
                    }
                }
    

                echo'
                    <h1 class="display-3">'.htmlspecialchars($data['titre']).'</h1>
                    <p class="lead auteur letter">'.htmlspecialchars($data['login']).' - '.htmlspecialchars($data['date']).' <br/><small><span class="note note'. $i .'">NOTE : <span class="note_value">'.$data['satisfaction'].'</span>/100</span></p></small>
                    <hr class="m-y-2">
                    <p class="description">'.htmlspecialchars($data['resume']).'</p>
                    <p class="lead collapse in" id="more">
                        <a class="btn btn-primary btn-lg" role="button" data-toggle="collapse" href="#article_'.$data['id'].'" aria-expanded="false" aria-controls="article_'.$data['id'].'">Voir plus</a>
                    </p>
                    <div class="collapse" id="article_'.$data['id'].'">
                        <div class="well text-justify">
                            <p>'.htmlspecialchars($data['content']).'</p>    
                            <hr class="m-y-2">
                            <div class="row m-t-2 m-b-2">
                            
                                <div class="col-xs-6 col-sm-6 col-md-6 divPositif">
                                    <div class="md-form">
                                        <ul class="ulPositif">
                                            <div class="icon-cercle icon-cercle-article" id="icon-positif"> <i class="fa fa-plus"></i> </div>
                    ';
///////////////////////////////////AFFICHE POSITIF
                                   $query_positif = $bdd->query('SELECT avispositif FROM positif JOIN articles ON articles.id = idarticle WHERE idarticle = '.$data['id'].' ORDER BY positif.id;'); 

                                    while ($data_positif = $query_positif->fetch()){
                                            echo
                                                '  
                                                <li class="positif-li">'.$data_positif['avispositif'].'</li>
                                                ';
                                    }$query_positif->closeCursor(); // Termine le traitement de la requête  
                                    echo
                                        '
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="col-xs-6 col-sm-6 col-md-6 divNegatif">
                                    <div class="md-form">
                                        <ul class="ulNegatif">
                                            <div class="icon-cercle icon-cercle-article" id="icon-negatif"> <i class="fa fa-minus"></i> </div>
                                        ';
///////////////////////////////////AFFICHE NEGATIF
                                   $query_negatif = $bdd->query('SELECT avisnegatif FROM negatif JOIN articles ON articles.id = idarticle WHERE idarticle = '.$data['id'].' ORDER BY negatif.id;'); 

                                    while ($data_negatif = $query_negatif->fetch()){
                                            echo
                                                '  
                                                <li class="negatif-li">'.$data_negatif['avisnegatif'].'</li>
                                                ';
                                    }$query_negatif->closeCursor(); // Termine le traitement de la requête  
                                    echo
                                        '
                                        </ul>
                                    </div>
                                </div>
                            </div>
                                    ';
////////////////////////////////////BUTTON COMMENTAIRE
                            echo 
                                '
                                <button type="button" class="btn btn-primary btn-sm" role="button" data-toggle="collapse" href="#commentaire_'.$data['id'].'" aria-expanded="false" aria-controls="commentaire_'.$data['id'].'">
                                   Voir commentaires 
                                    <span class="number number_commentaire">
                                        '.$data['commentaires'].'
                                    </span> 
                                </button>
                                ';
////////////////////////////////////////BUTTON LIKE
                            if(isset($_SESSION['login']) && !empty($_SESSION['login'])){
                                if($like == "true"){
                                    echo
                                    '
                                    <form action="php/traitement_dislike.php" method="POST" class="inline">
                                        <input type="text" class="none" name="remove" value="'.$data_idutilisateurs['id'].'">
                                        <button type="submit" class="btn-like btn btn-sm red" name="idArticleCurrent" value="'.$data['id'].'">
                                            Aimer 
                                            <span class="number number_like">
                                                '.$data['aime'].'
                                            </span>
                                        </button>    
                                    </form>
                                    ';
                                }elseif($like == "false"){
                                    echo
                                    '
                                    <form action="php/traitement_aime.php" method="POST" class="inline">
                                        <button type="submit" class="btn-like btn btn-sm grey" name="IdArticle" value="'.$data['id'].'">
                                            Aimer 
                                            <span class="number number_like">
                                                '.$data['aime'].'
                                            </span>
                                        </button>    
                                    </form>
                                    ';
                                }
                            }else{
                                echo
                                '
                                    <button type="button" class="btn-like btn btn-sm red">
                                        Aimer 
                                        <span class="number number_like">
                                            '.$data['aime'].'
                                        </span>
                                    </button>    
                                ';
                            }

                        if($data['commentaires'] > 0){
                            echo '
                            </div>
                            <div class="collapse content_commentaire" id="commentaire_'.$data['id'].'">
                                ';
                        }else{
                            echo '
                            </div>
                            <div class="collapse content_commentaire m-b-3" id="commentaire_'.$data['id'].'">
                                ';
                        }
/////////////////////////////////////COMMENTAIRE QUAND CO
                            if(isset($_SESSION['login']) && !empty($_SESSION['login'])){
                                echo
                                '
                                <form action="php/traitement_send_commentaire.php" method="POST">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 m-t-2">
                                        <div class="md-form">
                                            <i class="fa fa-comment prefix"></i>
                                            <input type="text" id="message" name="message" placeholder="Message">
                                            <button type="submit" class="none" name="sendCom" id="btn_sendCom" value="'.$data['id'].'"></button>
                                        </div>
                                    </div>
                                </form>
                            ';
                            }else{
////////////////////////////////////////MESSAGE DISANT QU'ON NE PEUT PAS LIKER ET COMMENTER
                                echo
                                    '<div class="alert alert-info">
                                        <p>Connectez-vous pour <strong>liker</strong>, <strong>commenter</strong> ou pour <strong>écrire </strong>un article.</p>
                                    </div>
                                    ';
                            }
                        ?>

                            <div class="well">

                              <?php
///////////////////////////////////////////AFFICHE TOUT COMMENTAIRES
                                   $query_afficheCom = $bdd->query('SELECT commentaire.id, message, login, date, idArticle FROM commentaire JOIN utilisateurs ON utilisateurs.id = commentaire.idutilisateurs ORDER BY id;'); 

                                    while ($data_com = $query_afficheCom->fetch()){
                                        if ($data_com['idArticle'] == $data['id']){
                                            echo
                                                '<br/>
                                                <p>
                                                    <a href="#" class="letter">'.htmlspecialchars($data_com['login']).'</a>: '.htmlspecialchars($data_com['message']).' <small class="pull-right date">'.$data_com['date'].'</small>
                                                </p>
                                                ';
////////////////////////////////////////////////////CROIX POUR SUPPRIMER MESSAGE
                                            if(isset($_SESSION['login'])){
                                                if ($_SESSION['login'] == $data_com['login']){
                                            echo 
                                                '
                                                <form action="php/traitement_effacerCom.php" method="POST">
                                                    <input type="text" class="none" name="idArticleCurrent" value="'.$data['id'].'">
                                                    <button type="submit" class="btn_remove button_moche" role="button" name="remove" value="'.$data_com['id'].'">
                                                        <i class="fa fa-times btn_remove remove"></i>
                                                    </button>
                                                </form>
                                                ';
                                                }
                                            }
                                        }
                                    }$query_afficheCom->closeCursor(); // Termine le traitement de la requête  
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

    }$query_afficheArticles->closeCursor(); // Termine le traitement de la requête
}