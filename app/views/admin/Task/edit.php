<section class="container jumbotron mt-5 pt-2">
    <form action="<?=ADMIN;?>/task/edit" class="needs-validation mt-5" method="post" novalidate>
        <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Enter name"
                   value="<?= h($task->name); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Your email</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="Enter email"
                   value="<?= h($task->email); ?>" required>
        </div>
        <div class="form-group">
            <label for="text">Task text</label>
            <textarea name="text" class="form-control" id="text" rows="3"
                      placeholder="Enter text"><?= h($task->text); ?></textarea>
        </div>
        <input type="hidden" name="id" value="<?=$task->id;?>">
        <button type="submit" class="btn btn-success">Edit Task</button>
    </form>
</section>