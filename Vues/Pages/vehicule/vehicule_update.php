<!-- Heading -->
<div class="card mb-4 wow fadeIn">

    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
            <span>/</span>
            <span>Vehicule</span>
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
                            <span class="badge info-color-dark p-2">Modifier un vehicule</span>
                        </p>
                    </div>
                    <!--/Panel Header-->

                    <!--Panel content-->
                    <div class="card-body">
                        <a class='btn btn-info right-float' href="index.php?page=Vehicule">Liste des vehicules</a>
                        <h1>&nbsp;</h1>

                        <form action='index.php?page=Vehicule/upgrade' method='post' id='datatable'
                              class='form-element'>
                            <?= $CSRF() ?>
                            <div class="form-row">
                                <input class='form-control' name="id" id="id" type="hidden" value="<?= $id ?>">

                                <div class='col-6'>
                                    <div class='md-form'>
                                        <label for='type_vehicule_id'>Type de véhicule</label>
                                        <select class='browser-default custom-select mb-4' name='type_vehicule_id'
                                                id='type_vehicule_id'>
                                            <?php foreach ($select_data as $attr) : ?>
                                                <option value="<?= $attr->ID; ?>" <?php echo(($attr->ID == ($table->getType_vehicule_id())) ? "selected" : "") ?>><?= $attr->TYPE ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class='col-6'>
                                    <div class='md-form'>
                                        <label for='date_achat'>Date d'achar</label>
                                        <input class='form-control' name='date_achat' id='date_achat' type='date'
                                               placeholder='DATE_ACHAT'>
                                    </div>
                                </div>

                            </div>
                            <div class='md-form'>
                                <input type='submit' name='submit' class='btn btn-info' value='Mettre à jour'>
                                <input type='reset' class='btn btn-danger' value='Annuler'>
                            </div>
                        </form>

                    </div>
                    <!--Panel content-->

                </div>
                <!--Grid column-->

        </section>
        <!--Section: Main panel-->

    </div>

</div>
<!--Grid row-->
        