<!-- Heading -->
<div class="card mb-4 wow fadeIn">

    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
            <span>/</span>
            <span>Type de vehicule</span>
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
                            <span class="badge info-color-dark p-2">Ajouter un type de véhicule</span>
                        </p>
                    </div>
                    <!--/Panel Header-->

                    <!--Panel content-->
                    <div class="card-body">
                        <a class='btn btn-info right-float' href="index.php?page=Type_vehicule">Liste des types</a>
                        <h1>&nbsp;</h1>
                        <form action='index.php?page=Type_vehicule/store' method='post' id='datatable'
                              class='form-element'>
                            <?= $CSRF() ?>
                            <div class='form-row'>

                                <div class='col-12'>
                                    <div class='md-form'>
                                        <label for='type'>TYPE</label>
                                        <input class='form-control' name='type' id='type' type='text'
                                               placeholder='TYPE'>
                                    </div>
                                </div>

                            </div>
                            <div class='md-form'>
                                <input type='submit' name='submit' class='btn btn-info' value='Ajouter'>
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
        