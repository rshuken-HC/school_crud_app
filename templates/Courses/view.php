<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course $course
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Course'), ['action' => 'edit', $course->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Course'), ['action' => 'delete', $course->id], ['confirm' => __('Are you sure you want to delete # {0}?', $course->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Courses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Course'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="courses view content">
            <h3><?= h($course->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($course->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Subject') ?></th>
                    <td><?= h($course->subject) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($course->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Credits') ?></th>
                    <td><?= $this->Number->format($course->credits) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Teacher Courses') ?></h4>
                <?php if (!empty($course->teacher_courses)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Course Id') ?></th>
                            <th><?= __('Teacher Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Start Date') ?></th>
                            <th><?= __('End Date') ?></th>
                            <th><?= __('Start Time') ?></th>
                            <th><?= __('End Time') ?></th>
                            <th><?= __('Spring Semester') ?></th>
                            <th><?= __('Summer Semester') ?></th>
                            <th><?= __('Fall Semester') ?></th>
                            <th><?= __('Winter Semester') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($course->teacher_courses as $teacherCourses) : ?>
                        <tr>
                            <td><?= h($teacherCourses->id) ?></td>
                            <td><?= h($teacherCourses->course_id) ?></td>
                            <td><?= h($teacherCourses->teacher_id) ?></td>
                            <td><?= h($teacherCourses->description) ?></td>
                            <td><?= h($teacherCourses->start_date) ?></td>
                            <td><?= h($teacherCourses->end_date) ?></td>
                            <td><?= h($teacherCourses->start_time) ?></td>
                            <td><?= h($teacherCourses->end_time) ?></td>
                            <td><?= h($teacherCourses->spring_semester) ?></td>
                            <td><?= h($teacherCourses->summer_semester) ?></td>
                            <td><?= h($teacherCourses->fall_semester) ?></td>
                            <td><?= h($teacherCourses->winter_semester) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'TeacherCourses', 'action' => 'view', $teacherCourses->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'TeacherCourses', 'action' => 'edit', $teacherCourses->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'TeacherCourses', 'action' => 'delete', $teacherCourses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teacherCourses->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
