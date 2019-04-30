<!-- Heading -->
<div class="card mb-4 wow fadeIn">

    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
            <span>/</span>
            <span>Technicien</span>
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
                            <span class="badge info-color-dark p-2">Liste des techniciens</span>
                        </p>
                    </div>
                    <!--/Panel Header-->

                    <!--Panel content-->
                    <div class="card-body">
                        <a class='btn btn-info right-float' href="index.php?page=Technicien/create">Créer un
                            technicien</a>
                        <h1>&nbsp;</h1>
                        <table class='table'>
                            <thead class='blue-gradient text-white'>
                            <tr>
                                <th>
                                    <span>ID</span>
                                </th>
                                <th>
                                    <span>NOM</span>
                                </th>
                                <th>
                                    <span>PRENOMS</span>
                                </th>
                                <th>
                                    <span>USERNAME</span>
                                </th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($table_data as $data) : ?>
                                <tr>
                                    <td><?= $data->ID ?></td>
                                    <td><?= $data->NOM ?></td>
                                    <td><?= $data->PRENOMS ?></td>
                                    <td><?= $data->USERNAME ?></td>
                                    <td>
                                        <a href="index.php?page=Technicien/show/<?= $data->ID ?>"><i
                                                    class="fa fa-eye fa-2x"></i></a>
                                        <a href="index.php?page=Technicien/update/<?= $data->ID ?>"><i
                                                    class="fa fa-edit fa-2x"></i></a>
                                        <a href="index.php?page=Technicien/remove/<?= $data->ID ?>/<?= $token ?>"><i
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
        