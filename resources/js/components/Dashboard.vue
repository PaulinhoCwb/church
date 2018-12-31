<template>
    <div>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Paroquianos Cadastrados</span>
                <span class="info-box-number">{{ totalPerson }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-hand-holding-usd"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Dizimo</span>
                <span class="info-box-number">R$ 410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Aniversario</th>
                                <th scope="col">Celular</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(person, index) in persons.data" :key="index">
                                <td>{{ person.name }}</td>
                                <td>{{ person.dateofbirth | dateToBR }}</td>
                                <td>{{ person.cellphone }}</td>
                                <td>{{ person.tellphone }}</td>
                                <td>
                                    <router-link :to="{name: 'profile' ,params:{id: person.id}}" class="btn btn-outline-info btn-sm">
                                        <i class="fas fa-info-circle"></i>
                                    </router-link>
                                     <a href="" class="btn btn-outline-secondary btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                    <a href="" class="btn btn-outline-danger btn-sm">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <router-link :to="{name: 'tithe-single', params:{id: person.id}}" class="btn btn-outline-success btn-sm">
                                        <i class="fas fa-money-bill-wave"></i>
                                    </router-link>
                                </td>
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
        name: 'dashboard',
        data: function () {
            return {
                title: "Dashboard",
                persons: [],
                totalPerson: '',
            }
        },
        methods: {
            getPersons() {
                this.$Progress.start();
                axios.get('persons').then((res) => {
                    this.persons = res.data;
                });
                this.$Progress.finish()
            },

            getTotalPersons() {
                axios.get('total/person').then((res) => {
                    console.log(res);
                    this.totalPerson = res.data; 
                }).catch((res) => {
                    console.log(res);
                });
            }
        },
        mounted() {
            this.getPersons();
            this.getTotalPersons();
        }
    }

</script>
