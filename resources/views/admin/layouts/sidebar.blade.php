<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header">
            <a class="header-brand" href="index.html">
                <span class="text">Ares Saúde</span>
            </a>
            <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
            <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
        </div>
        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">
                    <div class="nav-lavel">Navigation</div>
                        <div class="nav-item active">
                            <a href="{{ url('dashboard') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                        </div>
                        @if(auth()->check() && auth()->user()->role->name === 'admin')
                            <div class="nav-item has-sub">
                                <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Doctor</span></a>
                                <div class="submenu-content">
                                    <a href="{{ route('doctor.index') }}" class="menu-item">Lista de Doutores Cadastrados</a>
                                    <a href="{{ route('doctor.create') }}" class="menu-item">Adicionar novo Doutor</a>
                                </div>
                            </div>
                        @endif

                        @if(auth()->check() && auth()->user()->role->name === 'doctor' )
                            <div class="nav-item has-sub">
                                <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Appointment Time</span></a>
                                <div class="submenu-content">
                                    <a href="{{ route('appointment.index') }}" class="menu-item">View Appointment's List</a>
                                    <a href="{{ route('appointment.create') }}" class="menu-item">Create Appointment</a>
                                </div>
                            </div>
                        @endif

                        @if(auth()->check() && auth()->user()->role->name === 'doctor')
                            <div class="nav-item has-sub">
                                <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Patients</span></a>
                                <div class="submenu-content">
                                    <a href="{{ route('patients.today') }}" class="menu-item">Pacientes de Hoje</a>
                                    <a href="{{ route('all.appointmens') }}" class="menu-item">Todos os agendamentos</a>
                                </div>
                            </div>
                        @endif
                        
                        <div class="nav-item active">
                            <a onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            href="{{ route('logout') }}"><i class="ik ik-power dropdown-icon"></i>
                            </i><span>Logout</span></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        </div>
                </nav>
            </div>
        </div>
    </div>
