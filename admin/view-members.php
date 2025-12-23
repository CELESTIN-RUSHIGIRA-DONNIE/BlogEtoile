<?php include("include/header.php"); ?>

    <?php
    if (isset($_GET['id'])) {
        $agent_id = $_GET['id'];
        $query = "SELECT * FROM membres WHERE id='$agent_id'";
        $query_run = mysqli_query($con, $query);
        if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $list) {
                ?>
                <div class="content-body">
                    <div class="container-fluid">
                        <div class="row page-titles mx-0">
                            <div class="col-sm-6 p-md-0">
                                <div class="welcome-text">
                                    <h4>Detail de Membre</h4>
                                </div>
                            </div>
                            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active"><a href="list-members.php">membres</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Detail membre</a></li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6 col-xxl-7 col-lg-6">
                                <div class="card">
                                    <div class="text-center p-3 overlay-box" style="background-image: url(images/big/img1.jpg);">
                                        <div class="profile-photo">
                                            <img src="uploads/<?= $list['profile'] ?>" width="100" class="img-fluid rounded-circle" alt="">
                                        </div>
                                        <h3 class="mt-3 mb-1 text-white"><?= $list['nom'].' '.$list['postnom'].' '.$list['prenom'] ?></h3>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Email :</span>
                                            <strong class="text-muted"><?= $list['email'] ?></strong>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Télephone :</span>
                                            <strong class="text-muted"><?= $list['telephone']?></strong>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Adress Actuelle :</span>
                                            <strong class="text-muted"><?= $list['adress_actuelle'] ?></strong>
                                        </li>
                                    </ul>
                                    <div class="card-footer text-center border-0 mt-0">
                                        <a href="javascript:void(0);" class="btn btn-primary btn-rounded px-4"><i class="la la-edit"></i>  Editer</a>
                                        <a href="card.php?id=<?= $list['id'] ?>" class="btn btn-warning btn-rounded px-4"><i class="la la-print"></i>  Print Card</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-xxl-5 col-lg-5">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h2 class="card-title"><i>Informations</i></h2>
                                            </div>
                                            <div class="card-body pb-0">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                                        <span>Genre</span>
                                                        <strong class="mb-0"><?= $list['genre']?></strong>
                                                    </li>
                                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                                        <span>Fonction</span>
                                                        <strong class="mb-0"><?= $list['fonction']?></strong>
                                                    </li>
                                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                                        <span>Adresse Origine</span>
                                                        <strong class="mb-0"><?= $list['adress_origine']?></strong>
                                                    </li>
                                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                                        <span>Date Anniversaire</span>
                                                        <strong class="mb-0"><?= date('d/m/Y', strtotime($list['date_anniversaire'])) ?></strong>
                                                    </li>
                                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                                        <span>Date d'enregistrement</span>
                                                        <strong class="mb-0"><?= date('d/m/Y', strtotime($list['date_enregistrement'])) ?></strong>
                                                    </li>
                                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                                        <span><?= $list['bios']?></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <?php
            }
        }
    }
    ?>
<?php include("include/footer.php"); ?>