<section class="container single-content">
    <section class="row">
        <section class="col-lg-9 content">
            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <strong><?= $this->session->flashdata('result'); ?></strong> <?= $this->session->flashdata('action'); ?>
                </div>
            <?php endif; ?>
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
        <?php $commentIndex = 0; ?>
        <?php if (count($comments) == 0) : ?>
            <div class=" row user-comment mb-4">
                <h6>There's no comment in this post</h6>
            </div>
        <?php else : ?>
            <?php foreach ($comments as $comment) : ?>
                <div class=" row user-comment mb-4">
                    <div class="col-lg-1">
                        <img src="<?= base_url('assets/img/'); ?>default.png" alt="default profile" width="50px">
                    </div>
                    <div class="col-lg-7 username">
                        <h6><?= $commentators[$commentIndex]->name; ?></h6>
                        <div class="comment-desc">
                            <p><?= $comment->comment; ?></p>
                        </div>
                    </div>
                </div>
                <?php $commentIndex++; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <form action="<?= base_url(); ?>comment/store/<?= $post[0]->id; ?>" method="post" class="mt-5 col-lg-7">
            <div class="input-group mb-3">
                <input type="text" class="form-control p-2" placeholder="Comment as Rangga Widya..." name="comment">
                <button type="submit" class="btn btn-primary btn-sm" id="basic-addon2">Send</button>
            </div>
        </form>
    </section>
</section>