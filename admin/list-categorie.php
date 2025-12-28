<?php include("include/header.php"); ?>

<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Liste de Catégories</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.index">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Catégories</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Liste de Catégories</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><strong>Liste de Catégories</strong></h4>
                        <a href="add-categorie.php" class="btn btn-primary">+ Ajouter</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $categorie = "SELECT * FROM categories WHERE status = 1";
                                    $categorie_run = mysqli_query($con, $categorie);
                                    if (mysqli_num_rows($categorie_run) > 0) {
                                        foreach ($categorie_run as $item) {
                                            ?>
                                                <tr>
                                                    <td><?= $item['id']; ?></td>
                                                    <td><?= $item['name'] ?></td>
                                                    <td> <?= $item['slug'] ?></td>
                                                    <td>
                                                        <a href="edit-categorie.php?id=<?= $item['id'] ?>" class="btn btn-sm btn-primary"><i class="la la-edit"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                                    </td>
                                                </tr>
                                            <?php
                                        }

                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="6" class="bg-danger text-white">Not record found</td>
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