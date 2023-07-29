<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="https://img.freepik.com/free-photo/social-media-networking-online-communication-connect-concept_53876-124862.jpg?w=1380&t=st=1687850771~exp=1687851371~hmac=c3925d5b547f7a0de46d929d3baef84beee4fcb1f8973af1b8386feb62fc6e02" 
        style="width: 53px; height: 50px;">
        <div>
            <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
        </div>
    </div>
    <ul class="app-menu">
        @if(Auth::id())
            @php
                $role = Auth()->user()->role;
            @endphp
            @if($role == 'user')
                <li>
                    <a class="app-menu__item active" href="{{ route('home') }}">
                        <i class="app-menu__icon fa fa-dashboard"></i>
                        <span class="app-menu__label">Dashboard</span>
                    </a>
                </li>
            @endif
            @if($role == 'admin')
                <li>
                    <a class="app-menu__item {{ Request::is('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="app-menu__icon fa fa-dashboard"></i>
                        <span class="app-menu__label">Dashboard</span>
                    </a>
                </li>

                <li class="treeview">
                    <a class="app-menu__item {{ Request::is('users*') ? 'active' : '' }}" href="#" data-toggle="treeview">
                        <i class="app-menu__icon fa fa-th-list"></i>
                        <span class="app-menu__label">Users</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a class="treeview-item {{ Request::is('users') ? 'active' : '' }}" href="{{ route('users.index') }}">
                                <i class="icon fa fa-circle-o"></i>
                                All Users
                            </a>
                        </li>
                        <li>
                            <a class="treeview-item {{ Request::is('create') ? 'active' : '' }}" href="{{ route('create') }}">
                                <i class="icon fa fa-circle-o"></i>
                                Add New
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview ">
                    <a class="app-menu__item {{ Request::is('posts*') ? 'active' : '' }}" href="#" data-toggle="treeview">
                        
                        <i class="app-menu__icon fa fa-th-list"></i>
                        
                        <span class="app-menu__label">Posts</span>
                        
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a class="treeview-item {{ Request::is('posts') ? 'active' : '' }}" href="{{ route('posts.index') }}">
                                <i class="icon fa fa-circle-o"></i>
                                All Posts
                            </a>
                        </li>
                        <li>
                            <a class="treeview-item {{ Request::is('posts/create') ? 'active' : '' }}" href="{{ route('posts.create') }}">
                                <i class="icon fa fa-circle-o"></i>
                                Add New
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview ">
                    <a class="app-menu__item {{ Request::is('categories*') ? 'active' : '' }}" href="#" data-toggle="treeview">
                        <i class="app-menu__icon fa fa-th-list"></i>
                        <span class="app-menu__label">Categories</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a class="treeview-item {{ Request::is('categories') ? 'active' : '' }}" href="{{ route('categoriess.index') }}">
                                <i class="icon fa fa-circle-o"></i>
                                All Categories
                            </a>
                        </li>
                        <li>
                            <a class="treeview-item {{ Request::is('categories/create') ? 'active' : '' }}" href="{{ route('categories.create') }}">
                                <i class="icon fa fa-circle-o"></i>
                                Add New
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a class="app-menu__item {{ Request::is('comments*') ? 'active' : '' }}" href="#" data-toggle="treeview">
                        <i class="app-menu__icon fa fa-th-list"></i>
                        <span class="app-menu__label">Comments</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a class="treeview-item {{ Request::is('comments') ? 'active' : '' }}" href="{{ route('comments.index') }}">
                                <i class="icon fa fa-circle-o"></i>
                                All Comments
                            </a>
                        </li>
                        <li>
                            <a class="treeview-item {{ Request::is('comments/create') ? 'active' : '' }}" href="{{ route('comments.create') }}">
                                <i class="icon fa fa-circle-o"></i>
                                Add New
                            </a>
                        </li>
                    </ul>
                </li>
                

            @endif
        @endif
    </ul>
</aside>
<style type="text/css">
    .app-menu__item.active
    {
        color: yellow;
    }
    .treeview-item.active {
        color: greenyellow;
    }
</style>

