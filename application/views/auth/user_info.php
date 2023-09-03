<div class="row w-50 rounded shadow border py-3" style="background-color: #fff;">
    <div class="col-4 my-auto">
        <img src="<?= base_url('assets/user/'); ?><?= $user[0]->photo; ?>" alt="" width="150px" class="rounded-circle">
    </div>
    <div class="col-8 mt-5">
        <ul style="list-style: none;">
            <li class="mb-3">
                <strong>Name: </strong>
                <?= $user[0]->name; ?>
            </li>
            <li class="mb-3">
                <strong>E-mail: </strong>
                <?= $user[0]->email; ?>
            </li>
            <li class="mb-3">
                <strong>Role: </strong>
                <?= $role[0]->name; ?>
            </li>
        </ul>
    </div>
</div>