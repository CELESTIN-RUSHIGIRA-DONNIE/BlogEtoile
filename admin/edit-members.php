<?php include("include/header.php"); ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Modification d'un Membre</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Membres</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Modification d'un membre</a></li>
                </ol>
            </div>
        </div>

        <?php
        if (isset($_GET['id'])) {
            $membre_id = $_GET['id'];
            $membre = "SELECT * FROM membres WHERE id ='$membre_id'";
            $membre_run = mysqli_query($con, $membre);

            if (mysqli_num_rows($membre_run) > 0) {
                $membre_row = mysqli_fetch_array($membre_run);

                ?>
                    <div class="row">
                        <div class="col-xl-12 col-xxl-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title"><strong><i>Modifier </i></strong> <?php echo $membre_row['nom']; ?></h5>
                                </div>
                                <div class="card-body">
                                    <form action="code.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="membre_id" value="<?=$membre_row['id']?>">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Nom</label>
                                                    <input type="text" value="<?=$membre_row['nom']?>" class="form-control" name="nom">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Postnom</label>
                                                    <input type="text" value="<?=$membre_row['postnom']?>" class="form-control" name="postnom">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Prenom</label>
                                                    <input type="text" value="<?=$membre_row['prenom']?>" class="form-control" name="prenom">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">telephone</label>
                                                    <input type="text" value="<?=$membre_row['telephone']?>" class="form-control" name="telephone">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" value="<?=$membre_row['email']?>" name="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Date D'enregistrement</label>
                                                    <input name="date_enregistrement" value="<?=$membre_row['date_enregistrement']?>" class="form-control" type="date">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Date d'anniversaire</label>
                                                    <input name="date_anniv" value="<?=$membre_row['date_anniversaire']?>" type="date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Genre</label>
                                                    <select class="form-control" name="genre">
                                                        <option value="F">F</option>
                                                        <option value="M">M</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Fonction</label>
                                                    <input type="text" value="<?=$membre_row['fonction']?>" class="form-control" name="fonction">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Role</label>
                                                    <select class="form-control" name="role">
                                                        <option value="admin">Admin</option>
                                                        <option value="user">user</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Adresse d'origine</label>
                                                    <input type="text" value="<?=$membre_row['adress_origine']?>" name="adress_origine" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Address Actuelle</label>
                                                    <input type="text" value="<?=$membre_row['adress_actuelle']?>" name="adress_actuelle" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">BIOS</label>
                                                    <textarea class="form-control" rows="4" name="bios"><?=$membre_row['bios']?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group fallback w-100">
                                                    <input type="file" name="photo" class="dropify" data-default-file="">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <button type="submit" name="edit_membre"
                                                    class="btn btn-primary">Enregistrer</button>
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