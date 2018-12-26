<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Aniversario</th>
                        <th scope="col">Data Cadastro</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(person, index) in persons.data" :key="index">
                        <td>{{ person.name }}</td>
                        <td>{{ person.dateofbirth | dateToBR }}</td>
                        <td>{{ person.create_at | dateToBR }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'dashboard',
        data: function () {
            return {
                title: "Dashboard",
                name: "João paulo",
                persons: []
            }
        },
        methods: {
            getPersons() {
                this.$Progress.start();
                axios.get('persons').then((res) => {
                    this.persons = res.data;
                });
                this.$Progress.finish()
            }
        },
        mounted() {
            this.getPersons()
        }
    }

</script>
