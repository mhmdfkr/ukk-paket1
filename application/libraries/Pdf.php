<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pdf
{
    protected $ci;

    public function __construct()
    {
        $this->$ci = &get_instance();
    }

    public function generate($view, $data = [])
    {
        $html = $this->ci->load->view($view, $data, true);
    }
}
