<?php include("include/header.php"); ?>

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Les temoignages</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Temoignage validé</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Liste de temoignager valider</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-pills mb-3">
                    <li class="nav-item"><a href="#list-view" data-toggle="tab"
                            class="nav-link btn-success mr-1 show active">validations</a></li>
                    <li class="nav-item"><a href="testimonials.php"  class="nav-link btn-danger mr-1">Temoignages non validés</a></li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><strong>Liste de temoignage validés</strong></h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>image</th>
                                                <th>nom</th>
                                                <th>email</th>
                                                <th>Envoie le :</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            //$posts = "SELECT * FROM posts WHERE status!='2' ";
                                            $posts = "SELECT * FROM testimonials WHERE status='1'";
                                            $posts_run = mysqli_query($con, $posts);
                                            if (mysqli_num_rows($posts_run) > 0) {
                                                foreach ($posts_run as $item) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo '<img class="rounded-circle" width="35" src="uploads/testimonials/' . $item['photo'] . '" alt="User Image">' ?>
                                                        </td>
                                                        <td><?= $item['name']; ?></td>
                                                        <td><?= $item['email'] ?></td>
                                                        <td> <?= date('d/m/Y', strtotime($item['created_at'])) ?></td>
                                                        <td>
                                                            <a href="view-testimonials.php?id=<?= $item['id'] ?>"
                                                                class="btn btn-sm btn-primary"><i class="la la-eye"></i></a>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                                    class="la la-trash-o"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }

                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="5" class="bg-danger text-center">Aucun Temoignage validé</td>
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
    </div>
</div>





<?php include("include/footer.php"); ?>