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
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

        <div class="row">
            <?php $nota = array(
                'NAP Reksus' => 'Maker/Reksus',
                'NAP B2C < 1.5' => 'Maker/B2C_d15',
                'NAP B2C > 1.5' => 'Maker/B2C_u15'
            );
            foreach($nota as $key => $val){ ?>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-fw fa-file-text fa-4x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"></div>
                                <div><?= $key ?></div>
                            </div>
                        </div>
                    </div>
                    <a href="<?= site_url($val) ?>">
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

    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<?php $this->load->view('templates/_footer'); ?>