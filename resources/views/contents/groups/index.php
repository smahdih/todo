<div class="row mt-4">
    <div class="col-4 mx-auto">
        <div class="d-flex justify-content-between mb-4">
            <h3>گروه ها</h3>
            <?php if(isset($_SESSION['admin'])):?>
            <a href="/groups/create" class="btn btn-success">ایجاد گروه</a>
            <?php endif;?>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-striped table-borderless">
                    <thead>
                    <tr>
                        <th>نام گروه</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($groups as $group) : ?>
                        <tr>
                            <td><?= $group->name ?></td>
                            <td>
                                <a href="/groups/show?id=<?= $group->id ?>" class="btn btn-sm btn-primary">نمایش</a>
                                <?php if(isset($_SESSION['admin'])):?>
                                <a href="/groups/delete?id=<?= $group->id ?>" class="btn btn-sm btn-danger">حذف</a>
                                <?php endif;?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
