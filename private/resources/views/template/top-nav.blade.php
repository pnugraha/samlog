<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">      
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
<!--                <img src="{{ url('/assets/theme/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">-->
                <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">         
                <li class="user-header">
<!--                    <img src="{{ url('/assets/theme/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">-->
                    <p>
                        {{ Auth::user()->name }}                         
                    </p>
                </li>  

                <li class="user-footer">
                    <div class="pull-left">
                        <a class="btn btn-default btn-flat"  href="{{ url('/auth/change_password') }}">
                           Ubah Password
                        </a>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('/auth/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                </li>
            </ul>
        </li>


    </ul>
</div>

