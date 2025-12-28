<?php include("include/header.php"); ?>

<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Liste de Posts</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Posts</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Liste de posts</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><strong>Liste de Post</strong></h4>
                        <a href="add-post.php" class="btn btn-primary">+ Add new</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>image</th>
                                        <th>Categorie</th>
                                        <th>Titre de Post</th>
                                        <th>Date Création</th>
                                        <th>Navbar_Status</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    //$posts = "SELECT * FROM posts WHERE status!='2' ";
                                    $posts = "SELECT p.*, c.name as cname FROM posts p,categories c WHERE c.id = p.category_id";
                                    $posts_run = mysqli_query($con, $posts);
                                    if (mysqli_num_rows($posts_run) > 0) {
                                        foreach ($posts_run as $item) {
                                            ?>
                                                <tr>
                                                    <td><?php echo '<img class="rounded-circle" width="35" src="uploads/post/' . $item['image'] . '" alt="User Image">' ?></td>
                                                    <td><?= $item['cname']; ?></td>
                                                    <td><?= $item['titre'] ?></td>
                                                    <td> <?= date('d/m/Y', strtotime($item['created_at'])) ?></td>
                                                     <td><?= $item['navbar_status'] ?></td>
                                                     <td><?= $item['status'] ?></td>
                                                    <td>
                                                        <a href="edit-post.php?id=<?= $item['id'] ?>" class="btn btn-sm btn-primary"><i
                                                                class="la la-pencil"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                                class="la la-trash-o"></i></a>
                                                    </td>
                                                </tr>
                                            <?php
                                        }

                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="7" class="bg-danger text-white">Not record found</td>
                                        </tr>

                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include("include/footer.php"); ?>