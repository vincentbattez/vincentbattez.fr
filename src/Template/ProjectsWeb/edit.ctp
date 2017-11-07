<?php
/**
  * $projectsWeb->
  * @var name
  * @var avis
  * @var rating
  *
  */

    // FILES CSS
    $this->start('css');
        echo $this->Html->css('/builds/css/general-dev.min');
        echo $this->Html->css('/builds/css/index.min');
    $this->end();

    // FILES JS
    $this->start('script');
        echo $this->Html->script('/builds/js/edit/edit.min');
    $this->end();
?>

<!-- NAV -->
<?= $this->element('nav2'); ?>
<div class="container">
    <h1>Votre avis pour "<?= $projectsWeb->name ?>" </h1>
    <?= $this->Form->create($projectsWeb) ?>
        <?php
            echo $this->Form->input('avis');
            echo $this->Form->input('rating', ['type' => 'range']);
        ?>
        <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
