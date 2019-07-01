<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="">Small Medium Analysist and Scoring Tools - BBG</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i><?= $name ?> (<?= $akses ?>) <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                <li class="divider"></li>
                <li><a href="<?= site_url(ucfirst('auth/logout')); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <!-- Query Submenu -->
        <?php $role_id = $this->session->userdata('role_id');
        $this->db->select('*')->from('tbl_user_menu a')->join('tbl_user_role b', 'a.role_id = b.id', 'inner');
        $this->db->join('tbl_menu c', 'c.id = a.menu_id', 'inner')->where(['a.role_id' => $role_id, 'a.menu_id !=' => 1, 'a.active' => 1]);
        $this->db->order_by('a.menu_id', 'asc');
        $menu = $this->db->get()->result_array();
        $dashboard = $this->db->get_where('tbl_user_menu', ['role_id' => $role_id, 'menu_id' => 1])->row_array(); ?>
        <div class="sidebar-nav navbar-collapse">
            <!-- Looping Submenu -->
            <ul class="nav" id="side-menu">
                <li><a href="<?= site_url(ucfirst($dashboard['url'])) ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a></li>
                <li>
                    <a href="#">
                        <i class="fa fa-fw fa-sitemap"></i> Main Menu<span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <?php foreach($menu as $m){ ?>
                            <li>
                                <a href="<?= site_url(ucfirst($m['url'])) ?>"><i class="<?= $m['icon'] ?>"></i> <?= $m['menu'] ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="<?= site_url(ucfirst('auth/logout')) ?>"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>