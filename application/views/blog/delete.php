<div class="mt-5">
    <h1>
        Are you sure want to permanently delete this post?
    </h1>
    <div class="mt-4">
        <p style="font-size: 1.3rem;">
            <strong>Post Title: </strong><?= $posts[0]->title; ?>
        </p>
        <img src="<?= base_url('assets/thumbnail/'); ?><?= $posts[0]->thumbnail; ?>" alt="" width="300px">
        <div class="mt-3">
            <a href="<?= base_url(); ?>auth/post/" class="btn btn-outline-secondary">Cancel</a>
            <a href="<?= base_url(); ?>blog/destroy/<?= $posts[0]->id; ?>" class="btn btn-danger mx-2">Delete</a>
        </div>
    </div>
</div>