<template>
    
        <div class="row justify-content-center">
            <div class="col-md-12">
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-info-active">
                            <h3 class="widget-user-username">{{ name }}</h3>
                            <!-- <h5 class="widget-user-desc">Founder &amp; CEO</h5> -->
                        </div>
                        <div class="widget-user-image">
                            <!-- <img class="img-circle elevation-2" src="" alt="User Avatar"> -->
                            <i class="fas fa-user fa-2x img-circle elevation-2"></i>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Dependentes</h5>
                                        <span class="description-text">{{ totalDependets.length }}</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">13,000</h5>
                                        <span class="description-text">FOLLOWERS</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">Cadastrado realizado</h5>
                                        <span class="description-text">{{ cadastradoAt }}</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    
                    <!-- /.widget-user -->
                </div>
            </div>
            <div class="col-md-12">
            <div class="card card-info collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Dependentes</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: none;">
                <div class="table-responsive">
                    <table>
                        <thead class="table">
                            <tr>
                                <th>Nome</th>
                                <th class="center">Tipo dependencia</th>
                                <th>Data Aniversario</th>
                                <th>Data Casamento</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(dependent, index) in totalDependets" :key="index">
                                <td>{{ dependent.name }}</td>
                                <td class="text-center">{{ (dependent.type == 'F') ? 'FILHO' : 'CONJUGUE' }}</td>
                                <td class="text-center">{{ dependent.dateofbirth | dateToBR }}</td>
                                <td class="text-center">{{ dependent.weddingdata | dateToBR }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
</template>

<script>
    export default {
        name: "profile",
        data() {
            return {
                name: '',
                totalDependets: [],
                cadastradoAt: '',
                idPerson: this.$route.params.id
            }
        },
        methods: {
            getProfile () {
                axios.get('persons/'+this.idPerson).then((res) => {
                    console.log(res.data.name);
                    this.name = res.data.name;
                    this.totalDependets = res.data.dependents;
                    this.cadastradoAt = res.data.created_at;
                });
            }
        },
        mounted() {
            this.getProfile();
        }
    }

</script>
