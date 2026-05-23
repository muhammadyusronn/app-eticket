<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('elapsed_time')) {

  function elapsed_time($end, $start)
  {

    $seconds = strtotime($end) - strtotime($start);

    if ($seconds < 0) {
      return '0s';
    }

    $days = floor($seconds / 86400);
    $hours = floor(($seconds % 86400) / 3600);
    $minutes = floor(($seconds % 3600) / 60);
    $secs = $seconds % 60;

    $result = [];

    if ($days > 0) {
      $result[] = $days . 'hari';
    }

    if ($hours > 0) {
      $result[] = $hours . 'jam';
    }

    if ($minutes > 0) {
      $result[] = $minutes . 'menit';
    }

    if ($secs > 0 || empty($result)) {
      $result[] = $secs . 'detik';
    }

    return implode(' ', $result);
  }
}

if (!function_exists('limit_text')) {

  function limit_text($text, $limit = 50, $suffix = '...')
  {
    $text = trim(strip_tags($text));

    if (mb_strlen($text) <= $limit) {
      return $text;
    }

    return mb_substr($text, 0, $limit) . $suffix;
  }
}
