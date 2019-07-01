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
        $this->db->join('tbl_menu c', 'c.id = a.menu_id', 'inner')->where(['a.role_id' => $role_id, 'a.active' => 1]);
        $this->db->order_by('a.menu_id', 'asc');
        $menu = $this->db->get()->result_array(); ?>

        <div class="sidebar-nav navbar-collapse">
            <!-- Looping Submenu -->
            <?php foreach ($menu as $m) { ?>
                <ul class="nav" id="side-menu">
                    <li><a href="<?= site_url(ucfirst($m['url'])) ?>"><i class="<?= $m['icon'] ?>"></i> <?= $m['menu'] ?></a></li>
                </ul>
            <?php } ?>
            <ul class="nav" id="side-menu">
                <li>
                    <a href="<?= site_url(ucfirst('order')) ?>">
                        <i class="fa fa-fw fa-sitemap"></i> Request Order <span class="badge" style="background-color: red">42</span>
                    </a>
                </li>
            </ul>
            <ul class="nav" id="side-menu">
                <li><a href="<?= site_url(ucfirst('auth/logout')) ?>"><i class="fa fa-fw fa-sign-out"></i> Logout</a></li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>