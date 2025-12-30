<?php include("include/header.php");

?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Modifier l'élément</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Uploqd</li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Modifier</a></li>
                </ol>
            </div>
        </div>

        <?php
        if (isset($_GET['id'])) {
            $fichier_id = $_GET['id'];
            $fichier = "SELECT * FROM fichiers WHERE id ='$fichier_id'";
            $fichier_run = mysqli_query($con, $fichier);

            if (mysqli_num_rows($fichier_run) > 0) {
                $fichier_row = mysqli_fetch_array($fichier_run);
                ?>
                <div class="row">
                    <div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title"><strong><i>Modifier l'élément</i></strong></h5>
                            </div>
                            <div class="card-body">
                                <form action="code.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="fichier_id" value="<?= $fichier_id ?>">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Nom du fichier</label>
                                                <input type="text" class="form-control" name="fichier"
                                                    value="<?= $fichier_row['nom_fichier'] ?>" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Type de fichier</label>
                                                <select class="form-control" name="type" required>
                                                    <option value="videos" <?= ($fichier_row['type'] == 'videos') ? 'selected' : '' ?>>
                                                        🎥 Vidéo</option>
                                                    <option value="documents"
                                                        <?= ($fichier_row['type'] == 'documents') ? 'selected' : '' ?>>📄 Document
                                                    </option>
                                                    <option value="audio" <?= ($fichier_row['type'] == 'audio') ? 'selected' : '' ?>>🎵
                                                        Audio</option>
                                                    <option value="partitions"
                                                        <?= ($fichier_row['type'] == 'partitions') ? 'selected' : '' ?>>🎼 Partition
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Statut</label>
                                                <select class="form-control" name="statut" required>
                                                    <option value="public" <?= ($fichier_row['statut'] == 'public') ? 'selected' : '' ?>>🌐 Public</option>
                                                    <option value="membres" <?= ($fichier_row['statut'] == 'membres') ? 'selected' : '' ?>>👥 Membres seulement</option>
                                                    <option value="admin" <?= ($fichier_row['statut'] == 'admin') ? 'selected' : '' ?>>
                                                        🔒 Admin</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label class="form-label">Fichier actuel</label>
                                            <div class="form-group">
                                                <small class="text-muted"><?= $fichier_row['chemin'] ?></small>
                                                <br><small class="text-info">✅ Garder le fichier actuel</small>
                                            </div>
                                            <label class="form-label">Nouveau fichier (optionnel)</label>
                                            <input type="file" name="nouveau_fichier" class="dropify" data-default-file="">
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" rows="4" name="description"
                                                    placeholder="Description...."><?= $fichier_row['description'] ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <button type="submit" name="save_file" class="btn btn-primary">💾 Enregistrer les
                                                modifications</button>
                                            <a href="index.php" class="btn btn-secondary">❌ Annuler</a>
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