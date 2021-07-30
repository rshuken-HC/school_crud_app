<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TeacherCourse $teacherCourse
 * @var \Cake\Collection\CollectionInterface|string[] $courses
 * @var \Cake\Collection\CollectionInterface|string[] $teachers
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Teacher Courses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="teacherCourses form content">
            <?= $this->Form->create($teacherCourse) ?>
            <fieldset>
                <legend><?= __('Add Teacher Course') ?></legend>
                <?php
                    echo $this->Form->control('course_id', ['options' => $courses, 'empty' => true]);
                    echo $this->Form->control('teacher_id', ['options' => $teachers, 'empty' => true]);
                    //echo $this->Form->control('teacher__first_name', ['options' => $teachers, 'empty' => true]);
                    echo $this->Form->control('description');
                    echo $this->Form->control('start_date', ['empty' => true]);
                    echo $this->Form->control('end_date', ['empty' => true]);
                    echo $this->Form->control('start_time', ['empty' => true]);
                    echo $this->Form->control('end_time', ['empty' => true]);
                    echo $this->Form->control('spring_semester');
                    echo $this->Form->control('summer_semester');
                    echo $this->Form->control('fall_semester');
                    echo $this->Form->control('winter_semester');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
