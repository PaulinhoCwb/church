<template>
    <div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Church System</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Entre para iniciar sua sessão</p>

      <form @submit.prevent="login">
        <div class="input-group mb-3">
          <input type="email" class="form-control" v-model="username" placeholder="Email">
          <div class="input-group-append">
              <span class="fa fa-envelope input-group-text"></span>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" v-model="senha" class="form-control" placeholder="Senha">
          <div class="input-group-append">
              <span class="fa fa-lock input-group-text"></span>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
             <button type="submit" class="btn btn-primary btn-block btn-flat">
              Entrar
             </button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
</template>

<script>
import { mapActions } from 'vuex'
export default {
    name: 'login',
    data () {
        return {
            username:'',
            senha: ''
        }
    },
    methods: {
        login () {
            axios.post('login',{
              'username': this.username,
              'password': this.senha,
            }).then((res) => {
              if (res.data.access_token) {
                window.sessionStorage.setItem('access_token', res.data.access_token);
                if (window.sessionStorage.getItem('access_token')) {
                    setTimeout(() => {
                        this.$router.push('/master');
                    }, 3000);
                }
              } else {
                toast({
                    type: 'warning',
                    title: 'Erro ao validar dados, por favor tente novamente!'
                });
              }
              
            }).catch((res) => {
                toast({
                    type: 'error', 
                    title: 'Usuario ou senha não conferem'
                });
            });
        },
        verificaToken () {
          if (window.sessionStorage.getItem('access_token')) {
            this.$router.push('/master');
          }
        } 
    },
    created () {
      this.verificaToken();
    }
}
</script>

<style>

</style>
