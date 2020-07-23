<h4 class="text-warning">Enter as ADMIN</h4>
<div class="card p-4">
    <h5 class="text-success">Login: admin</h5>
    <h5 class="text-success">Password: 123</h5>
    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>
    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>
    <form action="<?=ADMIN;?>/user/login-admin" method="post">
        <div class="input-group mb-3">
            <input name="login" type="text" class="form-control" placeholder="Login">
            <div class="input-group-append">
                <div class="input-group-text">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input name="password" type="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <button type="submit" class="btn btn-success btn-block">Sign In</button>
            </div>
        </div>
    </form>
</div>