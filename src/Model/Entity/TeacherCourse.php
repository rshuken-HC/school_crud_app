<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TeacherCourse Entity
 *
 * @property int $id
 * @property int|null $course_id
 * @property int|null $teacher_id
 * @property string|null $description
 * @property \Cake\I18n\FrozenDate|null $start_date
 * @property \Cake\I18n\FrozenDate|null $end_date
 * @property \Cake\I18n\Time|null $start_time
 * @property \Cake\I18n\Time|null $end_time
 * @property int|null $spring_semester
 * @property int|null $summer_semester
 * @property int|null $fall_semester
 * @property int|null $winter_semester
 *
 * @property \App\Model\Entity\Course $course
 * @property \App\Model\Entity\Teacher $teacher
 * @property \App\Model\Entity\StudentTeacherCourse[] $student_teacher_courses
 */
class TeacherCourse extends Entity
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
        'course_id' => true,
        'teacher_id' => true,
        'description' => true,
        'start_date' => true,
        'end_date' => true,
        'start_time' => true,
        'end_time' => true,
        'spring_semester' => true,
        'summer_semester' => true,
        'fall_semester' => true,
        'winter_semester' => true,
        'course' => true,
        'teacher' => true,
        'student_teacher_courses' => true,
    ];
}
