<template>
    <tr>
            <td>{{student.id}}</td>
            <td>{{student.first_name}}</td>
            <td>{{student.last_name}}</td>
            <td>{{student.major}}</td>
            <td>{{student.total_credits}}</td>
            <td>
                <button @click="$emit('edit', student)" type="button" class="btn">Edit</button>
                <button @click="$emit('delete', student)" type="button" class="btn">Delete</button>
            </td>

    </tr>
</template>

<script>

export default {
    name: "Student",
    data() {
      return {
      editStudent: null,
      formData: {},
      }
    },
    props: {
        student: Object
    },

    methods: {

    handelEditStudent(student) {
        this.editStudent = student;
        this.formData.first_name = student.first_name;
        this.formData.last_name = student.last_name;
        this.formData.major = student.major;
    }
    }

}

</script>

<style scoped>

</style>
