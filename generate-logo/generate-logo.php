<?php

// Set the font to use
$font = 'fonts/Pacifico-Regular.ttf';

// Set the text to display as the logo
$text = 'Pacifico';

// Set the font size
$fontSize = 36;

// Set the font color
$fontColor = '#000000';

// Set the image width and height
$imageWidth = 200;
$imageHeight = 100;

// Create the image
$image = imagecreatetruecolor($imageWidth, $imageHeight);

// Make the image transparent
imagealphablending($image, false);
imagesavealpha($image, true);
$transparent = imagecolorallocatealpha($image, 0, 0, 0, 127);
imagefilledrectangle($image, 0, 0, $imageWidth, $imageHeight, $transparent);

// Allocate the font color
$fontColor = imagecolorallocate($image, hexdec(substr($fontColor, 1, 2)), hexdec(substr($fontColor, 3, 2)), hexdec(substr($fontColor, 5, 2)));

// Get the bounding box of the text
$textBox = imagettfbbox($fontSize, 0, $font, $text);

// Calculate x and y coordinates to center the text
$x = ceil(($imageWidth - $textBox[2]) / 2);
$y = ceil(($imageHeight - $textBox[5]) / 2);

// Add the text to the image
imagettftext($image, $fontSize, 0, $x, $y, $fontColor, $font, $text);

// Output the image as a PNG
header('Content-Type: image/png');
imagepng($image);

// Free up memory
imagedestroy($image);
