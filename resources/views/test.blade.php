<div class="row">
        <div class="col-lg-8">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Fiche Licencie N° $licencie->num_licence</h3>
                </div>
                <div class="box-body">
                <div class="pull-right"><img src="http://localhost/adminlte/public/uploads/$licencie->lb_photo" class="img-thumbnail" style="width: 250px; height: 250px; margin-right: 50px"></div>
                <p>Statut : $licencie->statut_licence->lb_statut <a href="#" data-toggle="tooltip" title="Une licence peu possède un des trois status suivant : Gratuit , Non Payé , A Renouveller">?</a></p>
                <p>Nom : $licencie->lb_nom</p>
                <p>Prenom : $licencie->lb_prenom</p>
                <p>Fonction : $licencie->activite_licencie->lb_activite </p>
                <p>Date de naissance : $licencie->dt_naissance</p>
                <p>Ville de naissance : $licencie->lb_ville_naissance</p>
                <p>Code Postal : $licencie->cd_dept_naissance </p>
                <p>Adresse Email : $licencie->adresse_email </p>
                <p>Pays de naissance : $licencie->pays->fr</p>
                <p>Licence Crée le : $licencie->created_at</p>
                <p>Licence enregistré pour la Saison : $licencie->saison->lb_saison</p>

                </div>
            </div>
        </div>

    <div class="col-md-4">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Actions</h3>
            </div>
            <div class="box-body">
                 link_to_route('export.pdf', 'Export to PDF', [$licencie] , ['class' => 'btn btn-info'])
            </div>
        </div>
    </div>