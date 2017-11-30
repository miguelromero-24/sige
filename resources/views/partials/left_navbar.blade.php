<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="active">
                <a class="" href="{{ route('home') }}">
                    <i class="icon_house_alt"></i>
                    <span>Main</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_shield"></i>
                    <span>Seguridad</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ route('users.index') }}"><i class="icon_profile"></i> Usuarios</a></li>
                    <li><a href="{{ route('roles.index') }}"><i class="icon_balance"></i> Roles</a></li>
                    <li><a href="{{ route('permissions.index') }}"><i class="icon_bag"></i> Permisos</a></li>
                    {{--<li><a class="" href="grids.html">Grids</a></li>--}}
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="icon_cogs"></i>
                    <span>Administracion</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a href="{{ route('supervisions.index') }}"><i class="icon_briefcase"></i> Supervisiones</a></li>
                    <li><a href="{{ route('schools.index') }}"><i class="icon_building"></i> Colegios</a></li>
                    <li><a href="{{ route('teachers.index') }}"><i class="icon_archive"></i> Docentes</a></li>
                    <li><a href="{{ route('inscriptions.index') }}"><i class="icon_archive"></i> Inscripciones</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="icon_archive"></i>
                    <span>Gestiones</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a href="{{ route('courses.index') }}"><i class="icon_bag"></i> Cursos</a></li>
                    <li><a href="#"><i class="icon_tablet"></i> Estudiantes</a></li>
                    <li><a href="{{ route('teachers.index') }}"><i class="icon_check"></i> Materias</a></li>
                    <li><a href="{{ route('inscriptions.index') }}"><i class="icon_calculator_alt"></i> Calificaciones</a></li>
                </ul>
            </li>
            {{--<li class="sub-menu">--}}
                {{--<a href="javascript:;" class="">--}}
                    {{--<i class="icon_profile"></i>--}}
                    {{--<span>Usuarios</span>--}}
                    {{--<span class="menu-arrow arrow_carrot-right"></span>--}}
                {{--</a>--}}
                {{--<ul class="sub">--}}
                    {{--<li><a class="" href="general.html">Lista</a></li>--}}

                    {{--<li><a class="" href="grids.html">Grids</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->