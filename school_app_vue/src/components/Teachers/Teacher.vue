<template>
    <tr>
            <td>{{teacher.id}}</td>
            <td>{{teacher.first_name}}</td>
            <td>{{teacher.last_name}}</td>
            <td>{{teacher.total_credits_current}}</td>
            <td>{{teacher.total_credits}}</td>
            <td>
                <button @click="$emit('edit', teacher)" type="button" class="btn">Edit</button>
                <button @click="$emit('delete', teacher)" type="button" class="btn">Delete</button>
            </td>
    </tr>
</template>

<script>

export default {
    name: "Teacher",
    data() {
      return {
      editTeacher: null,
      formData: {},
      }
    },
    props: {
        teacher: Object
    },

    methods: {

    }

}

</script>

<style scoped>

</style>
