<?php
$dirDropBox    = '../SyncData/WebFile/DropBox';
$dirSendSpace = '../SyncData/WebFile/SendSpace';

$files1 = scandir($dirDropBox);
$files2 = scandir($dirSendSpace);

echo '<pre>';
print_r($files1);
print_r($files2);
	echo '</pre>';




/* Returns an associative array of all files under a directory,
including those inside of sub-directories, using recursion */

function scan($path) {
  $handle = $dir = opendir($path);

  while(false !== ($f = readdir($handle))) 
    if(is_dir($f))
      $files[$f] = scan($path.$f.'/');
    else
      $files[$f] = $f;

  return $files;
}

$original = scan('../SyncData/WebFile/DropBox/');
$thumbs = scan('../SyncData/WebFile/SendSpace/');

$missing['thumbs'] = array_diff($original, $thumbs);
$missing['original'] = array_diff($thumbs, $original);

echo '<pre>';
print_r($missing);
print_r($original);
print_r($thumbs);

echo '</pre>';




?>