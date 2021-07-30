<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentTeacherCourse[]|\Cake\Collection\CollectionInterface $studentTeacherCourses
 */
?>
<div class="studentTeacherCourses index content">
    <?= $this->Html->link(__('New Student Teacher Course'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Student Teacher Courses') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('teacher_course_id') ?></th>
                    <th><?= $this->Paginator->sort('student_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($studentTeacherCourses as $studentTeacherCourse): ?>
                <tr>
                    <td><?= $this->Number->format($studentTeacherCourse->id) ?></td>
                    <td><?= $studentTeacherCourse->has('teacher_course') ? $this->Html->link($studentTeacherCourse->teacher_course->id, ['controller' => 'TeacherCourses', 'action' => 'view', $studentTeacherCourse->teacher_course->id]) : '' ?></td>
                    <td><?= $studentTeacherCourse->has('student') ? $this->Html->link($studentTeacherCourse->student->id, ['controller' => 'Students', 'action' => 'view', $studentTeacherCourse->student->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $studentTeacherCourse->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $studentTeacherCourse->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $studentTeacherCourse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentTeacherCourse->id)]) ?>
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
