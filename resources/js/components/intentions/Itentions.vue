<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Intenções</h3>
                        <div class="card-tools">
                            <a href="https://santuariosantateresinha41.com.br/invoice-pdf" target="blank" class="btn btn-outline-primary btn-sm">Gerar arquivo</a>
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(intention, index) in intentions" :key="index">
                                    <td>{{ intention.data }}</td>
                                    <td>{{ intention.contato }}</td>
                                    <td>{{ (intention.intencao)? intention.intencao: "---"}}</td>
                                    <td>{{ intention.data | dateToBR }} - {{ intention.hora }}</td>
                                    <td>{{ (intention.type == 1) ? "Missa" : "Ação de Graças / Pedidos" }}</td>
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
            axios.get(pageUrl).then((res) => {
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
        }
    },
    mounted () {
        this.getIntentions(); 
    }
}
</script>

<style>

</style>
