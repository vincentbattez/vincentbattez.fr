<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Projects Web'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="projectsWeb index large-9 medium-8 columns content">
    <h3><?= __('Projects Web') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slogan') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type_avis') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rating') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projectsWeb as $projectsWeb): ?>
            <tr>
                <td><?= $this->Number->format($projectsWeb->id) ?></td>
                <td><?= h($projectsWeb->name) ?></td>
                <td><?= h($projectsWeb->slogan) ?></td>
                <td><?= h($projectsWeb->url) ?></td>
                <td><?= h($projectsWeb->slug) ?></td>
                <td><?= $this->Number->format($projectsWeb->type_avis) ?></td>
                <td><?= $this->Number->format($projectsWeb->rating) ?></td>
                <td><?= h($projectsWeb->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $projectsWeb->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projectsWeb->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projectsWeb->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectsWeb->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
