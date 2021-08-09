<template>
  <div class="coursesContainer">
      <b-button @click="onAdd" type="button">Add Course</b-button>

      <table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">ID #</th>
      <th scope="col">Title</th>
      <th scope="col">Major</th>
      <th scope="col">Credits</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
              <Course v-for="course in courses" :key="course.id" :course="course"
                       @edit="onEdit"
                       @delete="onDelete"/>
  </tbody>
  </table>
      <b-modal @ok="patchCourse(editCourse.id)" id="modal-1" title="Edit Course">
          <form>
            <label for="title">Title</label>
            <b-form-input id="title" v-model="formData.title" placeholder="Enter the course title"></b-form-input>
              <label for="major">Subject</label>
              <b-form-input id="major" v-model="formData.subject" placeholder="Enter the course major"></b-form-input>
              <label for="credits">Credits</label>
              <b-form-input id="credits" v-model="formData.credits" placeholder="Enter the course credits"></b-form-input>

          </form>
        </b-modal>

      <b-modal @ok="addCourse()" id="modal-2" title="Add Course">
      <form>
          <label for="title">Title</label>
          <b-form-input id="title" v-model="formData.title" placeholder="Enter the course title"></b-form-input>
          <label for="major">Major</label>
          <b-form-input id="major" v-model="formData.subject" placeholder="Enter the course major"></b-form-input>
          <label for="credits">Credits</label>
          <b-form-input id="credits" v-model="formData.credits" placeholder="Enter the course credits"></b-form-input>

      </form>
      </b-modal>
  </div>
</template>

<script>
import axios from "axios";
import Course from './Course';

export default {
  components: {
    Course,
  },

  name: 'Courses',
    data() {
      return {
      courses: [],
      editTeacher: null,
      formData: {},

      }
},
  props: {

  },

  created() {
    this.load()
  },
    methods: {
      patchCourse(courseId) {
          axios.patch(`http://localhost:8765/api/courses/edit/${courseId}`, this.formData)
          .then(() => {
              this.load()
          });

      },
        addCourse() {
            axios.post(`http://localhost:8765/api/courses/add`, this.formData)
                .then(() => {
                    this.load()
                });

        },
        deleteCourse(courseId) {
            axios.delete(`http://localhost:8765/api/courses/delete/${courseId}`)
                .then(() => {
                    this.load()
                });

        },

      onEdit(course) {
          this.$bvModal.show('modal-1')
          this.editCourse = course;
          this.formData = course
      },

        onAdd() {
            this.$bvModal.show('modal-2')
        },

    onDelete(course) {
        this.deleteCourse(course.id);
    },
      onUpdate() {
        this.load();
      },

    load() {
        axios.get('http://localhost:8765/api/courses/')
            .then(response => {
                console.log(response.data);
                this.courses = response.data;
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
