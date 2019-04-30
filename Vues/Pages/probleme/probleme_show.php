<!-- Heading -->
<div class="card mb-4 wow fadeIn">

    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
            <span>/</span>
            <span>Probleme</span>
        </h4>
    </div>

</div>
<!-- Heading -->

<!--Grid row-->
<div class="row wow fadeIn">

    <!--Grid column-->
    <div class="col-md-12 mb-4">
        <section class="card card-cascade narrower mb-5">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-12">


                    <!--Panel Header-->
                    <div class="view view-cascade py-3 gradient-card-header">
                        <p class="lead">
                            <span class="badge info-color-dark p-2">Liste des problemes</span>
                        </p>
                    </div>
                    <!--/Panel Header-->

                    <!--Panel content-->
                    <div class="card-body">
                        <h1>&nbsp;</h1>
                        <table class='table'>
                            <thead class='blue-gradient text-white'>
                            <tr>
                                <th>
                                    <span>ID</span>
                                </th>
                                <th>
                                    <span>Technicien</span>
                                </th>
                                <th>
                                    <span>Détail</span>
                                </th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($table_data as $data) : ?>
                                <tr>
                                    <td><?= $data->getId() ?></td>
                                    <td><?= $data->Technicien()->getNom() ?></td>
                                    <td><?= $data->DETAIL ?></td>
                                    <td>
                                        <a href="index.php?page=Probleme/remove/<?= $vehicule ?>/<?= $data->ID ?>?token=<?= $token ?>"><i
                                                    class="fa fa-trash-alt fa-2x"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>


                    </div>
                    <!--Panel content-->

                </div>
                <!--Grid column-->

        </section>
        <!--Section: Main panel-->

    </div>

</div>
<!--Grid row-->
        