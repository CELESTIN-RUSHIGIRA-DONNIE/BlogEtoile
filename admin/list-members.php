<?php include("include/header.php"); ?>

<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Liste de Membres</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.index">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Membres</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Liste de membres</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><strong>Liste de Membres</strong></h4>
                        <a href="add-members.php" class="btn btn-primary">+ Ajouter</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>image</th>
                                        <th>Noms</th>
                                        <th>Email</th>
                                        <th>Télephone</th>
                                        <th>Fonction</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    //$posts = "SELECT * FROM posts WHERE status!='2' ";
                                    $membre = "SELECT * FROM membres WHERE status = 1";
                                    $membre_run = mysqli_query($con, $membre);
                                    if (mysqli_num_rows($membre_run) > 0) {
                                        foreach ($membre_run as $item) {
                                            ?>
                                                <tr>
                                                    <td><?php echo '<img class="rounded" width="35" src="uploads/' . $item['profile'] . '" alt="User Image">' ?></td>
                                                    <td><?= $item['nom'].' '.$item['postnom'].' '.$item['prenom']; ?></td>
                                                    <td><?= $item['email'] ?></td>
                                                    <td> <?= $item['telephone'] ?></td>
                                                    <td><?= $item['fonction'] ?></td>
                                                    <td>
                                                        <a href="view-members.php?id=<?= $item['id'] ?>" class="btn btn-sm btn-primary"><i
                                                                class="la la-eye"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                                class="la la-trash-o"></i></a>
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