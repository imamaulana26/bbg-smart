<div id="content-wrapper" class="d-flex flex-column" style="margin-top: 10%">
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- 404 Error Text -->
            <div class="text-center">
                <div class="error mx-auto"><h1 style="font-size: 500%">403</h1></div>
                <h2 class="lead text-gray-800 mb-5">Access Forbidden!</h2>
                <p class="text-gray-500 mb-0">You Are Not Allowed To Enter Here</p>
                <?php $menu['role'] == 'Help Desk' ? $menu = 'Admin' : $menu = $menu['role'] ?>
                <a class="btn btn-info" href="<?= ucfirst(site_url($menu)) ?>/index">Back to Dashboard</a>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div><br>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright © Bank Syariah Mandiri - BBG <?= date('Y') ?></span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
</div>