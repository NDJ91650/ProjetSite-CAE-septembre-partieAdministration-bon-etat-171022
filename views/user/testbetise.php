<!-- Button trigger modal -->
<button type="button" class="btn btn-jaune" data-toggle="modal" data-target="#modal-modification4-">Modifier informations établissement</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal-modification4-" tabindex="0" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modification Etablissement</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                        <div class="modal-body">
                            <form id="form" action="” . URL . “compte/modificationInfoPerso/” . $tableau->getId_utilisateur() . “" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                    <label for="rne-etbsmt">Modifier le RNE de votre établissement principal :</label>
                                    <input type="text" class="form-control" name="rne_etbsmt" id="rne-etbsmt" placeholder="Ex. 0950809F" ">
                            </div>
                            <div class="form-group">
                                    <label for="academie-etbsmt">Académie de l"établissement :</label>
                                    <input type="text" class="form-control" name="academie_etbsmt" id="academie-etbsmt" placeholder="Ex. Notre Dame" >
                            </div>
                            <div class="form-group">
                                    <label for="nom-etbsmt-principal">Nom de l"établissement principal :</label>
                                    <input type="text" class="form-control" name="nom_etbsmt_principal" id="nom-etbsmt-principal" placeholder="Ex. Notre Dame">
                            </div>
                            <div class="form-group">
                                    <label for="adresse-etbsmt">Adresse de votre établissement principal :</label>
                                    <input type="text" class="form-control" name="adresse_etbsmt" id="adresse-etbsmt" placeholder="Ex. 15 rue du maréchal Joffre 78000 Versailles">
                            </div>
                            <div class="row">
                        <div class="col form-group">
                            <label for="cp-etbsmt">Code postal établissement principal :</label>
                            <input type="text" class="form-control" name="cp_etbsmt" id="cp-etbsmt" placeholder="Ex. 15 rue du maréchal Joffre 78000 Versailles">
                        </div>
                        <br>
                        <div class="col form-group">
                            <label for="ville-etbsmt">Ville établissment principal</label>
                            <input type="text" class="form-control" name="ville_etbsmt" id="ville-etbsmt" placeholder="Ex. 15 rue du maréchal Joffre 78000 Versailles">
                        </div>
                    </div>
                                <br>
                    <div class="row">
                        <div class="col form-group">
                            <label for="num-etbsmt">Numéro établissment principal</label>
                            <input type="text" class="form-control" name="num_etbsmt" id="num-etbsmt" placeholder="Numéro établissement">
                        </div>
                                        <br>
                        <div class="col form-group">
                            <label for="email-etbsmt">Email établissment principal</label>
                            <input type="text" class="form-control" name="email_etbsmt" id="email-etbsmt" placeholder="Adresse mail établissement">
                        </div>
                    </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-primary">Modifier</button>
                                        </div>
                            </form>
                        </div>
                      </div>
                /div>