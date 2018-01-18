<?php

       /* Mise en page PDF Liste Candidat */

       /*
	    include(dirname(__FILE__).'/pdf/listeCandidat.php');
        $data = ob_get_clean();

        require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->WriteHTML($data);
        $html2pdf->Output('listeCandidat.pdf');
		
		*/
		
		ob_start();
		include(dirname(__FILE__) . '/pdf/detail_annonce.php');
		$content = ob_get_clean();
	
		// convert in PDF
		require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
		try
		{
			$html2pdf = new HTML2PDF('P', 'A4', 'fr', true, 'UTF-8', array(15, 5, 15, 5));
			$html2pdf->pdf->SetDisplayMode('fullpage');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output('detail_annonce.pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}
		
?>

