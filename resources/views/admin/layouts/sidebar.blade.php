<!--- Sidemenu -->
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title" key="t-menu">Menu</li>
        <li>
            <a href="{{ URL::to('admin/dashboard') }}" class="waves-effect">
                  <i class="bx bx-home-circle"></i>
                <span key="t-chat">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ URL::to('admin/blog') }}" class="waves-effect">
               <i class="bx bx-layout"></i>
                <span key="t-chat">Blog</span>
            </a>
        </li>
        <li>
            <a href="{{ URL::to('admin/giftcard') }}" class="waves-effect">
               <i class="bx bx-layout"></i>
                <span key="t-chat">Coupons</span>
            </a>
        </li>

        <li>
            <a href="{{ URL::to('admin/category') }}" class="waves-effect">
               <i class="bx bx-file"></i>
                <span key="t-chat">Category</span>
            </a>
        </li>
        <li>
            <a href="{{ URL::to('admin/product') }}" class="waves-effect">
               <i class="bx bx-briefcase-alt-2"></i>
                <span key="t-chat">Product</span>
            </a>
        </li>
        <li>
            <a href="{{ URL::to('admin/user') }}" class="waves-effect">
               <i class="bx bx-user-circle"></i>
                <span key="t-chat">Users</span>
            </a>
        </li>
        <li>
            <a href="{{ URL::to('admin/order') }}" class="waves-effect">
                <i class="bx bx-task"></i>
                <span key="t-chat">Order</span>
            </a>
        </li>
         <li>
            <a href="{{ URL::to('admin/settings') }}" class="waves-effect">
                <i class="bx bx-task"></i>
                <span key="t-chat">Settings</span>
            </a>
        </li>
         <li>
            <a class="waves-effect" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
<i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                             <span key="t-logout"> Logout</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
        

    </ul>
</div>
<!-- Sidebar -->