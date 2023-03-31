<?php

function convertSize($bytes, $precision = 2) {
  // Size array
  $size = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB', 'HB');

  // Factor
  $factor = floor((strlen($bytes) - 1) / 3);
  
  // Formatted output
  return sprintf("%.{$precision}f", $bytes / pow(1024, $factor)) . ' ' . $size[$factor];
}