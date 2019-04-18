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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Paroquianos</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
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
                                <tr v-for="(person, index) in persons" :key="index">
                                    <td>{{ person.name }}</td>
                                    <td>{{ person.dateofbirth | dateToBR }}</td>
                                    <td>{{ person.cellphone }}</td>
                                    <td>{{ person.tellphone }}</td>
                                    <td>
                                        <router-link :to="{name: 'profile' ,params:{id: person.id}}" class="btn btn-outline-info btn-sm">
                                            <i class="fas fa-info-circle"></i>
                                        </router-link>
                                         <a @click="deletePerson(person.id, index)" class="btn btn-outline-secondary btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <a class="btn btn-outline-danger btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <router-link :to="{name: 'tithe-single', params:{id: person.id}}" class="btn btn-outline-success btn-sm">
                                            <i class="fas fa-money-bill-wave"></i>
                                        </router-link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                         <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                 <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="getPersons(pagination.prev_page_url)">Anterior</a></li>
    
                                 <li class="page-item disabled"><a class="page-link text-dark" href="#">Pagina {{ pagination.current_page }} De {{ pagination.last_page }}</a></li>
        
                                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="getPersons(pagination.next_page_url)">Proximo</a></li>
                            </ul>
                        </nav>
                    </div>
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
                dizimo: 0,
                birthdays: 0,
                weeding: 0,
                pagination: {},
                dataCollection: null,
            }
        },
        methods: {
            getPersons(pageUrl) {
                let vm = this;
                pageUrl = pageUrl || 'persons';

                axios.get(pageUrl)
                .then(res => {
                    this.persons = res.data.data;
                    vm.makePagination(res.data.meta, res.data.links);
                }).catch((res) => {

                });
            },

            getTotalPersons() {
                axios.get('total/person').then((res) => {
                    this.totalPerson = res.data; 
                }).catch((res) => {
                    console.log(res);
                });
            },

            getTotalTithe() {
                axios.get('tithe/total').then((res) => {
                    this.dizimo = res.data;
                }).catch((res)=>{
                    console.log(res);
                });
            },

            // getBirthdays() {
            //     axios.get('person/birthdays').then((res) => {
            //         if (res) {
            //             this.birthdays = res.data;
            //         } else {
            //             this.birthdays = 0;
            //         }
            //     }).catch((res) => {

            //     });
            // },

            // getWeedingDay() {
            //     axios.get('weeding',{
            //         headers:{
            //              Authorization: 'Bearer ' + localStorage.getItem('access_token')
            //         }
            //     }).then((res)=>{
            //         this.weeding = res.data;
            //     }).catch((res)=>{
            //         console.log();
            //     });
            // },

            makePagination(meta, links) {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                };
                this.pagination = pagination;
            },

            deletePerson(id, index){
                axios.delete('persons/'+id,{
                    headers:{
                         Authorization: 'Bearer ' + localStorage.getItem('access_token')
                    }
                }).then((response) => {
                    console.log(response.data);
                    this.persons.splice(index, 1);
                }).catch((response) => {

                });
            }
        },
        mounted() {
            this.getPersons();
            this.getTotalPersons();
            this.getTotalTithe();
            this.getBirthdays();
            this.getWeedingDay();
            // this.getDataGraphic();
        }
    }
</script>
