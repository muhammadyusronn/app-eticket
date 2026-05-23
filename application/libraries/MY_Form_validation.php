<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation
{
  public function no_html($str)
  {
    if ($str !== strip_tags($str)) {

      $this->set_message(
        'no_html',
        'Field {field} tidak boleh mengandung HTML.'
      );

      return false;
    }

    return true;
  }
}
