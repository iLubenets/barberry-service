<?php
namespace Barberry\Monitor;
use Barberry\Plugin\Imagemagick\Monitor;

class ImagemagickMonitor extends Monitor {
    public function __construct() {
        
        $this->configure('/home/il/public_html/barberry-service/vendor/barberry/plugin-imagemagick/tmp/');
    }
}