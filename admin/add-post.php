<?php include("include/header.php"); ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>POST</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">POST</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Ajouter Un Post</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header text-end">
                        <h5 class="card-title"><strong><i>Informations</i></strong></h5>
                        <a href="list-post.php" class="btn btn-primary">+ liste post</a>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">CATEGORIE</label>
                                        <?php
                                            $category = "SELECT * FROM categories WHERE status='1' ";
                                            $category_run = mysqli_query($con,$category);

                                            if(mysqli_num_rows($category_run) > 0)
                                            {
                                                ?>
                                                <select name="category_id" required class="form-control">
                                                    <?php
                                                        foreach($category_run as $categoryitem)
                                                        {
                                                        ?>
                                                            <option value="<?= $categoryitem['id'] ?>"><?= $categoryitem['name'] ?></option>
                                                        <?php
                                                        }
                                                    ?>
                                                </select>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                    <h5>No category availlable</h5>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Titre</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Slug(Lien)</label>
                                        <input type="text" class="form-control" name="slug">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">description</label>
                                        <textarea type="text" class="form-control" name="description"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Navbar Status   </label>
                                        <input type="checkbox"  name="navbar_status" width="70px" height="70px">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Status   </label>
                                        <input type="checkbox"  name="status" width="70px" height="70px">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group fallback w-100">
                                        <input type="file" name="photo" class="dropify" data-default-file="">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" name="save_post" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include("include/footer.php"); ?>