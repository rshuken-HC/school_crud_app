<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Student'), ['action' => 'edit', $student->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Student'), ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Students'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Student'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="students view content">
            <h3><?= h($student->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($student->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($student->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Major') ?></th>
                    <td><?= h($student->major) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($student->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Student Teacher Courses') ?></h4>
                <?php if (!empty($student->student_teacher_courses)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Teacher Course Id') ?></th>
                            <th><?= __('Student Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($student->student_teacher_courses as $studentTeacherCourses) : ?>
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
