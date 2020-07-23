<section class="container jumbotron mt-5 pt-2">
    <table class="table table-hover mt-5 tablesorter" id="myTableAdmin">
        <thead>
        <tr>
            <th scope="col" style="cursor: pointer;">Name<i class="fa fa-arrows-v ml-1" aria-hidden="true"></i></th>
            <th scope="col" style="cursor: pointer;">Email<i class="fa fa-arrows-v ml-1" aria-hidden="true"></i></th>
            <th scope="col" style="cursor: pointer;">Todo<i class="fa fa-arrows-v ml-1" aria-hidden="true"></i></th>
            <th scope="col" style="cursor: pointer;">Done<i class="fa fa-arrows-v ml-1" aria-hidden="true"></i></th>
            <th scope="col" style="cursor: pointer;"></th>
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
                        <form action="main/delete-task" method="post">
                            <input type="hidden" name="id" value="<?= $task['id']; ?>">
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                        </form>
                    </td>
                </tr>
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
        <p>(<?= count($tasks); ?> задач из <?= $count; ?>)</p>
        <?php if ($pagination->countPages > 1): ?>
            <?= $pagination; ?>
        <?php endif; ?>
    </div>
    <form name="search" method="post" action="main/search">
        <div class="form-row">
            <div class="col-6">
                <input type="search" name="query" class="form-control" placeholder="Поиск">
            </div>
            <div class="col-6">
                <button type="submit" class="btn btn-primary">Найти</button>
            </div>
        </div>
    </form>
    <?php if (isset($_SESSION['search']) && (!empty($_SESSION['search']['name']) || !empty($_SESSION['search']['email']) || !empty($_SESSION['search']['text']))): ?>
        <form action="main/clean-search" class="mt-4">
            <button type="submit" class="btn btn-warning">Очистить поиск</button>
        </form>
    <?php endif; ?>
    <hr>
    <div class="search-results">
        <?php if (isset($_SESSION['search']['name']) && !empty($_SESSION['search']['name'])): ?>
            <div class="results-name">
                <h3>Совпадения в имени</h3>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col" style="cursor: pointer;">Name<i class="fa fa-arrows-v ml-1"
                                                                        aria-hidden="true"></i></th>
                        <th scope="col" style="cursor: pointer;">Email<i class="fa fa-arrows-v ml-1"
                                                                         aria-hidden="true"></i></th>
                        <th scope="col" style="cursor: pointer;">Todo<i class="fa fa-arrows-v ml-1"
                                                                        aria-hidden="true"></i></th>
                        <th scope="col" style="cursor: pointer;">Done<i class="fa fa-arrows-v ml-1"
                                                                        aria-hidden="true"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($_SESSION['search']['name'] as $task): ?>
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
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <hr>
        <?php endif; ?>
        <?php if (isset($_SESSION['search']['email']) && !empty($_SESSION['search']['email'])): ?>
            <div class="results-email">
                <h3>Совпадения в email</h3>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col" style="cursor: pointer;">Name<i class="fa fa-arrows-v ml-1"
                                                                        aria-hidden="true"></i></th>
                        <th scope="col" style="cursor: pointer;">Email<i class="fa fa-arrows-v ml-1"
                                                                         aria-hidden="true"></i></th>
                        <th scope="col" style="cursor: pointer;">Todo<i class="fa fa-arrows-v ml-1"
                                                                        aria-hidden="true"></i></th>
                        <th scope="col" style="cursor: pointer;">Done<i class="fa fa-arrows-v ml-1"
                                                                        aria-hidden="true"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($_SESSION['search']['email'] as $task): ?>
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
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <hr>
        <?php endif; ?>
        <?php if (isset($_SESSION['search']['text']) && !empty($_SESSION['search']['text'])): ?>
            <div class="results-text">
                <h3>Совпадения в тексте</h3>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col" style="cursor: pointer;">Name<i class="fa fa-arrows-v ml-1"
                                                                        aria-hidden="true"></i></th>
                        <th scope="col" style="cursor: pointer;">Email<i class="fa fa-arrows-v ml-1"
                                                                         aria-hidden="true"></i></th>
                        <th scope="col" style="cursor: pointer;">Todo<i class="fa fa-arrows-v ml-1"
                                                                        aria-hidden="true"></i></th>
                        <th scope="col" style="cursor: pointer;">Done<i class="fa fa-arrows-v ml-1"
                                                                        aria-hidden="true"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($_SESSION['search']['text'] as $task): ?>
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
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <hr>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <form action="main/add-task" class="needs-validation mt-5" method="post" novalidate>
                <div class="form-group">
                    <label for="name">Your name</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Enter you name" required>
                </div>
                <div class="form-group">
                    <label for="email">Your email</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="Enter you email"
                           required>
                </div>
                <div class="form-group">
                    <label for="text">Task text</label>
                    <textarea name="text" class="form-control" id="text" rows="3"
                              placeholder="Enter you text"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Add Task</button>
            </form>
        </div>
    </div>
</section>