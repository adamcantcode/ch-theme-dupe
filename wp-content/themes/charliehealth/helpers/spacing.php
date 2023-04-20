<?php
$blockClasses;

$blockPadding = $block['style']['spacing']['padding'];

if(!empty($blockPadding)) {
  $paddingTop = $blockPadding['top'];
  $paddingBottom = $blockPadding['bottom'];
}

if($paddingTop === $paddingBottom) {
  $padding = $paddingTop;
  switch ($padding) {
    case '0':
      $paddingClass = 'py-sp-0 ';
      break;
    case 'var:preset|spacing|xs':
      $paddingClass = 'section-xs ';
      break;
    case 'var:preset|spacing|sm':
      $paddingClass = 'section-sm ';
      break;
    case 'var:preset|spacing|md':
      $paddingClass = 'section ';
      break;
    case 'var:preset|spacing|lg':
      $paddingClass = 'section-lg ';
      break;
    case 'var:preset|spacing|xl':
      $paddingClass = 'section-xl ';
      break;
    default:
      $paddingClass = 'section ';
      break;
  }
}


if (!empty($block['anchor'])) {
  $anchor = 'id="' . $block['anchor'] . '" ';
}

if (!empty($block['backgroundColor'])) {
  $background = 'bg-' . $block['backgroundColor'];
  $blockClasses .= $background . ' ';
}

// TODO rethink alignment in case someone tries to mess with the default of full;
// if (!empty($block['align'])) {
//   switch ($block['align']) {
//     case 'full':
//       $container = 'container ';
//       break;
//     case '';
//       $container = 'container ';
//     default:
//       # code...
//       break;
//   }
//   $blockClasses .= $container;
// }


// Final classes
$blockClasses .= rtrim($paddingClass);
