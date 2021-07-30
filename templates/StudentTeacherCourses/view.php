<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentTeacherCourse $studentTeacherCourse
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Student Teacher Course'), ['action' => 'edit', $studentTeacherCourse->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Student Teacher Course'), ['action' => 'delete', $studentTeacherCourse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentTeacherCourse->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Student Teacher Courses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Student Teacher Course'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="studentTeacherCourses view content">
            <h3><?= h($studentTeacherCourse->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Teacher Course') ?></th>
                    <td><?= $studentTeacherCourse->has('teacher_course') ? $this->Html->link($studentTeacherCourse->teacher_course->id, ['controller' => 'TeacherCourses', 'action' => 'view', $studentTeacherCourse->teacher_course->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Student') ?></th>
                    <td><?= $studentTeacherCourse->has('student') ? $this->Html->link($studentTeacherCourse->student->id, ['controller' => 'Students', 'action' => 'view', $studentTeacherCourse->student->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($studentTeacherCourse->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
