<?php

function placeHolderImage($width = 500, $height = 500)
{
  $placeHolderImg = "https://www.charliehealth.com/wp-content/uploads/2023/06/charlie-health_find-your-group.png";
  return $placeHolderImg;
}

function abbreviateAfterFirstWord($inputString)
{
  $words = explode(' ', $inputString);

  if (count($words) > 1) {
    $abbreviated = implode(' ', array_map(function ($word) {
      return strlen($word) > 1 ? $word[0] . '.' : $word;
    }, array_slice($words, 1)));

    return $words[0] . ' ' . $abbreviated;
  } else {
    return $inputString;
  }
}
