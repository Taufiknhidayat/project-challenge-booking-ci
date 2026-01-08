<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-5">
            <div class="text-center mb-4">
                <h1 class="h4 text-gray-900">Create an Account!</h1>
            </div>
            <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
                <div class="mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" value="<?= set_value('name'); ?>">
                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="password_conf" name="password_conf" placeholder="Repeat Password">
                    </div>
                    <?= form_error('password', '<small class="text-danger px-3">', '</small>'); ?>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register Account</button>
            </form>
            <hr>
            <div class="text-center">
                <a class="small" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
            </div>
        </div>
    </div>
</div>