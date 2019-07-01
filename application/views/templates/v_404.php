<div id="content-wrapper" class="d-flex flex-column" style="margin-top: 10%">
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- 404 Error Text -->
            <div class="text-center">
                <div class="error mx-auto"><h1 style="font-size: 500%">404</h1></div>
                <h2 class="lead text-gray-800 mb-5">Oops! This Page Could Not Be Found</h2>
                <p class="text-gray-500 mb-0">Sorry but the page you are looking for does not exist, have been removed, name changed or is temporarily unavailable.</p>
                <span class="btn btn-info" onclick="back()">Back to Previous</span>
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

<script>
    function back(){
        window.history.go(-1);
    }
</script>