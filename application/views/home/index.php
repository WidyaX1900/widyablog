    <section class="vh-100 hero-section">
        <div class="overlay d-flex justify-content-center align-items-center flex-column">
            <header>
                <h1>Widya Blog</h1>
            </header>
            <div class="mt-2">
                <p>Let's explore some story</p>
            </div>
            <button type="button">
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
                <div class="col-lg-4 post-card px-4">
                    <div class="thumbnail">
                        <img src="<?= base_url('assets/'); ?>img/samurai.jpg" alt="thumbnail-1" class="rounded">
                    </div>
                    <a href="">
                        <h3>Bushido - Principle of Samurai</h3>
                    </a>
                    <p>
                        Bushido is a Japanese warrior code that guided the behavior of samurai. These principles governed samurai conduct in combat, social interactions, and personal life, promoting virtues like honor, loyalty, and respect. While the samurai class is no longer present, Bushido's influence endures in Japanese culture.
                    </p>
                </div>
                <div class="col-lg-4 post-card px-4 ">
                    <div class="thumbnail">
                        <img src="<?= base_url('assets/'); ?>img/mount.jpg" alt="thumbnail-1" class="rounded">
                    </div>
                    <a href="">
                        <h3>Legend of Tangkuban Perahu</h3>
                    </a>
                    <p>
                        Tangkuban Perahu is an Indonesian volcano enveloped in legend. The tale tells of Dayang Sumbi, who angered a supernatural dog and promised to marry it to escape its rage. Seeking help, she inadvertently won her son's affection, and his failed task of building a boat and lake overnight, manipulated by Dayang Sumbi, led to his angry kick turning the boat-shaped mountain into Tangkuban Perahu, echoing themes of fate and broken promises.
                    </p>
                </div>
                <div class="col-lg-4 post-card px-4">
                    <div class="thumbnail">
                        <img src="<?= base_url('assets/'); ?>img/prambanan.jpg" alt="thumbnail-1" class="rounded">
                    </div>
                    <a href="">
                        <h3>Story of Candi Prambanan</h3>
                    </a>
                    <p>
                        Candi Prambanan is a renowned Hindu temple complex in Indonesia, steeped in mythology. The story goes that a powerful prince, Bandung Bondowoso, sought to marry Princess Roro Jonggrang. To avoid this, she set an impossible condition: to build 1,000 temples in a single night.
                    </p>
                </div>
            </div>
        </section>
        <section class="category mt-5">
            <header>
                <h2 class="text-center">Categories</h2>
            </header>
            <div class="row categories mt-4">
                <div class="col-lg-4 category-card">
                    <div class="thumbnail">
                        <img src="<?= base_url('assets/'); ?>img/legend.jpg" alt="thumbnail-1" class="rounded">
                    </div>
                    <a href="">
                        <h6>Legends</h6>
                    </a>
                </div>
                <div class="col-lg-4 category-card">
                    <div class="thumbnail">
                        <img src="<?= base_url('assets/'); ?>img/history.jpg" alt="thumbnail-1" class="rounded">
                    </div>
                    <a href="">
                        <h6>History</h6>
                    </a>
                </div>
                <div class="col-lg-4 category-card">
                    <div class="thumbnail">
                        <img src="<?= base_url('assets/'); ?>img/sage.jpg" alt="thumbnail-1" class="rounded">
                    </div>
                    <a href="">
                        <h6>Sage</h6>
                    </a>
                </div>
            </div>
        </section>
    </section>