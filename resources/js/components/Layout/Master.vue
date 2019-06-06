<template>
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="#" @click.prevent="logout" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </nav> 
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link text-center">
                <!-- <img src="" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
                <span class="brand-text font-weight-light">Santuario</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <!-- <img src="" class="img-circle elevation-2" alt="User Image"> -->
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Santa Teresinha do Menino Jesus</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <router-link to="/dashboard" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt text-blue"></i>
                                <p>
                                    Dashboard
                                </p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/form" class="nav-link">
                                <i class="nav-icon fas fa-pen-nib"></i>
                                <p>
                                    Cadastro
                                </p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/event" class="nav-link">
                                <i class="nav-icon fas fa-calendar"></i>
                                <p>
                                    Evento
                                </p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/tithe" class="nav-link">
                                <i class="nav-icon fas fa-money-bill-alt text-cash"></i>
                                <p>
                                    Dizimo
                                </p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/search" class="nav-link">
                                <i class="nav-icon fas fa-search text-white"></i>
                                <p>
                                    Pesquisas
                                </p>
                            </router-link>
                        </li>
                         <li class="nav-item">
                            <router-link to="/news" class="nav-link">
                                <i class="nav-icon fas fa-newspaper text-white"></i>
                                <p>
                                    Noticias
                                </p>
                            </router-link>
                        </li>
                         <li class="nav-item">
                            <router-link to="/intencoes" class="nav-link">
                                <i class="nav-icon fas fa-pray text-white"></i>
                                <p>
                                    Intenções
                                </p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/users" class="nav-link">
                                <i class="nav-icon fas fa-users text-white"></i>
                                <p>
                                    Usuarios
                                </p>
                            </router-link>
                        </li>
                          <li class="nav-item">
                            <router-link to="/catequese" class="nav-link">
                                <i class="nav-icon fas fa-users text-white"></i>
                                <p>
                                    Catequese
                                </p>
                            </router-link>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0 text-dark">Santuario Santa Teresinha do Menino Jesus</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <router-view></router-view>

                    <vue-progress-bar></vue-progress-bar>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        
         <footer class="main-footer">
        
            <div class="float-right d-none d-sm-inline">
                Version 1.1
            </div>
    
            <strong>Copyright &copy; 2019 <a href="#">JpWebDev</a>.</strong> All rights reserved.
        </footer>
    </div>
</template>

<script>
    export default {
        name: 'master',
        data() {
            return {
                token:""
            }
        },
        methods: {
            logout () {
                axios.post('logout',{},{
                    headers: {
                        Authorization: 'Bearer '+ window.sessionStorage.getItem('access_token')
                    }
                })
                .then((res) => {
                    toast({
                        type: 'success',
                        title: 'Você está saindo do sistema'
                    });
                    window.sessionStorage.removeItem('access_token');
                    this.$router.push('/');
                }).catch((res) => {
                    toast({
                        type: 'error',
                        title: 'Erro ao fazer logout'
                    });
                });
            }
        },
        created () {
            if (window.sessionStorage.getItem('access_token')) {
                this.token = window.sessionStorage.getItem('access_token');
            } 
        }
    }

</script>
