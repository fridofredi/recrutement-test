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
                            <span class="badge info-color-dark p-2">Modifier un probleme</span>
                        </p>
                    </div>
                    <!--/Panel Header-->

                    <!--Panel content-->
                    <div class="card-body">
                        <a class='btn btn-info right-float' href="index.php?page=Vehicule">Liste des problemes</a>
                        <h1>&nbsp;</h1>

                        <form action='index.php?page=Probleme/upgrade' method='post' id='datatable'
                              class='form-element'>
                            <?= $CSRF() ?>
                            <input class='form-control' name="id" id="id" type="hidden" value="<?= $id ?>">

                            <div class='form-row'>
                                <div class='col-12'>
                                    <div class='md-form'>
                                        <label for='detail'>DETAIL</label>
                                        <textarea class='md-textarea form-control' id="detail"
                                                  name='detail'><?= $table->DETAIL ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="view view-cascade py-3 gradient-card-header">
                                <p class="lead">
                                    <span class="badge info-color-dark p-2">Opération de maintenance</span>
                                </p>
                            </div>
                            <div class='form-row'>
                                <div class='col-6'>
                                    <div class='md-form'>
                                        <label for='date_debut'>Date de début</label>
                                        <input class='form-control' name='date_debut' id='date_debut' type='date'
                                               value='<?= $table->DATE_DEBUT ?>' placeholder='DATE_DEBUT'>
                                    </div>
                                </div>

                                <div class='col-6'>
                                    <div class='md-form'>
                                        <label for='date_fin'>Date de fin</label>
                                        <input class='form-control' name='date_fin' id='date_fin' type='date'
                                               value='<?= $table->DATE_FIN ?>' placeholder='DATE_FIN'>
                                    </div>
                                </div>

                                <div class='col-6'>
                                    <div class='md-form'>
                                        <label for='sujet'>SUJET</label>
                                        <input class='form-control' name='sujet' id='sujet' type='text'
                                               value='<?= $table->SUJET ?>' placeholder='SUJET'>
                                    </div>
                                </div>

                                <div class='col-6'>
                                    <div class='md-form'>
                                        <label for='description'>DESCRIPTION</label>
                                        <input class='form-control' name='description' id='description' type='text'
                                               value='<?= $table->DESCRIPTION ?>' placeholder='DESCRIPTION'>
                                    </div>
                                </div>
                            </div>

                            <div class="view view-cascade py-3 gradient-card-header">
                                <p class="lead">
                                    <span class="badge info-color-dark p-2">Pièces</span>
                                </p>
                            </div>
                            <div class="form-row">

                                <div class='col-12'>
                                    <div class='md-form'>
                                        <label for='description'>Pièces(Liste des pièces séparées par des
                                            virgules)</label>
                                        <textarea class='md-textarea form-control' name='pieces'
                                                  placeholder='Pièces'><?= $pieces ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class='md-form'>
                                <input type='submit' name='submit' class='btn btn-info' value='Mettre à jour'>
                                <input type='reset' class='btn btn-danger' value='Annuler'>
                            </div>
                        </form>

                        <!--Panel content-->

                    </div>
                    <!--Grid column-->

        </section>
        <!--Section: Main panel-->

    </div>

</div>
<!--Grid row-->
        