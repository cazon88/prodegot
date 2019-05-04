<div class="header-menu">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 logo">
                <img class="" src="img/logo.png" class="img-responsive">
            </div>
            <?php if ($showUserInfo){ ?>
            <div class="col-xs-6 text-right">
                <h5><b><?php echo $user->printWelcomeMessage(); ?></b></h5>
                <p>
                    <a href="reset-password.php" class="btn btn-xs btn-warning">Cambiar contrasena</a>
                    <a href="logout.php" class="btn btn-xs btn-danger">Cerrar sesion</a>
                </p>
            </div>
             <?php }?>
        </div>
    </div>
</div>
<?php include 'partials/headerImage.php'; ?>