<div class="row mt-4">
    <h4><span><?= $group->name ?></span></h4>
    <div class="col-6 mx-auto">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5>کاربر ها</h5>
            </div>
            <div class="card-body">
                <form action="/groups/addUser" method="post">
                    <input type="hidden" name="group" value="<?= $group->id ?>">
                    <div class="form-control">
                        <label class="form-label" for="user">انتخاب کاربر</label>
                        <select class="form-select" name="user" id="user">
                            <?php foreach ($users as $user) : ?>
                                <option value="<?= $user->id ?>"><?= $user->name ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" class="btn btn-success mt-3">ارسال</button>
                    </div>
                </form>
                <div class="row mt-4 mx-1">
                    <table>
                        <tbody class="table table-bordered table-striped">
                            <?php foreach ($groupUsers as $user) : ?>
                                <tr>
                                    <td><?= $user->name ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 mx-auto">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5>تسک ها</h5>
            </div>
            <div class="card-body">
                <form action="/tasks/store" method="post">
                    <!-- <?php 
                   // if($_SESSION['errors']){
                       // dd($_SESSION['errors']);}
                        ?> -->
                    <input type="hidden" name="group_id" value="<?= $group->id ?>">
                    <div class="form-group">
                        <label class="form-label" for="title">title</label>
                        <input class='form-control' type='text' name='title'>
                    </div>
                    <div class='form=group'>
                        <label class="form-label" for="title">description</label>
                        <input class='form-control' type='text' name='description'>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">ارسال</button>
                </form>
                <div class="row mt-4 mx-1">
                    
                    <table>
                        <tbody class="table table-bordered table-striped">

                        <td>title</td>
                        <td>description</td>
                        <td>is_done</td>
                            <?php foreach ($tasks as $task) : ?>
                                
                                <tr>
                                <form action='/groups/show' method='post'>
                                    <td><?= $task->title ?></td>
                                    <td><?= $task->description ?></td>
                                    <td><?= $task->is_done ?></td>
                                    <?php
                                    if(!$task->is_done):
                                    ?>
                                    <td><input type='hidden' name='id' value='1' ></td>
                                    <td><input type='submit' value='done' class=' bg-success btn btn-success mt-3'></td>
                                   <?php endif;?>
                                   <?php
                                   if($task->is_done):
                                   ?>
                                   <td class='bg-success'>Done!</td>
                                   <?php endif;?>
                                    </form>
                                </tr>
                               
                                
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>