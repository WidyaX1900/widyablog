<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Registration</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/'); ?>sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/'); ?>bootstrap.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 w-50 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="post" action="<?= base_url(); ?>auth/create_account">
                                <div class="form-group row">
                                    <div class="col-sm mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="name" placeholder="Full Name" name="name" value="<?= set_value('name'); ?>">
                                        <div class="mt-2">
                                            <small class="text-danger fst-italic"><?= form_error('name'); ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" placeholder="Email Address" name="email">
                                    <div class="mt-2" value="<?= set_value('email'); ?>">
                                        <small class="text-danger fst-italic"><?= form_error('email'); ?></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                                        <div class="mt-2" value="<?= set_value('password'); ?>">
                                            <small class="text-danger fst-italic"><?= form_error('password'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="confirm" placeholder="Repeat Password" name="confirm">
                                        <div class="mt-2" value="<?= set_value('confirm'); ?>">
                                            <small class="text-danger fst-italic"><?= form_error('confirm'); ?></small>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                            </form>
                            <div class="text-center">
                                <div class="mb-0">
                                    <a class="small" href="<?= base_url(); ?>auth/forgot_form">Forgot Password?</a>
                                </div>
                                <a class="small" href="<?= base_url(); ?>auth/login/">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>