<template>
  <div class="studentsContainer">
      <b-button @click="onAdd" type="button">Add Student</b-button>

      <table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">ID #</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Major</th>
      <th scope="col">Credits</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
              <Student v-for="student in students" :key="student.id" :student="student"
                       @delete="onDelete"
                       @edit="onEdit"/>
  </tbody>
  </table>
      <b-modal @ok="patchStudent(editStudent.id)" id="modal-1" title="Edit Student">
          <form>
            <label for="firstName">First Name</label>
            <b-form-input id="firstName" name="firstName" v-model="formData.first_name" placeholder="Enter your first name"></b-form-input>
              <label for="lastName">Last Name</label>
              <b-form-input id="lastName" v-model="formData.last_name" placeholder="Enter your last name"></b-form-input>
              <label for="Major">Major</label>
              <b-form-input id="major" v-model="formData.major" placeholder="Enter your Major"></b-form-input>
          </form>
        </b-modal>

      <b-modal @ok="addStudent()" id="modal-2" title="Add Student">
          <form>
              <label for="firstName">First Name</label>
              <b-form-input id="firstName" v-model="formData.first_name" placeholder="Enter your first name"></b-form-input>
              <label for="firstName">Last Name</label>
              <b-form-input id="lastName" v-model="formData.last_name" placeholder="Enter your last name"></b-form-input>
              <label for="major">Major</label>
              <b-form-input id="major" v-model="formData.major" placeholder="Enter your Major"></b-form-input>
          </form>
      </b-modal>
  </div>
</template>

<script>
import axios from "axios";
import Student from './Student';

export default {
  components: {
    Student,
  },

  name: 'Students',
    data() {
      return {
      students: [],
      editStudent: null,
      formData: {},

      }
},
  props: {

  },

  created() {
    this.load()
  },
    methods: {
      patchStudent(studentId) {
          axios.patch(`http://localhost:8765/api/students/edit/${studentId}`, this.formData)
          .then(() => {
              this.load()
              this.editStudent = null;
              this.$bvModal.hide('modal-1')
          });

      },
        addStudent() {
            console.log(this.formData);
            axios.post(`http://localhost:8765/api/students/add`, this.formData)
                .then(() => {
                    this.load()
                });

        },
        deleteStudent(studentId) {
            axios.delete(`http://localhost:8765/api/students/delete/${studentId}`)
                .then(() => {
                    this.load()
                });

        },

      onEdit(student) {
        this.$bvModal.show('modal-1')
        this.editStudent = student;
        this.formData.first_name = student.first_name;
      },
        onAdd() {
            this.$bvModal.show('modal-2')

        },
        onDelete(student) {
            this.deleteStudent(student.id);
        },

      onUpdate() {
        this.load();
      },

    load() {
        axios.get('http://localhost:8765/api/students/')
            .then(response => {
                console.log(response.data);
                this.students = response.data;
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
