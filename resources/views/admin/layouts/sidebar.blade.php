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
                <i class="bx bx-detail"></i>
                <span key="t-chat">Blog</span>
            </a>
        </li>

        <li>
            <a href="{{ URL::to('admin/category') }}" class="waves-effect">
                <i class="bx bx-detail"></i>
                <span key="t-chat">Category</span>
            </a>
        </li>
        <li>
            <a href="{{ URL::to('admin/product') }}" class="waves-effect">
                <i class="bx bx-detail"></i>
                <span key="t-chat">Product</span>
            </a>
        </li>
        <li>
            <a href="{{ URL::to('admin/user') }}" class="waves-effect">
                <i class="bx bx-detail"></i>
                <span key="t-chat">Users</span>
            </a>
        </li>
        <li>
            <a href="{{ URL::to('admin/order') }}" class="waves-effect">
                <i class="bx bx-detail"></i>
                <span key="t-chat">Order</span>
            </a>
        </li>
        
        

    </ul>
</div>
<!-- Sidebar -->