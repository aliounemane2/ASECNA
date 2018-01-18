 
 <?php
 
 /* Mise en page PDF recap Candidat */

		
	ob_start();
    include(dirname(__FILE__) . '/pdf/recap_candidat.php');
    $content = ob_get_clean();

    // convert in PDF
    require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr', true, 'UTF-8', array(15, 5, 15, 5));
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('recap_candidature.pdf');
    }
    catch(HTML2PDF_exception $e) 
	{
        echo $e;
        exit;
    }
		
?>