<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Post</title>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.css">
</head>

<body>
    <section class="container mt-5">
        <div class="mb-3">
            <a href="<?= base_url(); ?>auth/post/" class="btn btn-sm btn-primary">Back</a>
        </div>
        <header>
            <h1>Create a Post</h1>
        </header>
        <div class="col-lg-12 mt-4 mb-3">
            <form action="<?= base_url(); ?>blog/store/" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Post Title" name="title" autofocus="on" value="<?= set_value('title'); ?>">
                            <div class="mt-2">
                                <small class="text-danger fst-italic"><?= form_error('title'); ?></small>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="content" class="form-label">Post Content</label>
                            <textarea class="form-control" id="content" rows="3" style="height: 300px;" name="content"></textarea>
                            <div class="mt-2">
                                <small class="text-danger fst-italic"><?= form_error('content'); ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 px-5">
                        <div class="mb-4">
                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" required>
                            <div class="mt-2">
                                <small class="text-danger fst-italic"><?= form_error('thumbnail'); ?></small>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select" aria-label="Default select example" id="category_id" name="category_id">
                                <?php foreach ($category as $categories) : ?>
                                    <option value="<?= $categories->id; ?>"><?= $categories->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary py-3">
                    Upload Post
                </button>
            </form>
        </div>
    </section>
</body>

</html>