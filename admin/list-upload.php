<?php include("include/header.php"); ?>

<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Archivage</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Archive</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Liste des fichiers</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><strong>Liste des fichiers</strong></h4>
                        <a href="upload" class="btn btn-primary">+ Add new</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Nom de Fichier</th>
                                        <th>Nom Original</th>
                                        <th>Type</th>
                                        <th>Date upload</th>
                                        <th>Fichier</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $posts = "SELECT * FROM fichiers ORDER BY date_upload DESC";
                                    $posts_run = mysqli_query($con, $posts);

                                    if (mysqli_num_rows($posts_run) > 0) {
                                        foreach ($posts_run as $item) {
                                            $chemin = "" . $item['chemin']; // Votre chemin actuel
                                            $type = $item['type'] ?? 'document'; // Ajoutez ce champ dans votre BDD si pas déjà fait
                                            // $taille = filesize($chemin) / 1024 / 1024; // Taille en Mo
                                    
                                            ?>
                                            <tr>
                                                <td style="vertical-align: top;">
                                                    <?php if (file_exists($chemin)): ?>
                                                        <?php if ($item['type'] == 'videos'): ?>
                                                            <!-- VIDÉO : Player + Download -->
                                                            <div style="max-width: 200px; margin-bottom: 5px;">
                                                                <video width="100%" height="120" controls preload="metadata">
                                                                    <source src="<?= $chemin ?>" type="video/mp4">
                                                                    Votre navigateur ne supporte pas la vidéo.
                                                                </video>
                                                            </div>
                                                            <!-- <a href="<?= $chemin ?>" download class="btn btn-sm btn-success">
                                                                <i class="la la-download"></i> Télécharger la vidéo
                                                            </a> -->

                                                        <?php elseif ($item['type'] == 'audio'): ?>
                                                            <!-- AUDIO : Player + Download -->
                                                            <div style="margin-bottom: 5px;">
                                                                <audio controls style="width: 200px;">
                                                                    <source src="<?= $chemin ?>" type="audio/mpeg">
                                                                    Votre navigateur ne supporte pas l'audio.
                                                                </audio>
                                                            </div>
                                                            <!-- <a href="<?= $chemin ?>" download class="btn btn-sm btn-success">
                                                                <i class="la la-download"></i> Télécharger l'audio
                                                            </a> -->

                                                        <?php else: // document/partition - ICÔNE PDF --> ?>
                                                            <a href="<?= $chemin ?>" download class="btn btn-sm btn-danger"
                                                                title="Télécharger">
                                                                <i class="la la-file-pdf-o" style="font-size: 35px;"></i>
                                                                <br><small><?= number_format(filesize($chemin) / 1024, 1) ?> Ko</small>
                                                            </a>

                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <span class="text-danger">❌ Fichier introuvable</span>
                                                    <?php endif; ?>
                                                </td>

                                                <td><?= $item['nom_fichier']; ?></td>
                                                <td><?= $item['nom_original'] ?></td>
                                                <td><?= $item['type'] ?></td>
                                                <td><?= date('d/m/Y H:i', strtotime($item['date_upload'])) ?></td>
                                                <td>
                                                    <a href="edit-upload.php?id=<?= $item['id'] ?>"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="la la-pencil"></i>
                                                    </a>
                                                    <a href="delete.php?id=<?= $item['id'] ?>" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Supprimer ?')">
                                                        <i class="la la-trash-o"></i>
                                                    </a>
                                                    <a href="<?= $chemin ?>" target="_blank" class="btn btn-sm btn-success">
                                                        <i class="la la-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else { ?>
                                        <tr>
                                            <td colspan="6" class="bg-danger text-white text-center p-4">
                                                Aucun fichier trouvé
                                            </td>
                                        </tr>
                                    <?php } ?>
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