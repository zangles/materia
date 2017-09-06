<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                @include('menu.partials.profile')
            </li>
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a href="{{ route('home') }}"><i class="fa fa-shield"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            @foreach(Module::getOrdered() as $module)
                @can('view', config($module->alias.'.PolicityClass'))
                    <li class="{{ Request::is($module->alias.'*') ? 'active' : '' }}">
                        <a href="{{ route($module->alias.'.index') }}">
                            <i class="fa {{ config($module->alias.'.icon') }}"></i>
                            <span class="nav-label">{{ trans($module->alias.'::general.module_title') }}</span>
                        </a>
                    </li>
                @endcan
            @endforeach
        </ul>
    </div>
</nav>