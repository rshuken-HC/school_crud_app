<template>
    <div class="enrolledClasses">
        <b-button @click="onAdd" type="button">Enroll a Student in a new Class</b-button>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID #</th>
                <th scope="col">Description</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <EnrolledClass v-for="enrolledClass in enrolledClasses" :key="enrolledClass.id"
                           :enrolledClass="enrolledClass"
                           @edit="onEdit"
                           @delete="onDelete"/>
            </tbody>
        </table>
        <b-modal @ok="patchEnrolledClass(editEnrolledClass.id)" id="modal-1" title="Edit a Students Enrollment">
            <form>
                <label for="studentId">Class Description</label>
                <b-form-input id="studentId" v-model="formData.student_id"
                              placeholder="Enter the Student ID #">

                </b-form-input>
                <label for="teacherCourseId">Class Description</label>
                <b-form-input id="teacherCourseId" v-model="formData.teacher_course_id"
                              placeholder="Enter the Course ID #">
                </b-form-input>
            </form>
        </b-modal>

        <b-modal @ok="addEnrolledClass()" id="modal-2" title="Enroll a Student in a new Class">
            <form>
                <label for="studentId">Student ID #</label>
                <b-form-input id="studentId" v-model="formData.student_id"
                              placeholder="Enter the Student ID #">
                </b-form-input>
                <label for="teacherCourseId">Course ID #</label>
                <b-form-input id="teacherCourseId" v-model="formData.teacher_course_id"
                              placeholder="Enter the Course ID #">
                </b-form-input>
            </form>
        </b-modal>
    </div>
</template>

<script>
import axios from "axios";
import EnrolledClass from './EnrolledClass';

export default {
    components: {
        EnrolledClass,
    },

    name: 'EnrolledClasses',
    data() {
        return {
            enrolledClasses: [],
            editEnrolledClass: null,
            formData: {},

        }
    },
    props: {},

    created() {
        this.load()
    },
    methods: {
        patchEnrolledClass(enrolledClassId) {
            axios.patch(`http://localhost:8765/api/studentteachercourses/edit/${enrolledClassId}`, this.formData)
                .then(() => {
                    this.load()
                    this.$bvModal.hide('modal-1')
                });

        },
        addEnrolledClass() {
            axios.post(`http://localhost:8765/api/studentteachercourses/add`, this.formData)
                .then(() => {
                    this.load()
                });

        },
        deleteTeacher(enrolledClassId) {
            axios.delete(`http://localhost:8765/api/studentteachercourses/delete/${enrolledClassId}`)
                .then(() => {
                    this.load()
                });

        },

        onEdit(enrolledClass) {
            this.$bvModal.show('modal-1')
            this.editEnrolledClass = enrolledClass;
            this.formData = enrolledClass;
        },
        onAdd() {
            this.$bvModal.show('modal-2')
        },

        onDelete(enrolledClass) {
            this.deleteTeacher(enrolledClass.id);
        },

        onUpdate() {
            this.load();
        },

        load() {
            axios.get('http://localhost:8765/api/studentteachercourses/')
                .then(response => {
                    this.enrolledClasses = response.data;
                    console.log('these are the enrolled Classes', this.enrolledClasses)
                })
        },

    }


}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
    margin: 40px 0 0;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    display: inline-block;
    margin: 0 10px;
}

a {
    color: #42b983;
}
</style>
