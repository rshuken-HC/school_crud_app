<template>
    <tr>
            <td>{{course.id}}</td>
            <td>{{course.title}}</td>
            <td>{{course.subject}}</td>
            <td>{{course.credits}}</td>
            <td>
                <button @click="$emit('edit', course)" type="button" class="btn">Edit</button>
                <button @click="$emit('delete', course)" type="button" class="btn">Delete</button>
            </td>
    </tr>
</template>

<script>

export default {
    name: "Course",
    data() {
      return {
      formData: {},
      }
    },
    props: {
        course: Object
    },

    methods: {

    // handleEditCourse(teacher) {
    //     this.editCourse = course;
    //     this.formData.first_name = teacher.first_name;
    //     this.formData.last_name = teacher.last_name;
    //     this.formData.total_credits_current = teacher.total_credits_current;
    // }
    }

}

</script>

<style scoped>

</style>
