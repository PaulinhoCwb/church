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
        getIntentions () {
            let vm = this;
            pageUrl = pageUrl || 'intentions';
            fetch(pageUrl).then(res => res.json()).then(res => {
                this.intentions = res.data;
                // vm.makePagination(res.meta, res,links);
            }).catch();
        }
    }
}
</script>

<style>

</style>
