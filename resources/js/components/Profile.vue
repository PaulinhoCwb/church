<template>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">Profile - {{ nome }}</div>

                    <div class="card-body">
                        Perfil da pessoa
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        name: "profile",
        data () {
            return {
                nome: 'Joao Paulo'
         }}
    }
</script>