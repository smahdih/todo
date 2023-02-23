<div class="row mt-4">
    <div class="col-4 mx-auto">
        <h3>ایجاد گروه</h3>
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
                    <button type="submit" class="btn btn-success mt-2">ارسال</button>
                </form>
            </div>
        </div>
    </div>
</div>

