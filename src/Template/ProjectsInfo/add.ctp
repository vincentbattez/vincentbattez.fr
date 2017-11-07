<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Projects Info'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="projectsInfo form large-9 medium-8 columns content">
    <?= $this->Form->create($projectsInfo) ?>
    <fieldset>
        <legend><?= __('Add Projects Info') ?></legend>
        <?php
            echo $this->Form->input('type');
            echo $this->Form->input('content');
            echo $this->Form->input('slug');
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
