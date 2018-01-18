<?php
@session_start();
require_once($_SESSION['AVP_CONFIG']);
require_once('PHPExcel.php');
require_once('PHPExcel/Writer/Excel2007.php');


$workbook = new PHPExcel;
$styleArray = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                   'rgb' => '808080'
                )
            )
        );   
        
        
        $styleArray1 = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                   'rgb' => '000'
                )
            )
        );  
		
		
		
		                $sheet = $workbook->createSheet();
                        $workbook->setActiveSheetIndex(0);
                        $sheet = $workbook->getActiveSheet();
                        $sheet->setCellValue('E1',"Candidats selectionnés");
                        $sheet->getColumnDimension('A')->setWidth(5);
                        $sheet->SetTitle("Annonce");
                        
                        $sheet->mergeCells('E1:BC1');
                               
                        $sheet->getStyle(
                            'E1:' . 
                            $sheet->getHighestColumn() . 
                            $sheet->getHighestRow()
                        )->applyFromArray($styleArray);
                        
                        $styleA1 = $sheet->getStyle('A1');
                        
                        $styleA1->applyFromArray(array(
                            'font'=>array(
                                'bold'=>true,
                                'size'=>10,
                                'name'=>'',
                                'color'=>array(
                                    'rgb'=>'FF00FF00'),
                                    )
                            ));
                        
                        $sheet->getStyle('E1')->applyFromArray(array(

                        'fill'=>array(
                            'type'=>PHPExcel_Style_Fill::FILL_SOLID,
                            'color'=>array(
                                'argb'=>'999999'))));
                             
                        //Fin A1
               
					//entete 
					
					    for($col='E'; $col!= 'K'; $col++) 
						{
						   $sheet->getColumnDimension($col)->setAutoSize(true);
						}
						
						
                      $sheet->setCellValue('A5',"N°");
                      $sheet->setCellValue('B5',"Ref");
                      $sheet->setCellValue('C5',"Intitulé");
                      $sheet->setCellValue('D5',"Matricule");
                      $sheet->setCellValue('E5',"Nom/Prenom");
                      $sheet->setCellValue('F5',"Age");
					  
					  $sheet->setCellValue('G5',"Nationalité");
                      $sheet->setCellValue('H5',"Coordonnées");
                      $sheet->setCellValue('I5',"Formation");
                      $sheet->setCellValue('J5',"Experiences");
					  $sheet->setCellValue('K5',"Competences");
					  $sheet->setCellValue('L5',"Qualités");
                      $sheet->setCellValue('M5',"Pieces Jointes");
                      $sheet->setCellValue('N5',"Appreciation");
                    
					 
                      $sheet->getStyle('E2')->applyFromArray(array(
    
                                 'fill'=>array(
                                 'type'=>PHPExcel_Style_Fill::FILL_SOLID,
                                  'color'=>array(
                                      'argb'=>'CCCCCC'),
                                      )));
                                      
                                 $sheet->getStyle('E2')->applyFromArray($styleArray);
                                         
                                 $styleTitre = $sheet->getStyle('E2');
                                 
                                     
                                 $styleTitre->applyFromArray(array(
                                 'font'=>array(
                                      'bold'=>true,
                                      'size'=>8,
                                     'name'=>'',
                                     'color'=>array(
                                         'rgb'=>'FF00FF00'))
                                 ));
                                 
                                 $sheet->duplicateStyle($styleTitre,'E2:J2');
			
				  
				         $sheet->getStyle('L3')->applyFromArray(array(
                               'font'=>array(
                                'bold'=>false,
                                'size'=>10,
                                'name'=>'',
                                'color'=>array(
                                    'rgb'=>'FF00FF00'),
                                    )
                            ));
                            
						
					    $writer = new PHPExcel_Writer_Excel2007($workbook);
						
						$nom_fichier ="candidat_retenus";
						
						header('Content-Type: application/vnd.ms-excel');
						header('Content-Disposition: attachment;filename="'.$nom_fichier.'"');
						header('Cache-Control: max-age=0');
							 
						$writer->save('php://output');




?>