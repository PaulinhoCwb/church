<template>
    <div>
        <div class="row justify-content-ce">
            <div class="col-12">
                <table>
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Contato</th>
                            <th>Mensagem</th>
                            <th>Horario Missa</th>
                            <th>Tipo</th>
                        </tr>
                    </thead>
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

        }
    },
    methods: {
        getIntentions () {
            let vm = this;
            pageUrl = pageUrl || 'intentions';
        }
    }
}
</script>

<style>

</style>
