<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Teacher[]|\Cake\Collection\CollectionInterface $teachers
 */
?>
<div class="teachers index content">
    <?= $this->Html->link(__('New Teacher'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Teachers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('total_credits_taught') ?></th>
                    <th><?= $this->Paginator->sort('total_credits_semester') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($teachers as $teacher): ?>
                <tr>
                    <td><?= $this->Number->format($teacher->id) ?></td>
                    <td><?= h($teacher->first_name) ?></td>
                    <td><?= h($teacher->last_name) ?></td>
                    <td><?= h($teacher->total_credits) ?></td>
                    <td><?= h($teacher->total_credits_current) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $teacher->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $teacher->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $teacher->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teacher->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
