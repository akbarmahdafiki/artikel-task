<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1><center>Register</center></h1>
                    </div>
                    <div class="card-body">
                        <?php if (isset($validation)) { ?>
                            <div class="alert alert-warning"><?= $validation->listErrors() ?></div>
                        <?php } ?>
                        
                        <form action="<?= base_url('admin/save'); ?>" method="post">
                            <div class="mb-3">
                                <label for="inputusername">Username</label>
                                <input class="form-control" type="text" name="username" id="inputusername">
                            </div>

                            <div class="mb-3">
                                <label for="inputpassword">Password</label>
                                <input class="form-control" type="password" name="password" id="inputpassword">
                            </div>

                            <div class="mb-3">
                                <label for="inputconfirmpassword">Konfirmasi Password</label>
                                <input class="form-control" type="password" name="confirm_password" id="inputconfirmpassword">
                            </div>

                            <input class="btn btn-primary" type="submit" name="submit" value="Register">
                            <a class="btn btn-warning" href="<?= base_url('/'); ?>">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>