<?php include("include/header.php"); ?>

    <?php
    if (isset($_GET['id'])) {
        $agent_id = $_GET['id'];
        $query = "SELECT * FROM testimonials WHERE id='$agent_id'";
        $query_run = mysqli_query($con, $query);
        if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $list) {
                ?>
                <div class="content-body">
                    <div class="container-fluid">
                        <div class="row page-titles mx-0">
                            <div class="col-sm-6 p-md-0">
                                <div class="welcome-text">
                                    <h4>Detail de temoignage</h4>
                                </div>
                            </div>
                            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active"><a href="list-members.php">temoignage</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Detail temoignage</a></li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6 col-xxl-7 col-lg-6">
                                <div class="card">
                                    <div class="text-center p-3 overlay-box" style="background-image: url(images/big/img1.jpg);">
                                        <div class="profile-photo">
                                            <img src="uploads/testimonials/<?= $list['photo'] ?>" width="100" class="img-fluid rounded-circle" alt="">
                                        </div>
                                        <h3 class="mt-3 mb-1 text-white"><?= $list['name'] ?></h3>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Email :</span>
                                            <strong class="text-muted"><?= $list['email'] ?></strong>
                                        </li>
                                    </ul>
                                    <div class="card-footer text-center border-0 mt-0">
                                        <form method="post" action="code.php">
                                           <button type="submit" name="validation_testimonials" value="<?= $list['id']; ?>" class="btn btn-success btn-rounded px-4">Valider</button>
                                            <button type="submit" name="delete_testimonials" value="<?= $list['id']; ?>" class="btn btn-warning btn-rounded px-4">Réjeter</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-xxl-5 col-lg-5">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h2 class="card-title"><i>son temoignage</i></h2>
                                            </div>
                                            <div class="card-body pb-0">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                                        <strong class="mb-0"><?= $list['message']?></strong>
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