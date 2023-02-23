<div class="container">
    <table>
        <thead>
            <tr>
                <td>id</td>
                <td>group_id</td>
                <td>description</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($tasks as  $task){ ?>

                <tr>
                    <td><?= $task->id ?></td>
                    <td><?= $task->group_id ?></td>
                    <td><?= $task->description ?></td>
                </tr>



           <?php } ?>


            
        </tbody>
    </table>
</div>




