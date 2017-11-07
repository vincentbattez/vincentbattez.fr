<?php
/**
  * $info->
  * @var id
  * @var content
  * @var slug
  * @var name
  * @var name_slug
  * @var img
  * @var created
*
  * $site[]
  * @var name
  * @var slogan
  * @var slug
  * @var content
  * @var url
  * @var type_avis
  * @var rating
  * @var created
  *
*
  * @var $slug (nom du projet)
  * @var $type (logos...)
  *
*/
$webPresent = (!empty($site)) ? true : false;

$title_page = ucfirst($slug);

$title = 'Projet - '. $title_page;
$description = 'Voici mes créations pour le projet '.$slug;
$this->assign('title', $title);
$this->assign('description', $description);
// FILES CSS
$this->start('css');
    echo $this->Html->css('/builds/css/general-info.min');
    // echo $this->Html->css('/builds/css/categories.min');
    // echo $this->Html->css('/builds/css/index.min');
    // echo $this->Html->css('/builds/css/developpeur.min');
    // echo $this->Html->css('/builds/css/infographiste.min');
    // echo $this->Html->css('/builds/css/project.min');
$this->end();

// FILES JS
$this->start('script');
    echo $this->Html->script('/builds/js/project/project.min');
$this->end();


function removeS($string){
    $s = substr($string, -1);
    if($s == "s") { $type = substr_replace($string, "", -1); }
    else { $type = $s; }
    return $type;
}
?>
<!-- HEADER -->
<section class="header row middle-xs" id="home"
 style="background-image: url('<?php
    if($webPresent)
        echo $this->Url->build('/img/developpeur/'.$slug.'/header.jpg', true);
    else
        echo $this->Url->build('/img/infographiste/'.$type.'/'.$slug.'/'.$type.'-'.$slug.'-header.jpg', true);
 ?>
 ')">
    <header class="container">
        <h1 class="display">Projet <?= ucfirst(strtolower($slug)) ?></h1>
    </header>
    <div class="overlay"></div>
</section>

<!-- NAV -->
<?= $this->element('nav2'); ?>

<div class="block">
    <aside class="navFollow show">
        <nav>
            <button type="button" role="button" class="hide"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
            <ul>
                <?php if ($webPresent): ?>
                    <a href="#web" class="nav-web"><li>Site</li></a>
                <?php endif; ?>
                <?php foreach ($infos as $info): ?>
                    <a href="#<?= $info->slug ?>" class="nav-<?= $info->slug ?>"><li><?= ucfirst(strtolower(removeS($info->slug))) ?></li></a>
                <?php endforeach; ?>
            </ul>
        </nav>
    </aside>
</div>

<?php if ($webPresent): ?> <!-- PROJECT WEB -->

    <section class="gradiant" id="web">
        <div class="container">
            <p>Réalisé le <span class="date"><?= $site['created'] ?></span></p>
            <article class="<?= $slug ?>">
                <div class="row">
                    <div class="projectDev-title-block">
                        <h2>
                            <span class="projectDev-title"><?= $site['name'] ?></span>
                            <span class="projectDev-slogan"><?= $site['slogan'] ?></span>
                        </h2>
                        <a class="projectDev-link" target="_blank" href="<?= $site['url'] ?>">
                            Voir le site
                        </a>
                    </div>
                </div>
                <div class="row">
                    <section class="AvisDev container projectWeb">
                        <div class="row">
                            <div class="column-2">
                                <?=
                                    $this->Html->image("/img/developpeur/".$site['slug']."/iPad.png",
                                    [
                                        "alt" => "Mockup du site ".$site['slug']." sur une tablette",
                                        "class" => "tablet"
                                    ]);
                                ?>
                                <?=
                                    $this->Html->image("/img/developpeur/".$site['slug']."/iMac.png",
                                    [
                                        "alt" => "Mockup du site ".$site['slug']." sur un mac",
                                        "class" => "pc"
                                    ]);
                                ?>
                                <?=
                                    $this->Html->image("/img/developpeur/".$site['slug']."/iPhone.png",
                                    [
                                        "alt" => "Mockup du site ".$site['slug']." sur un smartphone",
                                        "class" => "phone"
                                    ]);
                                ?>
                            </div>
                            <p class="projectDev-content">
                                <?= html_entity_decode($site['content']) ?>...
                                <br>
                                <br>
                                <a class="projectDev-link" href=
                                "
                                    <?= $this->Url->build(
                                        [
                                            'controller' => 'ProjectsWeb',
                                            'action' => 'view',
                                            $site['slug']
                                        ])
                                    ?>
                                ">
                                En savoir plus
                                </a>
                            </p>
                        </div>
                    </section>
                </div>
            </article>
        </div>
    </section>

<?php endif; ?>


<section class="gradiant infographie">
    <div class="container">
        <?php foreach ($infos as $info): ?>
            <?php
                $slug = h($info->slug);
                $name_slug = h($info->name_slug);
                $name = h($info->name);
                $type = h($info->slug);
             ?>
            <article class="row article-content visible animated" id="<?= $info->slug ?>">
                <div class="column-2">
                    <div class="left">
                        <h3 class="article-title"><?= ucfirst(strtolower(removeS($info->slug))) ?></h3>
                        <?= '<small class="article-date">'.h($info->created->i18nformat('dd MMMM YYYY')).'</small>' ?>
                        <p class="article-texte"><?= html_entity_decode(h($info->content)) ?></p>
                    </div>
                    <div class="right">
                        <figure>
                            <!-- image carterie -->
                            <?php if ($type == 'carterie' || $type == 'depliants'): ?> <!-- 2 images -->
                                <?=
                                    $this->Html->image("/img/infographiste/".$slug."/".$name_slug."/".$type."-verso.png",
                                    [
                                        "alt" => "image de mon ".$slug." pour ".$name."",
                                        "class" => $type.' verso'
                                    ]);
                                ?>
                                <?=
                                    $this->Html->image("/img/infographiste/".$slug."/".$name_slug."/".$type."-recto.png",
                                    [
                                        "alt" => "image de mon ".$slug." pour ".$name."",
                                        "class" => $type.' recto'
                                    ]);
                                ?>
                            <?php else: ?> <!-- 1 images -->
                                <?=
                                    $this->Html->image("/img/infographiste/".$slug."/".$name_slug."/".h($info->img)."",
                                    [
                                        "alt" => "image de mon ".$slug." pour ".$name."",
                                        "class" => $type
                                    ]);
                                ?>
                            <?php endif; ?>
                        </figure>
                    </div>
                </div>
            </article>

        <?php endforeach; ?>
    </div>
</section>
