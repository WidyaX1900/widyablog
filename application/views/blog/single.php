<section class="container single-content">
    <section class="row">

        <section class="col-lg-9 content">
            <header>
                <h1 class="text-center"><?= $post[0]->title; ?></h1>
            </header>
            <div class="single-thumbnail mt-4">
                <img src="<?= base_url('assets/'); ?>thumbnail/<?= $post[0]->thumbnail; ?>" alt="thumbnail">
            </div>
            <div class="content-description mt-3">
                <p>
                    <?= $post[0]->content; ?>
                </p>
            </div>
        </section>
        <section class="col-lg-3 suggested-post mt-5 px-4">
            <header>
                <h3>Other Post</h3>
            </header>
            <div class="row single-card mt-3">
                <?php foreach ($suggest as $suggested) : ?>
                    <div class="col-lg-12 blog-post mb-4">
                        <div class="thumbnail">
                            <img src="<?= base_url('assets/'); ?>thumbnail/<?= $suggested->thumbnail; ?>" alt="thumbnail">
                        </div>
                        <a href="<?= base_url(); ?>blog/single/<?= $suggested->id; ?>" class="text-decoration-none text-dark">
                            <header>
                                <h5><?= $suggested->title; ?></h5>
                            </header>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </section>
    <hr>
    <section class="single-comment">
        <header class="mb-4">
            <h5>Comments</h5>
        </header>
        <div class=" row user-comment mb-4">
            <div class="col-lg-1">
                <img src="<?= base_url('assets/'); ?>img/default.png" alt="default profile" width="50px">
            </div>
            <div class="col-lg-7 username">
                <h6>Alex Mercer</h6>
                <div class="comment-desc">
                    <p>Great Content! I really like it you have create an amazing content</p>
                </div>
            </div>
        </div>
        <div class=" row user-comment mb-4">
            <div class="col-lg-1">
                <img src="<?= base_url('assets/'); ?>img/default.png" alt="default profile" width="50px">
            </div>
            <div class="col-lg-7 username">
                <h6>Komang Surya Gunawan</h6>
                <div class="comment-desc">
                    <p>Saya sangat suka konten ini. Bermanfaat dan informatif</p>
                </div>
            </div>
        </div>
        <form action="" method="post" class="mt-5 col-lg-7">
            <div class="input-group mb-3">
                <input type="text" class="form-control p-2" placeholder="Comment as Rangga Widya..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                <button type="submit" class="btn btn-primary btn-sm" id="basic-addon2">Send</button>
            </div>
        </form>
    </section>
</section>