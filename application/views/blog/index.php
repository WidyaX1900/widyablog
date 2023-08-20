<section class="blog-hero">
    <div class="blog-overlay d-flex justify-content-center align-items-end pb-4">
        <header>
            <h1>Blogs</h1>
        </header>
    </div>
</section>
<section class="container mt-4">
    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <strong><?= $this->session->flashdata('result'); ?></strong> <?= $this->session->flashdata('action'); ?>
        </div>
    <?php endif; ?>
    <div class="row blogs">
        <div class="col-lg-9">
            <?php foreach ($post as $posts) : ?>
                <div class="blog-post row mb-5">
                    <div class="col-lg-6 thumbnail">
                        <img src="<?= base_url('assets/'); ?>thumbnail/<?= $posts->thumbnail; ?>" alt="thumbnail" class="rounded">
                    </div>
                    <div class="col-lg-6 blog-desc">
                        <a href="<?= base_url(); ?>blog/single/<?= $posts->id; ?>">
                            <h3><?= $posts->title; ?></h3>
                        </a>
                        <small>Published Date: <?= $posts->date; ?></small>
                        <p class="mt-3">
                            <?= $posts->content; ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-lg-3">
            <div class="blog-category">
                <h2>Categories</h2>
                <ul>
                    <?php foreach ($category as $categories) : ?>
                        <li>
                            <a href="" class="text-decoration-none"><?= $categories->name; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="blog-search mt-5">
                <h2>Search Post</h2>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search Post..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <button type="submit" class="btn btn-primary btn-sm" id="basic-addon2">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>