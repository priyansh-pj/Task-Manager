<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Task</li>
                </ol>
            </div>
            <h4 class="page-title">Tasks
                <button class="btn btn-success btn-sm ms-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#CreateTask" aria-controls="CreateTask">Create Task</button>
            </h4>
        </div>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="CreateTask" aria-labelledby="CreateTaskLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="CreateTaskLabel">Create Task</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form action="<?= base_url('Task')?>" method="POST">
                    <input type="hidden" name="user" value="<?= $user ?>">
                    <label for="task" class="form-label">Task</label>
                    <textarea class="form-control" id="task" name="task" rows="2"></textarea>

                    <label for="date" class="form-label">Date</label>
                    <input class="form-control" id="date" type="date" name="date">       
                    
                    <label for="priority" class="form-label">Priority</label>
                    <select class="form-select" id="priority" name="priority">
                        <option value="Low" default>Low</option>
                        <option value="Mid">Mid</option>
                        <option value="High">High</option>
                    </select>
                    
                    <button type="submit" class="btn btn-primary mt-3">Create Task</button>
                </form>

            </div>
        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Task</th>
                            <th>Priority</th>
                            <th>Time</th>
                            <th>Action</th>

                            <th>Status</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php foreach($tasks as $task): ?>
                        <tr>
                            <td><?= $task->task ?></td>
                            <td><?= $task->priority ?></td>
                            <td><?= $task->date ?></td>
                            <td style="width:10%"> <button type="button" class="btn btn-danger" onclick="deleteTask(<?= $task->id ?>)"><i class="mdi mdi-delete"></i> </button></td>

                            <td>
                                <input type="checkbox" id="<?= $task->id ?>" <?php if($task->status){echo "checked";}?> data-switch="success" onchange="updateTask(<?= $task->id; ?>)" />
                                <label for="<?= $task->id ?>" data-on-label="Yes" data-off-label="No" class="mb-0 d-block"></label>
                            </td>

                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Completed Task</h4>
        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="fixed-header-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Task</th>
                            <th>Priority</th>
                            <th>Time</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php foreach($completed as $task): ?>
                        <tr>
                            <td><?= $task->task ?></td>
                            <td><?= $task->priority ?></td>
                            <td><?= $task->date ?></td>
                            <td style="width:10%"> <button type="button" class="btn btn-danger" onclick="deleteTask(<?= $task->id ?>)"><i class="mdi mdi-delete"></i> </button></td>
                            <td>
                                <input type="checkbox" id="<?= $task->id ?>" <?php if($task->status){echo "checked";}?> data-switch="success" onchange="updateTask(<?= $task->id; ?>)"/>
                                <label for="<?= $task->id ?>" data-on-label="Yes" data-off-label="No" class="mb-0 d-block"></label>
                            </td>

                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>
    function updateTask(id) {
    const apiUrl = '<?= base_url("UpdateTaskStatus/") ?>' + id;
    fetch(apiUrl, {
        method: 'POST', 
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        location.reload();
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });
}

function deleteTask(id) {
    const apiUrl = '<?= base_url("Task/Delete/") ?>' + id;
    fetch(apiUrl, {
        method: 'POST', 
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        location.reload();
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });
}

</script>