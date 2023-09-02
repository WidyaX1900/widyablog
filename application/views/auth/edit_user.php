<div class="mt-3">
    <h2>Edit User</h2>
    <div class="row">
        <div class="col-3">
            <div class="mb-4 mt-4">
                <img src="<?= base_url('assets/user/'); ?><?= $user[0]->photo; ?>" alt="" width="200px" class="rounded-circle">
            </div>
        </div>
        <div class="col-9 mt-4">
            <form action="" method="post">
                <div class="col-7">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Full Name" name="name" required value="<?= $user[0]->name; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label d-block">User Role</label>
                        <select class="form-select w-100 p-2 rounded border" style="cursor: pointer;" name="role_id">
                            <?php if ($user[0]->role_id === '1') : ?>
                                <option value="1" selected>Admin</option>
                                <option value="2">Author</option>
                                <option value="3">Reader</option>
                            <?php elseif ($user[0]->role_id === '2') : ?>
                                <option value="1">Admin</option>
                                <option value="2" selected>Author</option>
                                <option value="3">Reader</option>
                            <?php else : ?>
                                <option value="1">Admin</option>
                                <option value="2">Author</option>
                                <option value="3" selected>Reader</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo" required style="cursor: pointer;">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>