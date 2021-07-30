<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TeacherCourse[]|\Cake\Collection\CollectionInterface $teacherCourses
 */
?>
<div class="teacherCourses index content">
    <?= $this->Html->link(__('New Teacher Course'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Teacher Courses') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('course_id') ?></th>
                    <th><?= $this->Paginator->sort('teacher_id') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('start_date') ?></th>
                    <th><?= $this->Paginator->sort('end_date') ?></th>
                    <th><?= $this->Paginator->sort('start_time') ?></th>
                    <th><?= $this->Paginator->sort('end_time') ?></th>
                    <th><?= $this->Paginator->sort('spring_semester') ?></th>
                    <th><?= $this->Paginator->sort('summer_semester') ?></th>
                    <th><?= $this->Paginator->sort('fall_semester') ?></th>
                    <th><?= $this->Paginator->sort('winter_semester') ?></th>
                    <th><?= $this->Paginator->sort('total_students') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($teacherCourses as $teacherCourse): ?>
                <tr>
                    <td><?= $this->Number->format($teacherCourse->id) ?></td>
                    <td><?= $teacherCourse->has('course') ? $this->Html->link($teacherCourse->course->title, ['controller' => 'Courses', 'action' => 'view', $teacherCourse->course->id]) : '' ?></td>
                    <td><?= $teacherCourse->has('teacher') ? $this->Html->link($teacherCourse->teacher->first_name, ['controller' => 'Teachers', 'action' => 'view', $teacherCourse->teacher->id]) : '' ?></td>
                    <td><?= h($teacherCourse->description) ?></td>
                    <td><?= h($teacherCourse->start_date) ?></td>
                    <td><?= h($teacherCourse->end_date) ?></td>
                    <td><?= h($teacherCourse->start_time) ?></td>
                    <td><?= h($teacherCourse->end_time) ?></td>
                    <td><?= $this->Number->format($teacherCourse->spring_semester) ?></td>
                    <td><?= $this->Number->format($teacherCourse->summer_semester) ?></td>
                    <td><?= $this->Number->format($teacherCourse->fall_semester) ?></td>
                    <td><?= $this->Form->checkbox('winter_semester', ['value' => $teacherCourse->winter_semester, 'disabled' => true]) ?></td>
                    <td><?= $finalResult[$teacherCourse->course_id] ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $teacherCourse->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $teacherCourse->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $teacherCourse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teacherCourse->id)]) ?>
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
