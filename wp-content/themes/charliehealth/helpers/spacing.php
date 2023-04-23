<?php
$blockClasses = '';
$paddingClass = '';
$anchor = '';
$paddingTop = '';
$paddingBottom = '';

// TODO find a different way to initialize this class
$temp = 'container-md';

if (!empty($block['style']['spacing'])) {
  $blockPadding = $block['style']['spacing']['padding'];
}

if (!empty($blockPadding)) {
  if (!empty($blockPadding['top'])) {
    $paddingTop = $blockPadding['top'];
  }
  if (!empty($blockPadding['bottom'])) {
    $paddingBottom = $blockPadding['bottom'];
  }
  if ($paddingTop === $paddingBottom) {
    $padding = $paddingTop;
    switch ($padding) {
      case '':
        $paddingClass = 'section-horizontal ';
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
  } else {
    switch ($paddingTop) {
      case '':
        $paddingTop = 'pt-sp-0 ';
        break;
      case 'var:preset|spacing|xs':
        $paddingTop = 'section-xs-top ';
        break;
      case 'var:preset|spacing|sm':
        $paddingTop = 'section-sm-top ';
        break;
      case 'var:preset|spacing|md':
        $paddingTop = 'section-top ';
        break;
      case 'var:preset|spacing|lg':
        $paddingTop = 'section-lg-top ';
        break;
      case 'var:preset|spacing|xl':
        $paddingTop = 'section-xl-top ';
        break;
      default:
        $paddingTop = 'section-top ';
        break;
    }
    switch ($paddingBottom) {
      case '':
        $paddingBottom = 'pb-sp-0 ';
        break;
      case 'var:preset|spacing|xs':
        $paddingBottom = 'section-xs-bottom ';
        break;
      case 'var:preset|spacing|sm':
        $paddingBottom = 'section-sm-bottom ';
        break;
      case 'var:preset|spacing|md':
        $paddingBottom = 'section-bottom ';
        break;
      case 'var:preset|spacing|lg':
        $paddingBottom = 'section-lg-bottom ';
        break;
      case 'var:preset|spacing|xl':
        $paddingBottom = 'section-xl-bottom ';
        break;
      default:
        $paddingBottom = 'section-bottom ';
        break;
    }
    $paddingClass = $paddingTop . $paddingBottom;
  }
} else {
  $paddingClass = 'section';
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
