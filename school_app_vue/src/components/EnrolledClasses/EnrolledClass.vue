<template>
    <tr>
        <td>{{ enrolledClass.id }}</td>
        <td>{{ enrolledClass.teacher_course.description }}</td>
        <td>{{ enrolledClass.teacher_course.start_date }}</td>
        <td>{{ enrolledClass.teacher_course.end_date }}</td>
        <td>
            <button @click="$emit('edit', enrolledClass)" type="button" class="btn">Edit</button>
            <button @click="$emit('delete', enrolledClass)" type="button" class="btn">Delete</button>
        </td>
    </tr>
</template>

<script>

export default {
    name: "EnrolledClass",
    data() {
        return {
            editTeacher: null,
            formData: {},
        }
    },
    props: {
        enrolledClass: Object
    },
    created() {
        //console.log('this is the enrolledCourse data', this.enrolledClass)
    },

    methods: {}

}

</script>

<style scoped>

</style>
