<div class="mt-3">
    <h2>Edit Profile</h2>
    <div class="row">
        <div class="col-3">
            <div class="mb-4 mt-4">
                <img src="<?= base_url('assets/user/'); ?><?= $user[0]->photo; ?>" alt="" width="200px" class="rounded-circle">
            </div>
        </div>
        <div class="col-9 mt-4">
            <form action="<?= base_url(); ?>auth/update_profile/<?= $user[0]->id; ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="oldPhoto" value="<?= $user[0]->photo; ?>">
                <div class="col-7">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Full Name" name="name" required value="<?= $user[0]->name; ?>">
                    </div>
                    <div class="mb-5">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo" style="cursor: pointer;">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>