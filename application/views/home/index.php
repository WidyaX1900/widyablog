    <section class="vh-100 hero-section">
        <div class="overlay d-flex justify-content-center align-items-center flex-column">
            <header>
                <h1>Widya Blog</h1>
            </header>
            <div class="mt-2">
                <p>Let's explore some story</p>
            </div>
            <button type="button" onclick="goToBlogs('<?= base_url() ?>blog/')">
                <span class="material-symbols-outlined">
                    arrow_circle_right
                </span>
                My Posts
            </button>
        </div>
    </section>
    <section class="container mt-4">
        <section class="latest-post">
            <header>
                <h2 class="text-center">Latest Post</h2>
            </header>
            <div class="row posts mt-4">
                <?php foreach ($post as $posts) : ?>
                    <div class="col-lg-4 post-card px-4">
                        <div class="thumbnail">
                            <img src="<?= base_url('assets/'); ?>thumbnail/<?= $posts->thumbnail; ?>" alt="thumbnail-1" class="rounded">
                        </div>
                        <div class="mt-3">
                            <a href="<?= base_url(); ?>blog/single/<?= $posts->id; ?>">
                                <h3><?= $posts->title; ?></h3>
                            </a>
                            <p style="height: 150px; overflow-y: hidden;">
                                <?= $posts->content; ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="category mt-5">
            <header>
                <h2 class="text-center">Categories</h2>
            </header>
            <div class="row categories mt-4 mb-4">
                <?php foreach ($categories as $category) : ?>
                    <div class="col-lg-4 category-card">
                        <div class="thumbnail">
                            <img src="<?= base_url('assets/'); ?>img/<?= $category->picture; ?>" alt="thumbnail-1" class="rounded">
                        </div>
                        <a href="<?= base_url(); ?>blog/category?category=<?= $category->id; ?>">
                            <h6><?= $category->name; ?></h6>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </section>


    <script>
        function goToBlogs(url) {
            document.location.href = url;
        }
    </script>