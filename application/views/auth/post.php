<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">All Posts</h1>
    <a href="<?= base_url(); ?>blog/create/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm p-3 " style="font-size: 1rem;"><span class="material-symbols-rounded" style="transform: translateY(25%);">add</span> Add a Post
    </a>
</div>

<div class="mt-2">
    <table class="table">
        <thead>
            <tr class="table-primary">
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Publish Date</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php $categoryIndex = 0 ?>
            <?php foreach ($posts as $post) : ?>
                <tr class="table-light">
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $post->title; ?></td>
                    <td><?= $post->date; ?></td>
                    <td><?= $categories[$categoryIndex]->name; ?></td>
                    <td>
                        <a href="<?= base_url(); ?>blog/single/<?= $post->id; ?>" class="btn btn-primary btn-sm">View</a>
                        <a href="<?= base_url(); ?>blog/show/<?= $post->id; ?>" class="btn btn-warning btn-sm mx-3">Edit</a>
                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php $i++; ?>
                <?php $categoryIndex++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>