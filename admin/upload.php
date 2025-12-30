<?php include("include/header.php"); 

?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Depot de la chorale</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Depot</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Ajouters</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><strong><i>Depot de la chorale</i></strong></h5>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Nom du fichier</label>
                                        <input type="text" class="form-control" name="fichier">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Type de fichier</label>
                                        <select class="form-control" name="type" required>
                                            <option value="videos">🎥 Vidéo</option>
                                            <option value="documents">📄 Document</option>
                                            <option value="audio">🎵 Audio</option>
                                            <option value="partitions">🎼 Partition</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Statut</label>
                                        <select class="form-control" name="statut" required>
                                            <option value="public">🌐 Public</option>
                                            <option value="membres">👥 Membres seulement</option>
                                            <option value="admin">🔒 Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label class="form-label">Fichier</label>
                                    <div class="form-group fallback w-100">
                                        <input type="file" name="fichier" class="dropify" data-default-file="">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" rows="4" name="description" placeholder="Description...."></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" name="save_file" class="btn btn-primary">Enregistrer</button>
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