<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TeacherCourse $teacherCourse
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Teacher Course'), ['action' => 'edit', $teacherCourse->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Teacher Course'), ['action' => 'delete', $teacherCourse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teacherCourse->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Teacher Courses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Teacher Course'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="teacherCourses view content">
            <h3><?= h($teacherCourse->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Course') ?></th>
                    <td><?= $teacherCourse->has('course') ? $this->Html->link($teacherCourse->course->title, ['controller' => 'Courses', 'action' => 'view', $teacherCourse->course->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Teacher') ?></th>
                    <td><?= $teacherCourse->has('teacher') ? $this->Html->link($teacherCourse->teacher->id, ['controller' => 'Teachers', 'action' => 'view', $teacherCourse->teacher->first_name]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($teacherCourse->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($teacherCourse->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Spring Semester') ?></th>
                    <td><?= $this->Number->format($teacherCourse->spring_semester) ?></td>
                </tr>
                <tr>
                    <th><?= __('Summer Semester') ?></th>
                    <td><?= $this->Number->format($teacherCourse->summer_semester) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fall Semester') ?></th>
                    <td><?= $this->Number->format($teacherCourse->fall_semester) ?></td>
                </tr>
                <tr>
                    <th><?= __('Winter Semester') ?></th>
                    <td><?= $this->Number->format($teacherCourse->winter_semester) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Date') ?></th>
                    <td><?= h($teacherCourse->start_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Date') ?></th>
                    <td><?= h($teacherCourse->end_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Time') ?></th>
                    <td><?= h($teacherCourse->start_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Time') ?></th>
                    <td><?= h($teacherCourse->end_time) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Student Teacher Courses') ?></h4>
                <?php if (!empty($teacherCourse->student_teacher_courses)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Teacher Course Id') ?></th>
                            <th><?= __('Student Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($teacherCourse->student_teacher_courses as $studentTeacherCourses) : ?>
                        <tr>
                            <td><?= h($studentTeacherCourses->id) ?></td>
                            <td><?= h($studentTeacherCourses->teacher_course_id) ?></td>
                            <td><?= h($studentTeacherCourses->student_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'StudentTeacherCourses', 'action' => 'view', $studentTeacherCourses->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'StudentTeacherCourses', 'action' => 'edit', $studentTeacherCourses->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentTeacherCourses', 'action' => 'delete', $studentTeacherCourses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentTeacherCourses->id)]) ?>
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
