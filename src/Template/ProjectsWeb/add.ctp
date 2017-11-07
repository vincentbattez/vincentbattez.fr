<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Projects Web'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="projectsWeb form large-9 medium-8 columns content">
    <?= $this->Form->create($projectsWeb) ?>
    <fieldset>
        <legend><?= __('Add Projects Web') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('slogan');
            echo $this->Form->input('url');
            echo $this->Form->input('slug');
            echo $this->Form->input('content');
            echo $this->Form->input('type_avis');
            echo $this->Form->input('avis');
            echo $this->Form->input('rating');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
