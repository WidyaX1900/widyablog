<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.css">
</head>

<body>
    <section class="container mt-5">
        <header>
            <h1>Edit a Post</h1>
        </header>
        <div class="mt-5">
            <h3>Default Thumbnail</h3>
            <img src="<?= base_url('assets/'); ?>thumbnail/<?= $post[0]->thumbnail; ?>" alt="thumbnail" width="300px">
        </div>
        <div class="col-lg-12 mt-4">
            <form action="<?= base_url(); ?>blog/update/<?= $post[0]->id; ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="defaultThumbnail" value="<?= $post[0]->thumbnail; ?>">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Post Title" name="title" autofocus="on" value="<?= $post[0]->title; ?>">
                            <div class="mt-2">
                                <small class="text-danger fst-italic"><?= form_error('title'); ?></small>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="content" class="form-label">Post Content</label>
                            <textarea class="form-control" id="content" rows="3" style="height: 300px;" name="content"><?= $post[0]->content; ?>
                        </textarea>
                            <div class="mt-2">
                                <small class="text-danger fst-italic"><?= form_error('content'); ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 px-5">
                        <div class="mb-4">
                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                            <div class="mt-2">
                                <small class="text-danger fst-italic"><?= form_error('thumbnail'); ?></small>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select" aria-label="Default select example" id="category_id" name="category_id">
                                <option value="<?= $post[0]->category_id; ?>"><?= $current[0]->name; ?></option>
                                <?php foreach ($category as $categories) : ?>
                                    <option value="<?= $categories->id; ?>"><?= $categories->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary py-3">
                    Update Post
                </button>
            </form>
        </div>
    </section>
</body>

</html>