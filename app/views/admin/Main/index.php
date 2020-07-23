<section class="container jumbotron mt-5 pt-2">
    <table class="table table-hover mt-5 tablesorter" id="myTable">
        <thead>
        <tr>
            <th scope="col" style="cursor: pointer;">Name<i class="fa fa-arrows-v ml-1" aria-hidden="true"></i></th>
            <th scope="col" style="cursor: pointer;">Email<i class="fa fa-arrows-v ml-1" aria-hidden="true"></i></th>
            <th scope="col" style="cursor: pointer;">Todo<i class="fa fa-arrows-v ml-1" aria-hidden="true"></i></th>
            <th scope="col" style="cursor: pointer;">Done<i class="fa fa-arrows-v ml-1" aria-hidden="true"></i></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php if ($tasks): ?>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <th scope="row"><?= $task['name']; ?></th>
                    <td><?= $task['email']; ?></td>
                    <td><?= $task['text']; ?></td>
                    <td>
                        <?php if ($task['done'] == 0): ?>
                            <span style="display: none"><?= $task['done']; ?></span>
                            <i class="fa fa-times text-danger" aria-hidden="true"></i>
                        <?php else: ?>
                            <i class="fa fa-check text-success" aria-hidden="true"></i>
                            <span style="display: none"><?= $task['done']; ?></span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= ADMIN; ?>/task/edit?id=<?= $task['id']; ?>" class="btn btn-primary">
                            Edit
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </td>
                    <td>
                        <?php if ($task['done'] == 0): ?>
                            <button class="btn btn-success" data-toggle="modal" data-target="#modal<?= $task['id']; ?>">
                                done
                            </button>
                        <?php else: ?>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#modal<?= $task['id']; ?>">
                                undone
                            </button>
                        <?php endif; ?>
                    </td>
                    <td>
                        <form action="main/delete-task" method="post">
                            <input type="hidden" name="id" value="<?= $task['id']; ?>">
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <div class="modal fade" id="modal<?= $task['id']; ?>" data-backdrop="static" data-keyboard="false"
                     tabindex="-1"
                     role="dialog" aria-labelledby="modal<?= $task['id']; ?>Label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-warning">One more task</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5><?= $task['name']; ?></h5>
                                <h5><?= $task['email']; ?></h5>
                                <p class="mt-3"><?= $task['text']; ?></p>
                                <form action="main/done-task" method="post">
                                    <input type="hidden" name="id" value="<?= $task['id']; ?>">
                                    <?php if ($task['done'] == 1): ?>
                                        <input type="hidden" name="done" value="0">
                                        <button type="submit" class="btn btn-danger btn-block">Not done yet...</button>
                                    <?php else: ?>
                                        <input type="hidden" name="done" value="1">
                                        <button type="submit" class="btn btn-success btn-block">Done it!!!</button>
                                    <?php endif; ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">
                    <h3 class="mt-2 text-danger text-center">No tasks yet...</h3>
                </td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    <div class="text-center">
        <?php if($pagination->countPages > 1): ?>
            <?=$pagination;?>
        <?php endif; ?>
        <p>(<?=count($tasks);?> задач из <?=$count;?>)</p>
    </div>
</section>