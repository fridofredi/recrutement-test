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
                            <span class="badge info-color-dark p-2">Véhicules en maintenance</span>
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
                                    <span>TYPE</span>
                                </th>
                                <th>
                                    <span>Date d'achat</span>
                                </th>
                                <th>
                                    <span>Date de fin de maintenace</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($vehicules as $data) : ?>
                                <tr>
                                    <td><?= $data->ID ?></td>
                                    <td><?= $data->TYPE ?></td>
                                    <td><?= $data->DATE_ACHAT ?></td>
                                    <td><?= $data->DATE_FIN ?></td>
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
