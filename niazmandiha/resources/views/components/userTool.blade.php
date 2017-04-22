<ul >
    <li class="list-group-item active" >                     <span class="menu-user-icon glyphicon glyphicon-user"></span>منوی کاربری</li>
    <li><a class="list-group-item" href="/user">             <span class="menu-user-icon glyphicon glyphicon-menu-hamburger"></span>آگهی های من </a></li>
    <li><a class="list-group-item" href="/user/markpost">    <span class="menu-user-icon  glyphicon glyphicon-bookmark"></span>آگهی های نشان شده </a></li>
    <li><a class="list-group-item" href="/user/recentlypost"><span class="menu-user-icon  glyphicon glyphicon-time"></span>باز دید های اخیر </a></li>
    <li><a class="list-group-item" href="/user/setting">     <span class="menu-user-icon glyphicon glyphicon-cog"></span>تنظیمات کاربری</a></li>
    <hr>
    @if(Gate::allows('isadmin'))
        <li><a class="list-group-item btn-danger" href="/user/admin/verify"><span class="menu-user-icon glyphicon glyphicon-ok"></span>تایید پست های کاربران</a></li>
    @endif

    @if(Gate::allows('isSuperAdmin'))
        <li><a class="list-group-item btn-danger" href="/user/superadmin/addadmin"><span class="menu-user-icon glyphicon glyphicon-plus"></span>اضافه کردن مدیر</a></li>
    @endif

</ul>