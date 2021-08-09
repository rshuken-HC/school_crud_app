<template>
    <div>
        <b-navbar toggleable="lg" type="dark" variant="info">
            <b-navbar-brand class="nav-nav" href="/">School CRUD App</b-navbar-brand>

            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                    <b-nav-item>
                        <router-link to="/students">Students</router-link>
                    </b-nav-item>
                    <b-nav-item>
                        <router-link to="/teachers">Teachers</router-link>
                    </b-nav-item>
                    <b-nav-item>
                        <router-link to="/courses">Courses</router-link>
                    </b-nav-item>
                    <b-nav-item>
                        <router-link to="/enrolled-classes">Enrolled Classes</router-link>
                    </b-nav-item>
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
    </div>
</template>

<script>
export default {
    data() {
        return {}
    }
}
</script>


<style scoped>
.nav-nav {
    margin-left: 7%;
}

</style>
