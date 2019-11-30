<?php
include('../TCPDF-master/tcpdf.php');
require_once('tcpdf_include.php');

// function orderReport()
// {

function genInvoice($total, $nor_cart, $results_cart, $order_id)
{
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
    $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

    // set header and footer fonts
    $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

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

    if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
        require_once(dirname(__FILE__) . '/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

    // ---------------------------------------------------------

    $pdf->setFontSubsetting(true);
    $pdf->SetFont('dejavusans', '', 10, '', true);

    // Add a page
    // This method has several options, check the source code documentation for more information.
    // $pdf->AddPage();

    // set text shadow effect
    $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

    // Set some content to print


    $content = Invoice($total, $nor_cart, $results_cart, $order_id);
    $pdf->AddPage();
    $pdf->writeHTML($content);
    ob_clean();

    $pdf->Output('Invoice.pdf', 'I');
}


function Invoice($total, $nor_cart, $results_cart, $order_id)
{
    $date  = date("Y-m-d");
    $output = '

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Invoice</title>
        <style>
            @media print {
                @page{
                    size: A4;
                }
            }
            ul{
                padding: 0;
                list-style: none;
                border-bottom: 1px solid silver;
            }
            body{
                font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
                margin: 0;
            }
            .container{
                padding: 20px 40px;
            }
            .inv-header{
                display: flex;
                justify-content: space-between;
                margin-bottom: 20px;
            }
            .inv-header :nth-child(2){
                flex-basis: 30%;
            }
            .inv-title{
                padding: 10px;
                border: 1px solid silver;
                text-align: center;
                margin-bottom: 20px;
            }
            .no-margin{
                margin: 0;
            }
            .inv-logo{
                width: 150px;
            }
            .inv-header h2{
                font-size: 20px;
                margin: 1rem 0 0 0;
            }
            .inv-header ul li{
                font-size: 15px;
                padding: 3px 0;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="inv-title">
                <h1 class="no-margin">Order #' . $order_id . '</h1>
            </div>
            <div class="inv-header">
                <div>
                    <table>
                        <tr>
                            <th>Issue Date</th>
                            <td>' . $date . '</td>
                        </tr> 
                    </table>
                </div>
            </div>
            <table borader="1">    
            <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            </tr><br>';

    for ($x = 0; $x <= $nor_cart; $x++) {
        $rec = $results_cart->fetch_assoc();
        $product_id = $rec['prod_name'];
        $qty = $rec['qty'];
        $price = $rec['price'];
        $output .= '
    <tr>
        <td>' . $product_id . '</td>
        <td>' . $qty . '</td>
        <td>' . $price . '</td>
    </tr>
        ';
    }

    $output .= '
    <tr>
                        <th>Total</th>
                        <td></td>
                        <td>' . $total . '</td>
                        </tr>
                   </tbody>
                </table>
            </div>
        </div>
    </body>
    </html>';

    return $output;
}
