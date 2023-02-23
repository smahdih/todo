
<div class="row mt-4">
    <div class="col-4 mx-auto">
        <h3>ثبت نام</h3>
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="/auth/register" method="post">
                    <div class="form-group mb-2">
                        <label for="name">نام</label>
                        <input type="text" id="name" class="form-control" name="name">
                        <?php if (isset($_SESSION['errors']['name'])) { ?>
                            <div class="text-danger">
                                <?php echo $_SESSION['errors']['name'] ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group mb-2">
                        <label for="username">نام کاربری</label>
                        <input type="text" id="username" class="form-control" name="username">
                        <?php if (isset($_SESSION['errors']['username'])) { ?>
                            <div class="text-danger">
                                <?php echo $_SESSION['errors']['username'] ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group mb-2">
                        <label for="email">ایمیل</label>
                        <input type="email" id="email" class="form-control" name="email">
                        <?php if (isset($_SESSION['errors']['email'])) { ?>
                            <div class="text-danger">
                                <?php echo $_SESSION['errors']['email'] ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group mb-2">
                        <label for="phone_number">شماره موبایل</label>
                        <input type="text" id="phone_number" class="form-control" name="phone_number">
                        <?php if (isset($_SESSION['errors']['phone_number'])) { ?>
                            <div class="text-danger">
                                <?php echo $_SESSION['errors']['phone_number'] ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group mb-2">
                        <label for="phone_number">نوع</label>
                        <select class="form-select" name="type">
                            <option value="PATIENT">بیمار</option>
                            <option value="DOCTOR">پزشک</option>
                            <option value="ADMIN">مدیر</option>
                        </select>
                        <?php if (isset($_SESSION['errors']['type'])) { ?>
                            <div class="text-danger">
                                <?php echo $_SESSION['errors']['type'] ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">رمز ورود</label>
                        <input type="password" id="password" class="form-control" name="password">
                        <?php if (isset($_SESSION['errors']['password'])) { ?>
                            <div class="text-danger">
                                <?php echo $_SESSION['errors']['password'] ?>
                            </div>
                        <?php } ?>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">ارسال</button>
                </form>
            </div>
        </div>
    </div>
</div>

