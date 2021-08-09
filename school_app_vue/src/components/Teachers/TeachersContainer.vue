<template>
  <div class="teachersContainer">
      <b-button @click="onAdd" type="button">Add Teacher</b-button>

      <table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">ID #</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Current Credits Taught</th>
      <th scope="col">Total Credits Taught</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
              <Teacher v-for="teacher in teachers" :key="teacher.id" :teacher="teacher"
                       @edit="onEdit"
                       @delete="onDelete"/>
  </tbody>
  </table>
      <b-modal @ok="patchTeacher(editTeacher.id)" id="modal-1" title="Edit Teacher">
          <form>
            <label for="firstName">First Name</label>
            <b-form-input id="firstName" v-model="formData.first_name" placeholder="Enter your first name"></b-form-input>
              <b-form-input id="lastName" v-model="formData.last_name" placeholder="Enter your last name"></b-form-input>
          </form>
        </b-modal>
      <b-modal @ok="addTeacher()" id="modal-2" title="Add Teacher">
      <form>
          <label for="firstName">First Name</label>
          <b-form-input id="firstName" v-model="formData.first_name" placeholder="Enter your first name"></b-form-input>
          <label for="firstName">Last Name</label>
          <b-form-input id="lastName" v-model="formData.last_name" placeholder="Enter your last name"></b-form-input>
      </form>
      </b-modal>
  </div>
</template>

<script>
import axios from "axios";
import Teacher from './Teacher';

export default {
  components: {
    Teacher,
  },

  name: 'Teachers',
    data() {
      return {
      teachers: [],
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
      patchTeacher(teacherId) {
          axios.patch(`http://localhost:8765/api/teachers/edit/${teacherId}`, this.formData)
          .then(() => {
              this.load()
              this.editTeacher = null;
              this.$bvModal.hide('modal-1')
          });

      },
        addTeacher() {
          console.log(this.formData);
            axios.post(`http://localhost:8765/api/teachers/add`, this.formData)
                .then(() => {
                    this.load()
                });

        },
        deleteTeacher(teacherId) {
            axios.delete(`http://localhost:8765/api/teachers/delete/${teacherId}`)
                .then(() => {
                    this.load()
                });

        },

      onEdit(teacher) {
        this.$bvModal.show('modal-1')
        this.editTeacher = teacher;
        this.formData.first_name = teacher.first_name;
      },
        onAdd() {
            this.$bvModal.show('modal-2')

        },

    onDelete(teacher) {
        this.deleteTeacher(teacher.id);
    },

      onUpdate() {
        this.load();
      },

    load() {
        axios.get('http://localhost:8765/api/teachers/')
            .then(response => {
                console.log(response.data);
                this.teachers = response.data;
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
