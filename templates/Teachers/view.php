<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Teacher $teacher
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Teacher'), ['action' => 'edit', $teacher->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Teacher'), ['action' => 'delete', $teacher->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teacher->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Teachers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Teacher'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="teachers view content">
            <h3><?= h($teacher->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($teacher->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($teacher->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($teacher->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Current Credits Taught') ?></th>
                    <td><?= $this->Number->format($teacher->total_credits_current) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total Credits Taught') ?></th>
                    <td><?= $this->Number->format($teacher->total_credits) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Teacher Courses') ?></h4>
                <?php if (!empty($teacher->teacher_courses)) : ?>
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
                        <?php foreach ($teacher->teacher_courses as $teacherCourses) : ?>
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
