<div class="container">
    <h1></h1>
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <td>نام</td>
                <td>نام کاربری</td>
                <td>ایمیل</td>
            </tr>
            </thead>
            <tbody>
            <?php if (isset($doctors)) { ?>
                <?php foreach ($doctors as $doctor) { ?>
                    <tr>
                        <td><?= $doctor->name ?></td>
                        <td><?= $doctor->username ?></td>
                        <td><?= $doctor->email ?></td>
                    </tr>
                <?php } ?>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
