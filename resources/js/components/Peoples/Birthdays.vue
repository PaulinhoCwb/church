<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">{{ title }} do mês {{ mes+1 }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(person, index) in birthdays" :key="index">
                                <td>{{ person.name }}</td>
                                <td>{{ person.dateofbirth | dateToBR }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Birthdays",
    data () {
        return {
            title: "Aniversariantes",
            birthdays: [],
            mes: new Date().getMonth(),
        }
    },
    methods: {
        getPersonsBirthdays () {
            axios.get('birthdaysPersons',{
                headers: {
                    Authorization: 'Bearer '+window.sessionStorage.getItem('access_token')
                }
            }).then( response => {
                this.birthdays = response.data.data;
            })
            .catch(response => {
                console.log('erro ao carregar dados');
                
            });
        }
    },
    mounted () {
        this.getPersonsBirthdays();
    }
}
</script>

<style>

</style>
