<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function no_html_validation($str)
{
  return $str === strip_tags($str);
}
