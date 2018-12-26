<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-dark table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Aniversario</th>
                        <th scope="col">Data Cadastro</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(person, index) in persons" :key="index">
                        <td>{{ person.name }}</td>
                        <td>{{ person.dateofbirth }}</td>
                        <td>{{ person.id }}</td>
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
                axios.get('persons').then((res) => {
                    this.persons = res.data;
                });
            }
        },
        mounted() {
            this.getPersons()
        }
    }

</script>
