<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;

$this->assign('before1-error', '401');
$this->assign('before2-error', '402');
$this->assign('before3-error', '403');
$this->assign('error', '404');
$this->assign('after1-error', '405');
$this->assign('after2-error', '406');
$this->assign('after3-error', '407');

$this->layout = 'error';

if (Configure::read('debug')):
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error400.ctp');

    $this->start('file');
?>
<?php if (!empty($error->queryString)) : ?>
    <p class="notice">
        <strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
        <strong>SQL Query Params: </strong>
        <?php Debugger::dump($error->params) ?>
<?php endif; ?>
<?= $this->element('auto_table_warning') ?>
<?php
    if (extension_loaded('xdebug')):
        xdebug_print_function_stack();
    endif;

    $this->end();
endif;
?>
<h2><?= h($message) ?></h2>
<p class="error-message">
    <?= __d('cake', 'The requested address {0} was not found on this server.', "<strong class='chemin'>'{$url}'</strong>") ?>
</p>
