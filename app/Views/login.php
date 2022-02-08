<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1><center>Login</center></h1>
                    </div>
                    <div class="card-body">
                    <?php if (session()->getFlashdata('error')) { ?>
                        <p class="alert alert-warning"><?= session()->getFlashdata('error') ?></p>
                    <?php } ?>

                    <form action="<?= base_url('admin/auth'); ?>" method="post">
                    <div class="form-group mb-3">
                        <label for="inputusername">Username</label>
                        <input class="form-control" type="text" name="username" id="inputusername">
                    </div>

                    <div class="form-group mb-3">
                        <label for="inputpassword">Password</label>
                        <input class="form-control" type="password" name="password" id="inputpassword">
                    </div>
                    <div class="form-group mb-3">
                        <a href="<?= base_url('admin/register'); ?>">Register Akun</a>
                    </div>

                    <input class="btn btn-primary" type="submit" name="submit" value="Login">
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>