<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">All Users</h1>
</div>

<div class="mt-2">
    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <strong><?= $this->session->flashdata('result'); ?></strong> <?= $this->session->flashdata('action'); ?>
        </div>
    <?php endif; ?>
    <table class="table">
        <thead>
            <tr class="table-primary">
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">User Status</th>
                <th scope="col">User Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php $userIndex = 0; ?>
            <?php foreach ($users as $user) : ?>
                <tr class="table-light">
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $user->name; ?></td>
                    <td><?= $user->email; ?></td>
                    <td><?= $user->status; ?></td>
                    <td><?= $user_role[$userIndex]->name; ?></td>
                    <td>
                        <a href="<?= base_url(); ?>auth/show/<?= $user->id; ?>" class="btn btn-primary btn-sm">View</a>
                        <a href="<?= base_url(); ?>auth/edit/<?= $user->id; ?>" class="btn btn-warning btn-sm mx-3">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Block</a>
                    </td>
                </tr>
                <?php $userIndex++; ?>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>