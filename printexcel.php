<?php
$data=$_POST['str'];     
$filename='sample';

if($_POST['Printtype']=='Excel')
{
    header("Content-Type: application/xls");    
    header("Content-Disposition: attachment; filename=$filename.xls");  
    header("Pragma: no-cache"); 
    header("Expires: 0");

    //echo  "\t";
    $records = trim(preg_replace('/\s\s+/', '*&$', $data));
    $records=explode("*&$",$records);

          foreach($records as $row) {                            
              $dhdh=explode(",",$row);                                      
                    foreach ($dhdh as $tab) {                        
                        echo $tab."\t";
                    }
            echo "\n";
          }     

}

if($_POST['Printtype']=='PDF')
{

require('pdf/fpdf.php');

class PDF extends FPDF
{
// Load data
function LoadData($file)
{
    // Read file lines
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}

// Simple table
function BasicTable($header, $data)
{
    // Header
      $i=1;
    foreach($header as $col)
    {     

        if($i==1){
            $this->Cell(8,7,$col,1);
        }elseif($i==2){

            $this->Cell(25,7,$col,1);
        }elseif($i==3){

            $this->Cell(22,7,$col,1);
        }
        elseif($i==4){

            $this->Cell(20,7,$col,1);
        }
        elseif($i==5){
            $this->Cell(30,7,$col,1);
        }else{

            $this->Cell(22,7,$col,1);
        }
        $i++;
    }
    //$this->Ln();
    // Data
    
    foreach($data as $row)
    {
  $i=1;
        foreach($row as $col){

        if($i==1){
            $this->Cell(8,6,$col,1);
        }elseif($i==2){
            $this->Cell(25,6,$col,1);
        }elseif($i==3){
            $this->Cell(22,6,$col,1);
        }elseif($i==4){
            $this->Cell(20,6,$col,1);
        }
        elseif($i==5){
            $this->Cell(30,6,$col,1);
        }else{
            $this->Cell(22,6,$col,1);
        }
            $i++;
        }
        $this->Ln();
    }
}

}

$pdf = new PDF();
// Column headings


  $records = trim(preg_replace('/\s\s+/', '*&$', $data));
    $records=explode("*&$",$records);
          $i=1;                            
          foreach($records as $row) {
              $dhdh=explode(",",$row);                                      
                    $tststs=array();
                    
                    foreach ($dhdh as $tab) {                        
                      
                               if($i==1)
                               {
                                $headersd[]=$tab;
                               }else{
                                        $tststs[]=$tab;
                               }
                    }
            $dhdhd[]=$tststs;
          $i++;
          }  

$header = $headersd;//array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');

// Data loading
//$data = $pdf->LoadData('pdf/tutorial/countries.txt');
//print_r($data);
$data=$dhdhd;


$pdf->SetFont('Arial','',8);
$pdf->AddPage();
$pdf->BasicTable($header,$data);

//$pdf->AddPage();
//$pdf->ImprovedTable($header,$data);
//$pdf->AddPage();
//$pdf->FancyTable($header,$data);
//$pdf->Output();
$pdf->Output("sample.pdf",'D');



    }
?>

