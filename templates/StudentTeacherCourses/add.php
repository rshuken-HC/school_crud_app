<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentTeacherCourse $studentTeacherCourse
 * @var \Cake\Collection\CollectionInterface|string[] $teacherCourses
 * @var \Cake\Collection\CollectionInterface|string[] $students
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Student Teacher Courses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="studentTeacherCourses form content">
            <?= $this->Form->create($studentTeacherCourse) ?>
            <fieldset>
                <legend><?= __('Add Student Teacher Course') ?></legend>
                <?php
                    echo $this->Form->control('teacher_course_id', ['options' => $teacherCourses, 'empty' => true]);
                    echo $this->Form->control('student_id', ['options' => $students, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
