<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title text-center"><b>Login BSM - SMART</b></h2>
                    <p class="text-muted text-center">(Small Medium Analysist and Scoring Tools)</p>
                </div>
                <div class="panel-body">
                    <?php $username = $this->session->userdata('username');
                    if ($username) {
                        redirect('auth');
                    }
                    $msg = $this->session->flashdata('msg');
                    if (isset($msg)) echo $msg; ?>

                    <form action="<?= site_url('Auth/login') ?>" method="post" autocomplete="off">
                        <fieldset>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="form-control" placeholder="Username" name="username" type="text" autocomplete="off" required autofocus>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input class="form-control" placeholder="Password" name="password" type="password" required>
                            </div>

                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" name="submit" class="btn btn-success btn-block">Login</button><br>
                            <p class="text-muted text-center">Copyright &copy; <?= date('Y') ?> BBG - PT. Bank Syariah Mandiri</p>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>