<div id="wrapper">
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?= $title ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <?php $this->db->select('b.menu, b.icon, a.url')->from('tbl_user_menu a');
                $this->db->join('tbl_menu b', 'a.menu_id = b.id', 'inner');
                if($this->session->userdata('role_id') == 1){
                    $this->db->where('a.role_id', 1)->where_not_in('b.id', 1)->group_by('b.id', 'asc');
                } else {
                    $this->db->where('a.role_id', 2)->where_not_in('b.id', 1)->group_by('b.id', 'asc');
                }
                $this->db->where('a.active', 1);
                $menu = $this->db->get()->result_array();
                foreach ($menu as $m) { ?>
                    <div class="col-md-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="<?= $m['icon'] ?> fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"></div>
                                        <div><?= $m['menu'] ?></div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?= site_url($m['url']) ?>">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->