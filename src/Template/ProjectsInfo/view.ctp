<?php
/**
  * $projectsInfo->
  * @var id
  * @var content
  * @var slug
  * @var name
  * @var name_slug
  * @var created
*
  * $slug->
  * @var slug
  *
*
  * $otherProjectsInfo ->
  * @var slug (logos/affiche...)
  *
*/
$title_page = ucfirst(h($slug->slug));

$title = $title_page.' - Infographie';
$description = 'Toutes mes créations en terme de '.h($slug->slug);
$this->assign('title', $title);
$this->assign('description', $description);
$type = (string) h($slug->slug); // carterie
// FILES CSS
$this->start('css');
    echo $this->Html->css('/builds/css/general-info.min');
    // echo $this->Html->css('/builds/css/categories.min');
    // echo $this->Html->css('/builds/css/index.min');
    // echo $this->Html->css('/builds/css/infographiste.min');
$this->end();

// FILES JS
$this->start('script');
    echo $this->Html->script('/builds/js/infographiste/infographiste.min');
$this->end();
?>
<!-- HEADER -->
<section class="header row middle-xs" id="home"
 style="background-image: url('<?= $this->Url->build('/img/infographiste/'.h($slug->slug).'/'.$type.'-header.jpg', true) ?>')">
    <header class="container">
        <h1 class="display"><?= ucfirst(strtolower(h($slug->slug))) ?></h1>
    </header>
    <div class="overlay"></div>
</section>

<!-- NAV -->
<?= $this->element('nav2'); ?>

<!-- PROJECT -->
<section class="gradiant projectInfo">
    <div class="container">

        <?php foreach ($projectsInfo as $projectInfo): ?>
            <?php
                $slug = (string) h($projectInfo->slug); // carterie
                $name_slug = (string) h($projectInfo->name_slug); // priss-mode
                $name = (string) h($projectInfo->name); // Priss Mode

                $nbLivrable = 0;
                foreach ($allInfo as $v) {
                    $livrableInfo = h($v->name_slug);
                    if ($name_slug == $livrableInfo) $nbLivrable++;
                }
                foreach ($allWeb as $v) {
                    $livrableWeb = h($v->slug);
                    if ($name_slug == $livrableWeb) $nbLivrable++;
                }
            ?>

            <article class="row article-content animated">
                <div class="column-2 <?= $type ?>">
                    <div class="left">
                        <h3 class="article-title"><?= $name ?></h3>
                        <?= '<small class="article-date">'.h($projectInfo->created->i18nformat('dd MMMM YYYY')).'</small>' ?>
                        <p class="article-texte"><?= html_entity_decode(h($projectInfo->content)) ?></p>
                        <?php if ($nbLivrable > 1): ?>
                            <a href="<?= $this->Url->build(
                                [
                                    'controller' => 'Projects',
                                    'action' => 'view',
                                    $name_slug
                                ])
                                ?>"
                            >
                                <button class="btn btn-primary">Voir le projet</button>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="right">
                        <figure>
                            <!-- image carterie -->
                            <?php if ($type == 'carterie' || $type == 'depliants'): ?>
                                <?php if ($nbLivrable > 1): ?>  <!-- début du lien -->
                                    <a href="<?= $this->Url->build(
                                        [
                                            'controller' => 'Projects',
                                            'action' => 'view',
                                            $name_slug
                                        ])
                                        ?>"
                                    >
                                <?php endif; ?>
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
                                <?php if ($nbLivrable > 1): ?>  <!-- fin du lien -->
                                </a>
                                <?php endif; ?>
                            <!-- autre images -->
                            <?php else: ?>
                                <?php if ($nbLivrable > 1): ?>  <!-- début du lien -->
                                    <a href="<?= $this->Url->build(
                                        [
                                            'controller' => 'Projects',
                                            'action' => 'view',
                                            $name_slug
                                        ])
                                        ?>"
                                    >
                                <?php endif; ?>
                                    <?=
                                        $this->Html->image("/img/infographiste/".$slug."/".$name_slug."/".h($projectInfo->img)."",
                                        [
                                            "alt" => "image de mon ".$slug." pour ".$name."",
                                            "class" => $type
                                        ]);
                                    ?>
                                <?php if ($nbLivrable > 1): ?> <!-- fin du lien -->
                                </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </figure>
                    </div>
                </div>
            </article>

    <?php endforeach; ?>
</section>

<!-- PROJECT -->
<section class="projects">
    <div class="container">
        <h3 class="projects-title">Autres projets d'infographie</h3>
        <div class="projects-row"> <!-- Debut row -->
            <!-- Articles  -->
            <?php foreach ($otherProjectsInfo as $otherProject): ?>
                <?php $type = h($otherProject->slug); // carterie ?>
                <article class="projects-container">
                        <div class="projects-article">
                            <a href="
                            <?= $this->Url->build([
                                    'controller' => 'ProjectsInfo',
                                    'action' => 'view',
                                     $type
                                ]) ?>
                                ">
                            <?=
                                $this->Html->image('infographiste/'.$type.'/'.$type.'-header.jpg',
                                    [
                                        'alt' => $type,
                                        'class' => 'image'
                                    ]
                                );
                            ?>
                            <h4 class="projects-article-title">
                                <?= ucfirst($type) // nom du site ?>
                            </h4>
                            <div class="overlay overlay-black"></div>
                            </a>
                        </div>
                </article>

            <?php endforeach; ?>
        </div> <!-- Fin row -->
    </div> <!-- Fin container -->
</section>
