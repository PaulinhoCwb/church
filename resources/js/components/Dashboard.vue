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
                <span class="info-box-number">R$ {{ dizimo }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
             <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger-gradient"><i class="fas fa-birthday-cake"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Aniversariates do mês</span>
                <span class="info-box-text">{{ birthdays }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
           <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning-gradient"><i class="fas fa-birthday-cake"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Casamentos do mês</span>
                <span class="info-box-number">{{ weeding }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        Dizimo mensal
                    </div>
                    <div class="card-body">
                         <graphic height="300"></graphic>
                    </div>
                </div>
            </div>
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
    import Graphic from './Graphic/Graphic';
    export default {
        name: 'dashboard',
        components: {
            Graphic
        },
        data: function () {
            return {
                title: "Dashboard",
                persons: [],
                totalPerson: '',
                dizimo: 0,
                birthdays: 0,
                weeding: 0,
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
            },

            getTotalTithe() {
                axios.get('/tithe/total').then((res) => {
                    console.log(res);
                    this.dizimo = res.data;
                }).catch((res)=>{
                    console.log(res);
                });
            },

            getBirthdays() {
                axios.get('person/birthdays').then((res) => {
                    if (res) {
                        this.birthdays = res.data;
                    } else {
                        this.birthdays = 0;
                    }
                }).catch((res) => {

                });
            },

            getWeedingDay() {
                axios.get('weeding').then((res)=>{
                    this.weeding = res.data;
                }).catch((res)=>{
                    console.log();
                });
            }
        },
        mounted() {
            this.getPersons();
            this.getTotalPersons();
            this.getTotalTithe();
            this.getBirthdays();
            this.getWeedingDay();
        }
    }
</script>
