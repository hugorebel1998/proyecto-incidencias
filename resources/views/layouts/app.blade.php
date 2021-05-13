<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Incidencias</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/adminlte.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @toastr_css
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-dark navbar-navy">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars text-white"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('home') }}" class="nav-link text-white">Inicio</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link text-white" data-toggle="dropdown">
                        | Perfil <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <p class="text-center"> {{ Auth::user()->name }}</p>
                        <span class="dropdown-header">{{ Auth::user()->email }}</span>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="{{ route('usuarios.edit', auth()->user()->id) }}">
                            <i class="fas fa-user-edit"></i> {{ __('Editar información') }}
                        </a>

                        <a class="dropdown-item" href="{{ route('usuarios.contrasena', auth()->user()->id) }}">
                            <i class="fas fa-unlock-alt"></i> {{ __('Cambiar cotraseña') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> {{ __('Cerrar Sesión') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-light-navy elevation-4">

            <a href="{{ url('/') }}" class="brand-link navbar-navy">
                <img src="{{ asset('admin-lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light text-white">Laravel</span>
            </a>
            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('admin-lte/dist/img/user1-128x128.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Usuarios
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('usuarios.index') }}" class="nav-link text-secondary">
                                        <i class="far fa-list-alt nav-icon"></i>
                                        <p>Gestión de usuarios</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('usuarios.create') }}" class="nav-link text-secondary">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Crear usuario</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-atlas"></i>
                                <p>
                                    Reportes
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('incidencias.index') }}" class="nav-link text-secondary">
                                        <i class="far fa-list-alt nav-icon"></i>
                                        <p>Gestión de reportes</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('incidencias.create') }}" class="nav-link text-secondary">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Crear reporte</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-folder-open"></i>
                                <p>
                                    Proyectos
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('proyectos.index') }}" class="nav-link text-secondary">
                                        <i class="far fa-list-alt nav-icon"></i>
                                        <p>Gestión de proyectos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('proyectos.create') }}" class="nav-link text-secondary">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Crear proyecto</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('proyectos.eliminados') }}" class="nav-link text-secondary">
                                        <i class="fas fa-ban nav-icon"></i>
                                        <p>Proyectos eliminados</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">            
            <main class="py-4">
                @yield('content')
            </main>
        </div>
        <footer class="main-footer text-center">
            <strong>&copy; 2020 E-commerce </strong> Todos los derechos reservados.
        </footer>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js') }}"></script>
    {{-- <link href="{{ asset('js/app.css') }}" rel="stylesheet"> --}}
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('admin-lte/plugins/select2/js/select2.full.min.js') }} "></script>
    <script src="{{ asset('admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    @yield('scripts')
    <!-- DataTables -->
    <script src="{{ asset('admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- AdminLTE App -->
    <!-- SweetAlert2 -->
    <script src="{{ asset('admin-lte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <script src="{{ asset('admin-lte/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin-lte/dist/js/demo.js') }} "></script>

    <!-- jquery-ui -->
    <!-- <script src="{{ asset('admin-lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('Multiple/jquery-multiple.js') }}"></script> -->

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "order": [
                    [0, 'desc']
                ],
                language: {
                    search: "Buscar:",
                    "lengthMenu": "Recorrer _MENU_ registros por página",
                    "zeroRecords": "No hay resultados",
                    "info": "Página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles ",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    paginate: {
                        first: "Primera",
                        previous: "Primera",
                        next: "Última",
                        last: "Último"
                    },
                }
            });
            $('#example3').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "order": [
                    [0, 'desc']
                ],
                language: {
                    search: "Buscar:",
                    "lengthMenu": "Recorrer _MENU_ registros por página",
                    "zeroRecords": "No hay resultados",
                    "info": "Página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles ",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    paginate: {
                        first: "Primera",
                        previous: "Primera",
                        next: "Última",
                        last: "Último"
                    },
                }
            });
            $('#example4').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "order": [
                    [0, 'desc']
                ],
                language: {
                    search: "Buscar:",
                    "lengthMenu": "Recorrer _MENU_ registros por página",
                    "zeroRecords": "No hay resultados",
                    "info": "Página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles ",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    paginate: {
                        first: "Primera",
                        previous: "Primera",
                        next: "Última",
                        last: "Último"
                    },
                }
            });
        });

    </script>

    <script>
        $(document).ready(function() {
            bsCustomFileInput.init();
        });

    </script>

    <script>
        $(function() {
            $('.select2').select2({
                theme: 'bootstrap4'
            })
        });

    </script>
    <script>
        $(document).ready(function() {
            $("#select-project").on('change', onSelectProjectChange);
        });

        function onSelectProjectChange() {
            var project_id = $(this).val();
            alert(project_id);

            // Peticion AJAX

        }

    </script>

</body>
@toastr_js
@toastr_render

</html>
