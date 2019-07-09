<?php

require 'ocr.php';

$ocr = new OCR('./tests/1.png', false);

$ocr->setDebug(true);

echo $ocr->run();