<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class BaseValidation
{
  protected function required($field, $label)
  {
    return [
      'field' => $field,
      'label' => $label,
      'rules' => 'required|trim|no_html',
      'errors' => [
        'required' => 'Field %s wajib diisi.'
      ]
    ];
  }

  protected function email($field, $label)
  {
    return [
      'field' => $field,
      'label' => $label,
      'rules' => 'required|valid_email|trim|no_html',
      'errors' => [
        'required' => 'Field %s wajib diisi.',
        'valid_email' => '%s tidak valid.'
      ]
    ];
  }
}
