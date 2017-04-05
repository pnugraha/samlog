
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <?php
        $actionName = Route::getCurrentRoute()->getActionName();
        $actionName = explode('Controllers\\', $actionName);
        $actionRaw = explode("\\", $actionName[1]);
        $actionData = explode('@', end($actionRaw));
        $base = $actionData[0];
        $controller = $actionData[0];
        $action = $actionData[1];
       
        $level_access = 1;       

        $sideMenuData = array(
            1 => array(
                'id' => 'header',
                'class' => 'header',
                'label' => 'MENU UTAMA',
                'level' => 'top_main',
                'base' => array()
            )
        );
        ?>

        <?php
        $sideMenuData[] = array(
            'id' => 'homes',
            'class' => 'treeview',
            'level' => 'main',
            'label' => 'Dashboard',
            'icon' => 'dashboard',
            'href' => route('home'),
            'user_level' => array(1),
            'base' => array('HomeController'),
            'child_class' => 'treeview-menu',
        );

        $sideMenuData[] = array(
            'id' => 'homes',
            'class' => 'treeview',
            'level' => 'main',
            'label' => 'Transaksi',
            'icon' => 'flag',
            'href' => route('order.index'),
            'user_level' => array(1),
            'base' => array('OrderController'),
            'child_class' => 'treeview-menu',
        );
        
        $submenu[] = array(
            'id' => 'pegawai',
            'class' => 'treeview',
            'level' => 'main',
            'label' => 'Users',
            'icon' => 'circle-o',
            'href' => route('user.index'),
            'user_level' => array(1),
            'controller' => array('UserController'),
            'child_class' => 'treeview-menu',
        );
        
        $submenu[] = array(
            'id' => 'pegawai',
            'class' => 'treeview',
            'level' => 'main',
            'label' => 'Customer',
            'icon' => 'circle-o',
            'href' => route('company.index'),
            'user_level' => array(1),
            'method' => 'index',
            'controller' => array('CompanyController'),
            'child_class' => 'treeview-menu',
        );
        
        $submenu[] = array(
            'id' => 'pegawai',
            'class' => 'treeview',
            'level' => 'main',
            'label' => 'Vendor Trucking',
            'icon' => 'circle-o',
            'href' => route('company.index_trucking'),
            'user_level' => array(1),
            'method' => 'index_trucking',
            'controller' => array('CompanyController'),
            'child_class' => 'treeview-menu',
        );
        
        $submenu[] = array(
            'id' => 'pegawai',
            'class' => 'treeview',
            'level' => 'main',
            'label' => 'Vendor Shipping',
            'icon' => 'circle-o',
            'href' => route('company.index_shipping'),
            'user_level' => array(1),
            'method' => 'index_shipping',
            'controller' => array('CompanyController'),
            'child_class' => 'treeview-menu',
        );     
        
        $submenu[] = array(
            'id' => 'pegawai',
            'class' => 'treeview',
            'level' => 'main',
            'label' => 'Vendor Dooring',
            'icon' => 'circle-o',
            'href' => route('company.index_dooring'),
            'user_level' => array(1),
            'method' => 'index_dooring',
            'controller' => array('CompanyController'),
            'child_class' => 'treeview-menu',
        );     


        $sideMenuData[] = array(
            'id' => 'setting',
            'class' => 'treeview',
            'level' => 'main',
            'label' => 'Master',
            'icon' => 'gears',
            'href' => '#',
            'user_level' => array(1),
            'base' => array('UserController', 'CompanyController'),
            'child_class' => 'treeview-menu',
            'has_child' => $submenu
        );

        $sideMenuData[] = array(
            'id' => 'setting',
            'class' => 'treeview',
            'level' => 'main',
            'label' => 'Logout',
            'icon' => 'sign-out',
            'href' => route('logout'),
            'user_level' => array(1),
            'base' => array('AuthController'),
            'child_class' => 'treeview-menu',
        );
        ?>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            @foreach ( $sideMenuData as $menu )
            @if ( $menu['level'] == 'top_main' )
            <li class="{{ $menu['class'] }}">{{ $menu['label'] }}</li>
            @elseif ( $menu['level'] == 'main' )
            @if ( in_array( $level_access, $menu['user_level'] ) )
            @if ( in_array( $base, $menu['base'] ) )
            <li class="{{ $menu['class'] }} active">
                @else
            <li class="{{ $menu['class'] }}">
                @endif
                <a href="{{ $menu['href'] }}">
                    <i class="fa fa-{{ $menu['icon'] }}"></i> <span>{{ $menu['label'] }}</span>

                    @if ( isset( $menu['has_child'] ) )
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    @endif
                </a>

                @if ( isset( $menu['has_child'] ) )
                <ul class="treeview-menu">
                    @foreach ( $menu['has_child'] as $sub_menu )
                    @if ( in_array( $level_access, $sub_menu['user_level'] ) )
                    @if ( !isset($sub_menu['method']) )
                    @if ( in_array($controller, $sub_menu['controller']) )
                    <li class="active">
                        @else
                    <li > 
                        @endif

                        <a href="{{ $sub_menu['href'] }}">
                            <i class="fa fa-{{ $sub_menu['icon'] }}"></i>
                            {{ $sub_menu['label'] }}
                            @if ( isset( $sub_menu['has_child'] ) )
                            <i class="fa fa-angle-left pull-right"></i>
                            @endif
                        </a>
                        @if ( isset( $sub_menu['has_child'] ) )
                        <ul class="treeview-menu">
                            @foreach ( $sub_menu['has_child'] as $sub_sub_menu )
                            @if ($sub_sub_menu['method'] == $action )
                            <li class="active">
                                @else
                            <li>

                                @endif

                                <a href="{{ $sub_sub_menu['href'] }}">
                                    <i class="fa fa-circle-o"></i> {{ $sub_sub_menu['label'] }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @else

                    @if ($action == $sub_menu['method'] && in_array($controller, $sub_menu['controller']))
                    <li class="active">
                        @else
                    <li >
                        @endif

                        <a href="{{ $sub_menu['href'] }}">
                            <i class="fa fa-{{ $sub_menu['icon'] }}"></i>
                            {{ $sub_menu['label'] }}
                            @if ( isset( $sub_menu['has_child'] ) )
                            <i class="fa fa-angle-left pull-right"></i>
                            @endif
                        </a>
                        @if ( isset( $sub_menu['has_child'] ) )
                        <ul class="treeview-menu">
                            @foreach ( $sub_menu['has_child'] as $sub_sub_menu )
                            @if ($sub_sub_menu['method'] == $action )
                            <li class="active">
                                @else
                            <li>

                                @endif

                                <a href="{{ $sub_sub_menu['href'] }}">
                                    <i class="fa fa-circle-o"></i> {{ $sub_sub_menu['label'] }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endif
                    @endif
                    @endforeach

                </ul>

                @endif

            </li>

            @endif
            @endif
            @endforeach

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
