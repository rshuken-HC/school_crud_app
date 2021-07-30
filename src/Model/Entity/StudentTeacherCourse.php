<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StudentTeacherCourse Entity
 *
 * @property int $id
 * @property int|null $teacher_course_id
 * @property int|null $student_id
 *
 * @property \App\Model\Entity\TeacherCourse $teacher_course
 * @property \App\Model\Entity\Student $student
 */
class StudentTeacherCourse extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'teacher_course_id' => true,
        'student_id' => true,
        'teacher_course' => true,
        'student' => true,
    ];
}
