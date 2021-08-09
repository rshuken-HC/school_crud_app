<template>
    <div class="welcome">
        <h1>Welcome to the Student CRUD App</h1>
        <div class="blurb">
            <p>This app allows you to add and manage students, teachers, courses and enrolled classes. Navigate using
                the top menu bar. </p>
        </div>
        <h2>Technology Used</h2>
        <div class="technology">
            <p>Frontend: VueJS and Vue-Bootstrap</p>
            <p>Backend: CakePHP</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "Home"
}
</script>

<style scoped>

.welcome {
    text-align: center;
    margin: 20px auto;
}

.blurb {
    margin: 0 20%;
}

.technology {
    display: flex;
    flex-direction: row;
    margin: 0 auto;
    text-align: center;
    justify-content: space-evenly;
}
</style>
