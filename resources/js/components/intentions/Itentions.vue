<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Intenções</h3>
                        <div class="card-tools">
                            <a href="https://santuariosantateresinha41.com.br/invoice" target="_blank" class="btn btn-outline-primary btn-sm">Gerar arquivo</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Contato</th>
                                    <th>Mensagem</th>
                                    <th>Horario Missa</th>
                                    <th>Tipo</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(intention, index) in intentions" :key="index">
                                    <td>{{ intention.data | dateToBR }}</td>
                                    <td>{{ intention.contato }}</td>
                                    <td>{{ (intention.intencao)? intention.intencao: "---"}}</td>
                                    <td>{{ intention.data | dateToBR }} <br/> {{ intention.hora | hourFormat }}</td>
                                    <td>{{ (intention.type == 1) ? "Missa" : "Ação de Graças / Pedidos" }}</td>
                                    <td>
                                        <button @click="deleteIntention(intention.id, index)" class="btn btn-outline-secondary btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from 'moment';
export default {
    name: "intencoes",
    data () {
        return {
            intentions: []
        }
    },
    methods: {
        getIntentions (pageUrl) {
            let vm = this;
            pageUrl = pageUrl || 'intentions';
            axios.get(pageUrl,{
                    headers: {
                         Authorization: 'Bearer ' + window.sessionStorage.getItem('access_token')
                    }
                }).then((res) => {
                this.intentions = res.data.data
            }).catch();
        },

        getPDF(){
            axios.get('intentions/pdf',{
                responseType: 'blob'
            })
            .then((res) => {
                console.log(res);
                let blob = new Blob([res.data], { type: 'application/pdf' });
                let link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = 'test.pdf';
                link.click();
            })
            .catch((res) => {

            });
        },

        deleteIntention(id, index) {
            axios.delete('',{
                    headers: {
                         Authorization: 'Bearer ' + window.sessionStorage.getItem('access_token')
                    }
            })
            .then((res)=> {

            })
            .catch((res) => {

            });
        }
    },
    created () {
        this.getIntentions(); 
    },
    filters: {
        hourFormat: function (value) {
            return moment(value,'HH:mm').format('HH:mm');
        }
    }
}
</script>

<style>

</style>
