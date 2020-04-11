<?php /* 60 Lines */

// SETTINGS
$cssClassOrTagName = '.icon.';
$cssClassOrTagEnd  = '';

// MAIN
$css = '/*

CSS Leungwensen Icons
=====================

> v1.0.0 (2020-04-11)

__Download [Leungwensen Icons](https://leungwensen.github.io/svg-icon/) 
and run `icon.php` on e.g. localhost. 
It will read SVG icons from the folder `leungwensen` and it\'s subfolder and build css from it.
Now you can use the `leungwensen-SUBFOLDER.css` without the SVG Icons!__

**HINT:** SubFolders `flag`, `game` and `logos` don\'t work!

License
-------

Licensed under the MIT License.

The icons that are used in this code are from leungwensen.github.io/svg-icon/

They are also licensed under the MIT License.

© 2020 [phpSoftware](https://github.com/phpSoftware/CSS-Leungwensen-Icons)

*/
'.PHP_EOL.rtrim($cssClassOrTagName,'. [').' {
  display: inline-block; height: 24px; width: 24px; background-size: contain;'.PHP_EOL.'}'.PHP_EOL;
$path = array('ant','awesome','bootstrap','dev','elusive','entypo','evil','flat','foundation','geom','icomoon','ionic','maki','map','material','metro','mfglabs','oct','open','payment-web','payment','simple','subway','typcn','weather','windows','zero','zocial'
);
foreach ($path as $number => $folder) {
  $html = '';
  $counter = 0;
  foreach (glob("leungwensen/$folder/*.svg") as $file) {
    ++$counter;
    $svg = file_get_contents($file);
    $svg = str_replace ("\n", '', rtrim($svg));
    $svg = str_replace (' />', '/>', $svg);
    $svg = str_replace(array('<','"','>'), array('%3C',"'",'%3E'), $svg);
    $name = str_replace(array("leungwensen/$folder/",'.svg'), array('',''), $file);
    $css .= PHP_EOL.$cssClassOrTagName.$name.$cssClassOrTagEnd.' {
    background-image: url("data:image/svg+xml,'.$svg.'");'.PHP_EOL.'}'.PHP_EOL;
    $html .= "<i class='icon {$name}'></i>";
  }
  file_put_contents('leungwensen-'.$folder.'.css', $css);
  $header = '<!DOCTYPE HTML><html><head><meta charset="UTF-8"><title>Leungwensen Icons CSS Test</title><link href="leungwensen-'.
            $folder.'.css" rel="stylesheet"></head><body><tt><h1>'.$counter.' Leungwensen "'.$folder.'" Icons CSS Test</h1><b>';
  file_put_contents('test-'.$folder.'.htm', $header.$html);
  echo $counter.' Leungwensen Icons CSS is ready, '.'<a target="'.$folder.
       '" style="color:firebrick" href="test-'.$folder.'.htm">test '.$folder.'</a>!<br>';
  $counter = 0;
}
