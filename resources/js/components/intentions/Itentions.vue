<template>
    <div>
        <div class="row justify-content-ce">
            <div class="col-12">
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
                            <td>{{ intention.data+ "-"+ intention.hora}}</td>
                            <td>{{ intention.type }}</td>
                        </tr>
                    </tbody>
                </table>
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
        }
    },
    mounted () {
        this.getIntentions(); 
    }
}
</script>

<style>

</style>
