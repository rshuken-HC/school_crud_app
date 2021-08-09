<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Teacher Entity
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 *
 * @property \App\Model\Entity\TeacherCourse[] $teacher_courses
 */
class Teacher extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'teacher_courses' => true,
    ];

    // this allows you to not show selected fields in the json to the user.
//    protected $_hidden = [
//        'first_name',
//        'last_name',
//    ];

    // these allow you to define virtual fields then below compute logic into new variables that get attached to the
    // controller logic
    protected $_virtual = [
        'full_name'
    ];

    // getters will do logic on a property and always return the value
    protected function _getFullName()
    {
        return $this->first_name . " " . $this->last_name;

    }

    // setters work like middleware for properties they run the logic each time the property is called and pass the
    // value of the property into the function
//    protected function _setPassword($value)
//    {
//        return md5($value);
//    }

    // this is an example of creating a quick field from the controllers request
//    protected function _getEmail()
//    {
//        if (empty($this->teacher_contacts)) return null;
//        return $this->teacher_contacts->filter(function ($r) {
//            return $r->type == "email";
//        })->first();
//    }
}
