<?php include("include/header.php"); ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Categorie</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Categorie</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Ajouter Categorie</a></li>
                </ol>
            </div>
        </div>

        <?php
        if (isset($_GET['id'])) {
            $categorie_id = $_GET['id'];
            $categorie = "SELECT * FROM categories WHERE id ='$categorie_id'";
            $categorie_run = mysqli_query($con, $categorie);

            if (mysqli_num_rows($categorie_run) > 0) {
                $categorie_row = mysqli_fetch_array($categorie_run);

                ?>
                    <div class="row">
                        <div class="col-xl-12 col-xxl-12 col-sm-12">
                            <div class="card">
                                <div class="card-header text-end">
                                    <h5 class="card-title"><strong><i>Informations</i></strong></h5>
                                </div>
                                <div class="card-body">
                                    <form action="code.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="categorie_id" value="<?= $categorie_row['id'] ?>">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" value="<?= $categorie_row['name'] ?>" class="form-control" name="name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Slug(Lien)</label>
                                                    <input type="text" value="<?= $categorie_row['slug'] ?>" class="form-control" name="slug">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">description</label>
                                                    <textarea type="text" class="form-control" name="description"><?= $categorie_row['description'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Meta Title</label>
                                                    <input type="text" value="<?= $categorie_row['meta_title'] ?>" class="form-control" name="meta_title">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Meta Description</label>
                                                    <textarea type="text" class="form-control" name="meta_description"><?= $categorie_row['meta_description'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Meta Keywords</label>
                                                    <input type="text" value="<?= $categorie_row['meta_keywords'] ?>" class="form-control" name="meta_keywords">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Navbar Status </label>
                                                    <input type="checkbox" <?= $categorie_row['navbar_status'] =='1'? 'checked':'' ?> name="navbar_status" width="70px" height="70px">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Status </label>
                                                    <input type="checkbox" <?= $categorie_row['status'] =='1'? 'checked':'' ?> name="status" width="70px" height="70px">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <button type="submit" name="edit_category"
                                                    class="btn btn-primary">Modifier</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php



            } else {
                ?>
                <h4>No record Found</h4>
                <?php

            }
        }
        ?>

    </div>
</div>

<?php include("include/footer.php"); ?>