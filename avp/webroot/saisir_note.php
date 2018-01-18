<?php
     @session_start();
     require_once($_SESSION['AVP_CONFIG']);

	 $obj_postulation=new Postulation_class();
	 $obj_candidat=new Candidat_class();
	
	 $role=$_SESSION["role"];
	 $fk_util_user=$_SESSION["id_user"];
	 
	 $annonce_id="";
 
	 if(isset($_GET["annonce_id"]))
	 {
		$annonce_id=$_GET["annonce_id"];
		$liste_des_postulants=$obj_candidat->lister_des_postulants($annonce_id);
	 } 
?>



<div class="container"  class="col-sm-12">
<div class="col-sm-11" style="margin-left:-25px;">
  <ol class="breadcrumb" >
      <li><a href="#">Recrutements</a></li>
      <li><a href="#">Postes Vacants</a></li>
      <li class="active">Saisir Note</li>
   </ol>
<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Matricule</th>
            <th>Civilité</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Note</th>
            <th>Age</th>
            <th>Date postulation</th>
            <th>Saisir Note</th>
        </tr>
    </thead>
    <tbody   id="id_note_postul">
        <?php
		
		foreach($liste_des_postulants as $row)
		{
		    
		?>
        <tr>
            <td><?php echo $row[$obj_candidat->GetCh_CANDIDAT_MATRICULE()]; ?></td>
            <td><?php echo $row[$obj_candidat->GetCh_CANDIDAT_CIVILITE()]; ?></td>
            <td><?php echo $row[$obj_candidat->GetCh_CANDIDAT_NOM()]; ?></td>
            <td><?php echo $row[$obj_candidat->GetCh_CANDIDAT_PRENOM()]; ?></td>
            <td><?php echo $obj_postulation->getNoteByidannAndFk_util_ser($row[$obj_postulation->GetCh_FK_annonce_id()],$row[$obj_candidat->GetCh_FK_UTIL_ID()]); ?></td>
            <td><?php echo $obj_candidat->calcul_age($row[$obj_candidat->GetCh_CANDIDAT_DATE_NAISSANCE()]); ?></td>
            <td>
			
			<?php  if($obj_postulation->La_date_est_en($row[$obj_postulation->GetCh_postulation_date()])==true)
		{echo $obj_postulation->dateswitch($row[$obj_postulation->GetCh_postulation_date()]);} ?>
            
            
            </td>
            <td  ><input type="button" name="id_note" class="btn-sm btn-info" id="id_note" value="Noter"  data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  title="<?php  echo $row[$obj_candidat->GetCh_FK_UTIL_ID()]; ?>">
           
            </td>
        </tr>
        <?php
		
		}
		
		?>
      
    </tbody>
</table>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Saisir notes Postulants</h4>
      </div>
      <div class="modal-body">
          <form class="form-horizontal"  action=""  method="POST" id="form_bt_modal"  name="form">
               <fieldset>
                         <div class="form-group">
                                  <div class="col-sm-1"></div>
                                  <div class="col-sm-5">
                                   <label>Note  : </label>
                                   <input class="form-control" type="text" name="note" id="note" value="" />
                                   </div>
                               </div>  
                            <div class="form-group">
                              <div class="col-sm-1"></div>    
                                <div class="col-sm-5">
                                    <label>Retenue</label>
                                    <SELECT name="retenu" id="retenu" class="form-control" >
                                            <option value="">S&eacute;lectionnez</option>
                                            <OPTION VALUE="oui">NON</OPTION>
                                            <OPTION VALUE="non">OUI</OPTION>
                                    </SELECT>
                                 </div>
                             </div>
                             <input type="hidden"  name="id_user" id="id_user" value="" />
                             <input type="hidden"  name="FK_ANNONCE_ID" id="FK_ANNONCE_ID" value="<?php echo @$annonce_id; ?>" /> 
                        </fieldset>
                  <div class="modal-footer">
                    <input type="submit" class="btn btn-info" id="saisir_note_btn" value="Enregistrer" />
                  </div>
             </form>   
    </div>
  </div>
</div>
</div>
<script src="js/saisir_note.js"></script>
