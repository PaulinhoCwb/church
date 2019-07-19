<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">{{ title }} do mês {{ mes+1 }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Esposo</th>
                                <th>Esposa</th>
                                <th>Data Casamento</th>
                                <th>Endereço</th>
                                <th>CEP</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(person, index) in marriages" :key="index">
                                <td>{{ person.people.name }}</td>
                                <td>{{ person.name }}</td>
                                <td>{{ person.weddingdata | dateToBR }}</td>
                                <td>{{ person.people.address }}</td>
                                <td>{{ person.people.zipcode }}</td>
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
    name: "Marriage",
    data () {
        return {
            title: "Aniversariante Casamento",
            marriages: [],
            mes: new Date().getMonth(),
        }
    },
    methods: {
        getPersonsBirthdays () {
            axios.get('weeding',{
                headers: {
                    Authorization: 'Bearer '+window.sessionStorage.getItem('access_token')
                }
            }).then( response => {
                this.marriages = response.data;
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
