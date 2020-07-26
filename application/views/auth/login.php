<style>
    body {

        /* background-color: aqua; */
        background-image: url('<?= base_url("assets/") ?>img/bg-login.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }



    .container-login .card {
        background-color: rgba(0, 0, 0, 0.5);
        box-shadow: 0 0 10px 5px black;
        text-align: center;
        /* overflow: unset; */
        /* position: absolute; */
        position: relative;
    }

    .avatar {
        background-color: white;
        /* position: fixed; */
        position: absolute;
        width: 80px;
        height: 80px;
        line-height: 80px;
        border-radius: 50%;
        text-align: center;
        top: 0;
        left: 50%;
        overflow: hidden;
        box-shadow: 0 0 3px 0.5px black;
        margin: auto;
        transform: translate(-50%, -50%);

    }
</style>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7 container-login">

            <div class="card border-0 shadow-lg my-5">
                <div class="avatar">
                    <img src="<?= base_url('assets/'); ?>img/logo-bps.png" alt="" width="75px" class="img-circle">
                </div>
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">

                                <div class="text-center">
                                    <h1 class="h4 text-gray-100 mb-4 ">Halaman Login</h1>
                                    <?= $this->session->flashdata('message'); ?>
                                </div>
                                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" placeholder="Username atau Email" name="email" value="<?= set_value('email'); ?>" autocomplete="off">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="text-left ml-2">
                                        <input type="checkbox" name="remember" id="remember">
                                        <label for="remember" class="text-white">Remember me</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>


                                </form>
                                <hr>
                                <!-- <div class="text-center">
                                    <a class="small text-gray-100" href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a>
                                </div> -->
                                <!-- <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/registration') ?>">Create an Account!</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>