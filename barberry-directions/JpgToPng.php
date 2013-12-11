<?php
namespace Barberry\Direction;
use Barberry;
use Barberry\Exception;
use Barberry\Plugin;
use Barberry\ContentType;

class DirectionJpgToPng extends DirectionAbstract {
    protected function init($commandString = null) {
        $this->converter = new Plugin\Imagemagick\Converter;
        $this->converter->configure(ContentType::byExtention('png'), '/home/il/public_html/barberry-service/vendor/barberry/plugin-imagemagick/tmp/');
        $this->command = new Plugin\Imagemagick\Command;
        $this->command->configure($commandString);
        if (!$this->command->conforms($commandString)) {
            throw new Exception\AmbiguousPluginCommand($commandString);
        }
    }
}