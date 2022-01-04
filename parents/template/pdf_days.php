<?php
function  fetch_data_days()
{
  require 'config.php';
  $data = "";
 $v_days = mysqli_query($con, "SELECT * FROM `under_five_days` ");
      if (mysqli_num_rows($v_days)==null) {
        $data .="<tr class='text-center'> <td>No record for immunization to show</td> </tr>";
      }else{
        while ($row_days = mysqli_fetch_array($v_days)) {
         $data .='<tr style="padding-top: 20px">
                  <td>'.$row_days["day"].'</td>
                  <td><strong>'.$row_days["from_time"].'</strong></td>
                  <td><strong>'.$row_days["to_time"].'</strong></td>
                </tr>';
        }
      }

      return $data;
}


?>
<?php
session_start();

if (isset($_GET['create_pdf_days'])) {

  $name = "UNDER FIVE VISITING DAYS";
  $num = $_SESSION['child_number'];

require_once("./tcpdf/tcpdf.php");

  $obj_pdf = new TCPDF('P',PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);
  $obj_pdf->SetCreator(PDF_CREATOR);
  $obj_pdf->SetTitle("EXPORT HTML TABLE DATA to PDF using TCPDF in PHP");
  $obj_pdf->SetHeaderData('','',PDF_HEADER_TITLE,PDF_HEADER_STRING);
  $obj_pdf->SetHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
  $obj_pdf->SetFooterFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
  $obj_pdf->SetDefaultMonospacedFont('helvetica');
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT,'0.5',PDF_MARGIN_RIGHT);
  $obj_pdf->SetPrintHeader(false);
  $obj_pdf->SetPrintFooter(false);
  $obj_pdf->SetAutoPageBreak(TRUE,10);
  $obj_pdf->SetFont('helvetica','',10);
  $obj_pdf->AddPage();

  $content = '';

  $content .='<h3 align="center" class="text-white mt-5">'.$name.'</h3>

    <div class="col-sm-12">
      <div class="card shadow">
        <div class="card-header bg-transparent border-bottom">
          <h6><i class="fa fa-calendar"></i>Child Identinty Number [ '.$num.' ]</h6>
        </div><!-- card-header -->
        <div class="card-body">
     <div class="table-responsive bg-primary">
      <table border="1" cellspacing="0" cellpadding="1">
        <thead>
          <tr>
             <th>Date</th>
            <th>Time From</th>
            <th>Time To</th>
          </tr>
        </thead>
        <tbody>
  ';

  $content .= fetch_data_days();
    
 /* $content .= fetch_data();*/

  $content .='
  </tbody>
  </table>';

  $obj_pdf->writeHTML($content);

  $obj_pdf->Output($name.".pdf","I");

}
?>