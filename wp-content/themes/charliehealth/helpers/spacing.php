<?php

$padding = get_field('padding');
// $margin = get_field('margin');

switch ($padding) {
  case '0':
    $paddingClass = 'py-sp-0';
    break;
  case '1':
    $paddingClass = 'section-xs';
    break;
  case '2':
    $paddingClass = 'section-sm';
    break;
  case '3':
    $paddingClass = 'section';
    break;
  case '4':
    $paddingClass = 'section-lg';
    break;
  case '5':
    $paddingClass = 'section-xl';
    break;
  
  default:
    $paddingClass = 'section';
    break;
}