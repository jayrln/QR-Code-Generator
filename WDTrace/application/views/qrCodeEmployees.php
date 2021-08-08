<?php 

$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle($img_url);

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->SetHeaderMargin(30);
// $pdf->SetTopMargin(20);
$pdf->setFooterMargin(20);
$pdf->SetAutoPageBreak(true);
$pdf->SetAuthor('Author');
$pdf->SetDisplayMode('real', 'default');

$pdf->AddPage();

// $html = '
// <div>
//   <img src="./uploads/qr_image/2459479.png">
// </div>
// ';
// $pdf->writeHTML($html, true, false, true, false, '');
        // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)

  $pdf->Image('./images/bgCard1.jpg', 9, 9.5, 90, 53, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
if ($fetch_details->num_rows() > 0)
  {
    foreach ($fetch_details->result() as $row)
      {
        
        $html = '
        <style>

            td {
              // font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; 
              font-size:9px;
            }
            .imglogo {
              width: 60px;
              height: 60px;
            }
            
            img {
              position: absolute;
              left: 0px;
              top: 0px;
              z-index: -1;
            }
            .nameVal {
              font-size:10px; 
              color:#3b3a30;
            }
            .addVal {
              font-size:8px; 
              color:#3b3a30;
            }
            .titleComp {
              font-weight:bold;
              color:#3b3a30; 
            }

        </style>


        <table border="" cellspacing="0" cellpadding="2" style="width:250px;">
            <tr style="text-align:center;">
                <td rowspan="2"><img src="./uploads/qr_image_emp/'.$img_url.'.png"></td>
                <td colspan="2" >
                  LOGO HERE
                </td>
            </tr>
            <tr style="text-align:center;">
                <td colspan="2" class="titleComp">Header title</td>
            </tr>
            <tr>
                <td style="width:50px;">FullName:</td>
                <td colspan="2" rowspan="2" class="nameVal" style="width:200px;"><b>' .  $row->FullName  .'</b></td>

            </tr>
            <tr>
                <td></td>

            </tr>
            <tr>
                <td>Address:</td>
                <td colspan="2" rowspan="2" class="addVal"><b>' .  $row->Address  .'</b></td>
            </tr>
            <tr>
                <td></td>
            </tr>
        </table>
        ';

        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
      }
  }

$pdf->Output('My-File-Name.pdf', 'I');
?>