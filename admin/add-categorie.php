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

        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header text-end">
                        <h5 class="card-title"><strong><i>Informations</i></strong></h5>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
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
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Meta Description</label>
                                        <textarea type="text" class="form-control" name="meta_description"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Meta Keywords</label>
                                        <input type="text" class="form-control" name="meta_keywords">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Navbar Status   </label>
                                        <input type="checkbox"  name="navbar_status" width="70px" height="70px">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Status   </label>
                                        <input type="checkbox"  name="status" width="70px" height="70px">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" name="save_category" class="btn btn-primary">Enregistrer</button>
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