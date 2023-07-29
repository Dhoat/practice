<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="https://img.freepik.com/free-photo/social-media-networking-online-communication-connect-concept_53876-124862.jpg?w=1380&t=st=1687850771~exp=1687851371~hmac=c3925d5b547f7a0de46d929d3baef84beee4fcb1f8973af1b8386feb62fc6e02" 
        style="  width: 53px;
       height: 50px;">
        <div>
            <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
        </div>
    </div>
    <ul class="app-menu">
        <?php if(Auth::id()){
            $role = Auth()->user()->role;
            if($role == 'user'){ ?>
                <li><a class="app-menu__item <?php echo (Request::is('home*')) ? 'active' : ''; ?>" href="{{ route('home') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <?php }
            if($role == 'admin'){ ?>
                
                <li>
                    <a class="app-menu__item <?php (request()->is('home')) ? 'active' : ''  ?>" href="{{ route('home') }}"><i class="app-menu__icon fa fa-dashboard"></i>
                        <span class="app-menu__label">Dashboard</span>
                    </a>
                 </li>


     
                <li>
                    <a class="app-menu__item <?php (request()->is('users')) ? 'active' : ''  ?>" href="{{ route('users.index') }}"><i class="app-menu__icon fa fa-dashboard">
                        <span class="app-menu__label">Users</span>
                    </a>
                </li>
                        
                     
   
                <li class="treeview is-expanded ">
                    <a class="app-menu__item <?php (request()->is('blog')) ? 'active' : ''  ?>" href="#" data-toggle="treeview">
                        <i class="app-menu__icon fa fa-th-list"></i>
                        <span class="app-menu__label">Blogs</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>

                      <ul class="treeview-menu">
                        <li><a class="treeview-item <?php (request()->is('posts')) ? 'active' : ''  ?>" href="{{ route('posts.index') }}"><i class="icon fa fa-circle-o"></i>Post</a></li>
                        <li><a class="treeview-item <?php echo (request()->is('categories')) ? 'active' : ''; ?>" href="{{ route('categoriess.index') }}"><i class="icon fa fa-circle-o"></i> Category</a></li>
                      </ul>
                </li>

               
                <li>
                    <a class="app-menu__item <?php (request()->is('comments')) ? 'active' : ''  ?>" href="{{ route('comments.index') }}">
                        <i class="app-menu__icon fa fa-dashboard"></i>
                        <span class="app-menu__label">Comment</span>
                    </a>
                </li>

        <?php }
            }
        ?>
    </ul>
</aside>

