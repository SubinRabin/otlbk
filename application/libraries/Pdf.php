<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
require_once APPPATH . 'third_party/tcpdf/tcpdf.php';

ob_start();


    

class Pdf extends TCPDF
{
	function __construct($orientation='P', $unit='mm', $format='A4', $unicode=true, $encoding='UTF-8', $diskcache=false, $pdfa=false, $pdf_type = '')
	{
		parent::__construct($orientation, $unit, $format, $unicode, $encoding, $diskcache, $pdfa);

		$this->pdf_type = $pdf_type;
		$lg = array();
		$lg['a_meta_charset'] = 'UTF-8';

		$this->setLanguageArray($lg);
		$this->_fonts_list = $this->fontlist;

		//do_action('pdf_construct',array('pdf_instance'=>$this,'type'=>$this->pdf_type));
	}


    // function __construct()
    // {
    //     parent::__construct();
    // }
    public function Close() {
		$this->last_page_flag = true;
		parent::Close();
	}

	public function Header() {
		$this->SetFont('helvetica', 'B', 20);
	}

	public function Footer() {
        // Position at 15 mm from bottom
		$this->SetY(-15);

		// $font_name = get_option('pdf_font');
	 //    $font_size = get_option('pdf_font_size');

	    // if ($font_size == '') {
	    //     $font_size = 10;
	    }

}