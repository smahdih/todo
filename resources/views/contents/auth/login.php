
<div class="row">
    <div class="col-4 mx-auto">
        <h1>ورود</h1>
        <div class="card">
            <div class="card-body">
                <?php if (isset($_SESSION['errors']['notActive']) && $_SESSION['errors']['notActive']) { ?>
                    <div class="alert alert-danger" role="alert">
                        حساب شما فعال نیست لطفا با مدیریت تماس بگیرید
                    </div>
                <?php } ?>
                <?php if (isset($_SESSION['errors']['notOk']) && $_SESSION['errors']['notOk']) { ?>
                    <div class="alert alert-danger" role="alert">
                        اطلاعات وارد شده صحیح نیست
                    </div>
                <?php } ?>
                <form action="/auth/login" method="post">
                    <div class="form-group">
                        <label for="email">ایمیل</label>
                        <input type="email" id="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">رمز ورود</label>
                        <input type="password" id="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-success mt-2">ارسال</button>
                </form>
            </div>
        </div>
    </div>
</div>
