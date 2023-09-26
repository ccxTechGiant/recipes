<!--<img src="../../img/logo.png" alt="">-->
<?php
$conn = new PDO('mysql:host=localhost;dbname=recipes','root','');
error_reporting(1);
if(!$conn){
	echo "Database connection failed..!".mysqli_error("Connection unavailable...");
}
require_once('../TCPDF/tcpdf.php');
class myInvoice extends TCPDF{
	public function header(){
		$conn = new PDO('mysql:host=localhost;dbname=recipes','root','');
		$this->Rect(0, 0, $this->getPageWidth(),    $this->getPageHeight(), 'DF', "",  array(153,153,255));	$search = base64_decode($_GET['view']);
		$stmt = $conn->query("SELECT recipes.Image FROM recipes WHERE recipes.ID = '$search'");
		  while ($data = $stmt->fetch(PDO::FETCH_OBJ)) {
			  $imagePath = "../../administration/images/recipes/" . $data->Image;
			  if (file_exists($imagePath) && extension_loaded('gd') && function_exists('gd_info')) {
				  $imageInfo = pathinfo($imagePath);
				  $extension = strtolower($imageInfo['extension']);
				  switch ($extension) {
					  case 'jpg':
					  case 'jpeg':
						  $this->Image($imagePath, 2, 2.8, 74.5, '', 'JPG', '', 'T', false, 110, '', false, false, 0, false, false, false);
						  break;
					  case 'png':
						  $this->Image($imagePath, 2, 2.8, 72.5, '', 'PNG', '', 'T', false, 110, '', false, false, 0, false, false, false);
						  break;
					  case 'webp':
						  $this->Image($imagePath, 2, 2.8, 74.5, '', 'WEBP', '', 'T', false, 110, '', false, false, 0, false, false, false);
						  break;
					  case 'avif':
						  $this->Image($imagePath, 2, 2.8, 74.5, '', 'AVIF', '', 'T', false, 110, '', false, false, 0, false, false, false);
						  break;
					  case 'gif':
						  $this->Image($imagePath, 2, 2.8, 74.5, '', 'GIF', '', 'T', false, 110, '', false, false, 0, false, false, false);
						  break;
					  default:
						  break;
				  }
			  } else {
				  $this->Image('../../img/logo.png', 2, 2.8, 74.5, '', 'JPG', '', 'T', false, 110, '', false, false, 0, false, false, false);
			  }
		  }
		$imageFile1 = '../../img/logo.jpg';
		$this->Image($imageFile1,187.5,3.5,20,'','jpg','','T',false,10,'',false,false,0,false,false,false);
		$this->Ln(17);
		$this->setTextColor(0,0,102);
		$this->SetFont('Times','B','8');
		$this->setFillColor('Red');
		$this->Cell(189,5,'WEB-COOKBOOK',0,1,'C');
		$this->SetFont('Times','B','12');
		$this->setFillColor('Blue');
		$this->setTextColor(102,0,0);
		$this->Cell(189,5,'RECIPE SHARING MEDIA',0,1,'C');
		$this->SetFont('helvetica','B','10');
		$this->Cell(189,5,'RFE:00TFGH:RECPCOOKBOOK',0,1,'C');
		$this->SetFont('helvetica','B','10');
		$this->Cell(189,5,'WORLD',0,1,'C');
		$this->SetFont('helvetica','B','8');
		$this->Cell(189,5,'TEL: +123 700 000-000',0,1,'C');
		$this->SetFont('helvetica','B','8');
		$this->Cell(189,5,'www.cookbook.net',0,1,'C');
		$this->Ln(2);
		$this->SetFont('Times','B','11');
		$this->Cell(189,5,'RECIPE',0,1,'C');
		$this->Ln(-13);
		$this->SetFont('','B','48.6');
		$this->Cell(17,1,'._____________________.',0,0);    
		$this->SetLineStyle( array('width'=>0.40,'color'=> array(110,10,0)));
		$this->Line(2,3, $this->getPageWidth()-2,3);	
     	$this->Line($this->getPageWidth()-2,3, $this->getPageWidth()-2, $this->getPageHeight()-12);
		$this->Line($this->getPageWidth()-208,3, $this->getPageWidth()-208, $this->getPageHeight()-12);
		$this->Line(2,285, $this->getPageWidth()-2,285);
		$this->Ln(4);
		
	}
	public	function TableHeader(){
		$style = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,20,5,10', 'phase' => 10, 'color' => array(154, 189, 224));
		$style2 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 0, 0));
		$style3 = array('width' => 1, 'cap' => 'round', 'join' => 'round', 'dash' => '2,10', 'color' => array(255, 0, 0));
		$style4 = array('L' => 0,'T' => array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => '20,10', 'phase' => 10, 'color' => array(100, 100, 255)),'R' => array('width' =>0.50, 'cap' => 'round', 'join' => 'miter', 'dash' => 0, 'color' => array(50, 50, 127)),'B' =>array('width' => 0.75, 'cap' => 'square', 'join' => 'miter', 'dash' => '30,10,5,10'));
		$style5 = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 64, 128));
		$style6 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,10', 'color' => array(0, 128, 0));
		$style7 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 128, 0));
		$this->Ln(8);
		$this->SetFont('Times','B',12);
		$this->setTextColor(0,0,102);
		$this->Ln(8);
		$this->Cell(189,5,'DETAILS',0,0,'C');
		$this->Ln(4);
		$this->Cell(189,5,'______________________________________________________________',0,0,'C');
		$this->Ln(6);
		$this->setTextColor(255,0,0);
		$this->SetFont('Times','B',10);
		$this->Cell(50,10,'MEAL NAME',1,0,'C');
		$this->Cell(40,10,'CATEGORY',1,0,'C');
		$this->Cell(40,10,'TYPE OF MEAL',1,0,'C');
		$this->Cell(34,10,'POSTED BY',1,0,'C');
		$this->Cell(24,10,'DURATION',1,0,'C');
		$this->Ln();
					
	}
	public function viewTable($conn){
        $search =base64_decode($_GET['view']);
		$this->SetFont('Times','BI',10);
		$this->setTextColor(102,0,0);
		$stmt = $conn->query("SELECT food_name,Category,Duration,Nick,First_name FROM recipes join designers on designers.phone=recipes.phone join category on category.ID=recipes.categoryid where recipes.ID='$search'");
		// Star polygon
			$this->StarPolygon(197.5, 34, 7, 50, 28);
		while($data=$stmt->fetch(PDO::FETCH_OBJ)){
		$this->Cell(50,10,$data->food_name,1,0,'C');
		$this->Cell(40,10,$data->Category,1,0,'C');
		$this->Cell(40,10,$data->Nick,1,0,'C');
		$this->Cell(34,10,$data->First_name,1,0,'C');
		$this->Cell(24,10,$data->Duration,1,0,'C');
		$this->Ln();
		}
		}
	
		public	function Steps(){
		$this->setTextColor(255,0,0);
		$this->SetFont('Times','B',12);
		$this->Cell(188,5,'STEPS',1,0,'C');
		$this->Ln(4);
					
	}
		public function viewRecipe($conn){
	    $search=base64_decode($_GET['view']);
		$this->setTextColor(0,0,102);
        $this->SetFont('Times','B',8);	
		$st = $conn->query("select step1,step2,step3,step4,step5,step6,step7,step8,step9,step10,step11,step12,step13,step14,step15,step16,step17,step18,step19,step20 FROM recipes join designers on designers.phone=recipes.phone join category on category.ID = recipes.categoryid where designers.phone = recipes.phone && recipes.ID='$search'");
		while($dat=$st->fetch(PDO::FETCH_OBJ)){
		$this->Cell(6,5,'1',1,0,'C');
		$this->Cell(182,5,$dat->step1,1,0,'L');
		if($dat->step2 !==''){
		$this->Ln();
		$this->Cell(6,5,'2',1,0,'C');
		$this->Cell(182,5,$dat->step2,1,0,'L');	
		}
		if($dat->step3 !==''){
		$this->Ln();
		$this->Cell(6,5,'3',1,0,'C');
		$this->Cell(182,5,$dat->step3,1,0,'L');
		}
		if($dat->step4 !==''){
		$this->Ln();
		$this->Cell(6,5,'4',1,0,'C');
		$this->Cell(182,5,$dat->step4,1,0,'L');
		}
		if($dat->step5 !==''){
		$this->Ln();
		$this->Cell(6,5,'5',1,0,'C');
		$this->Cell(182,5,$dat->step5,1,0,'L');
		}
		if($dat->step6 !==''){
		$this->Ln();
		$this->Cell(6,5,'6',1,0,'C');
		$this->Cell(182,5,$dat->step6,1,0,'L');
		}
	    if($dat->step7 !==''){
		$this->Ln();
		$this->Cell(6,5,'7',1,0,'C');
		$this->Cell(182,5,$dat->step7,1,0,'L');
		}
		if($dat->step8 !==''){
		$this->Ln();
		$this->Cell(6,5,'8',1,0,'C');
		$this->Cell(182,5,$dat->step8,1,0,'L');
		}
		if($dat->step9 !==''){
		$this->Ln();
		$this->Cell(6,5,'9',1,0,'C');
		$this->Cell(182,5,$dat->step9,1,0,'L');
		}
		if($dat->step10 !==''){
		$this->Ln();
		$this->Cell(6,5,'10',1,0,'C');
		$this->Cell(182,5,$dat->step10,1,0,'L');
		}
		if($dat->step11 !==''){
		$this->Ln();
		$this->Cell(6,5,'11',1,0,'C');
		$this->Cell(182,5,$dat->step11,1,0,'L');
		}
		if($dat->step12 !==''){
		$this->Ln();
		$this->Cell(6,5,'12',1,0,'C');
		$this->Cell(182,5,$dat->step12,1,0,'L');
		}
		if($dat->step13 !==''){
		$this->Ln();
		$this->Cell(6,5,'13',1,0,'C');
		$this->Cell(182,5,$dat->step13,1,0,'L');
		}
		if($dat->step14 !==''){
		$this->Ln();
		$this->Cell(6,5,'14',1,0,'C');
		$this->Cell(182,5,$dat->step14,1,0,'L');
		}
		if($dat->step15 !==''){
		$this->Ln();
		$this->Cell(6,5,'15',1,0,'C');
		$this->Cell(182,5,$dat->step15,1,0,'L');
		}
		if($dat->step16 !==''){
		$this->Ln();
		$this->Cell(6,5,'16',1,0,'C');
		$this->Cell(182,5,$dat->step16,1,0,'L');
		}
		if($dat->step17 !==''){
		$this->Ln();
		$this->Cell(6,5,'17',1,0,'C');
		$this->Cell(182,5,$dat->step17,1,0,'L');
		}
		if($dat->step18 !==''){
		$this->Ln();
		$this->Cell(6,5,'18',1,0,'C');
		$this->Cell(182,5,$dat->step18,1,0,'L');
		}
		if($dat->step19 !==''){
		$this->Ln();
		$this->Cell(6,5,'19',1,0,'C');
		$this->Cell(182,5,$dat->step19,1,0,'L');
		}
		if($dat->step20 !==''){
		$this->Ln();
		$this->Cell(6,5,'20',1,0,'C');
		$this->Cell(182,5,$dat->step20,1,0,'L');
			
		}
		}
	}
	
	
	public function Footer(){
		$conn = new PDO('mysql:host=localhost;dbname=recipes','root','');
		$search = base64_decode($_GET['view']);
		$this->SetY(-117);
		$this->Ln(34);
		$this->setTextColor(0,108,94);
		$this->SetFont('Times','B','9');
		date_default_timezone_set("Africa/Nairobi");
		$today= date("F j,Y");
	    $stmt = $conn->query("SELECT First_name,Surname,about,Category,Duration,Nick FROM designers join recipes on recipes.phone=designers.phone join category on category.ID=recipes.categoryid where recipes.ID='$search'");
		while($data=$stmt->fetch(PDO::FETCH_OBJ)){
		$this->MultiCell(189,5,"The Information provided on this Document is Informative and In No way supersedes the opinion of".'  '.$data->First_name.' '.$data->Surname .' '.".Please read the following description before diving into the kitchen:",0,'L',0,1,'','',true);
		$this->Ln(1);
		$this->setTextColor(0,0,0);
		$this->SetFont('Times','B','8');
		$this->MultiCell(187,23,"$data->about",0,'L',0,1,'','',true);
		$this->Ln(2);
		$this->Cell(14,16,'_______________________________________________________________________________________________________________________________',0,2);
		$this->Ln(-3);
		$this->setFont('Times','B',10);
		$this->Cell(188,5,'NOTE',0,0,'C');
		$this->Ln();
		$this->setFont('Times','BI',10);
		$html='<p style="text-align:justify;color:blue;">The rules & regulations of the Web-COOKBOOK users pertaining this media are assummed to be read and understood. Therefore,the agreement abides everyone & the information shared is declared accurate to the best of each ones knowledge as on the date today: ' .$today. ' .Moreover any false or misleading information given by users or suppression of any material fact will render the suspect`s account liable for termination and further action be taken. </P>';
		$this->writeHTML($html,true,false,true,false);
		
		$this->SetY(-8);
		
		$this->SetFont('helvetica','BI',8);
		date_default_timezone_set("Africa/Nairobi");
		$today= date("F j,Y  @  g:i A",time());
		$this->Cell(25,-2,'Generation Date / Time:'.$today,0,0,'L');
		$this->Cell(150,-2,'Designed By:'.' '.$data->First_name .' '.$data->Surname,0,0,'C');
		$this->Cell(30,-2,'page'.' '.$this->getAliasNumPage().' of '.' '.$this->getAliasNbPages(),0,false,'R',0,'',0,false,'T','M');
		$this->SetFont('helvetica','',8);
		}
	}
}
// create new PDF document
$pdf = new myInvoice('p','mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('TASTY RECIPES');
$pdf->SetTitle('REFDB: 520, 001::500. RECIPES');
$pdf->SetSubject('RCKT');
$pdf->SetKeywords('cookbook.net');


// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}
// set default font subsetting mode
$pdf->setFontSubsetting(true);
$pdf->SetFont('dejavusans', '', 14, '', true);



// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();
$pdf->Ln(10);
$pdf->SetFont('Times','B',8);
$pdf->Ln(15);
$pdf->TableHeader();
$pdf->viewTable($conn);
$pdf->Ln();
$pdf->Steps();
$pdf->Ln(1.2);
$pdf->viewRecipe($conn);
$pdf->Ln(-140);
ob_end_clean();
$pdf->Output('Report', 'I');


//============================================================+
// END OF FILE
//============================================================+


?>