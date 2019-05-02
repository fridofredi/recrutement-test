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
                            <span class="badge info-color-dark p-2">Affichage d'un probleme</span>
                        </p>
                    </div>
                    <!--/Panel Header-->

                    <!--Panel content-->
                    <div class="card-body">
                        <a class='btn btn-info right-float' href="index.php?page=Vehicule">Liste des véhicules</a>
                        <h1>&nbsp;</h1>
                        <ul>
                            <li>Détail : <?= $table->DETAIL; ?></li>
                            <li>Date de début : <?= $table->DATE_DEBUT; ?></li>
                            <li>Date de fin : <?= $table->DATE_FIN; ?></li>
                            <li>Sujet : <?= $table->SUJET; ?></li>
                            <li>Description : <?= $table->DESCRIPTION; ?></li>
                            <li>Pièces
                                <ul>
                                    <?= $pieces ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--Panel content-->

                </div>
                <!--Grid column-->

        </section>
        <!--Section: Main panel-->

    </div>

</div>
<!--Grid row-->
        