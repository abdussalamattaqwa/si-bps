<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once('assets/dompdf/autoload.inc.php');

use Dompdf\Dompdf;

class Mypdf
{
    protected $ci;
    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function generate($view, $data = array(), $filename = 'laporan', $paper = 'A4', $orientation = 'portrait')
    {
        // echo 'ok';
        $dompdf = new Dompdf();
        $html = $this->ci->load->view($view, $data, TRUE);
        // $html = '<h1>salam</h1>';
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($paper, $orientation);

        // Render the HTML as PDF
        $dompdf->render();
        $dompdf->stream($filename . ".pdf", array("Attachment" => TRUE));
    }
}
