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

$folder1 = scan('../SyncData/WebFile/DropBox/');
$folder2 = scan('../SyncData/WebFile/SendSpace/');

$missing['folder2'] = array_diff($folder1, $folder2);
$missing['folder1'] = array_diff($folder2, $folder1);

echo '<pre>';
print_r($missing);
print_r($folder1);
print_r($folder2);

echo '</pre>';




?>
