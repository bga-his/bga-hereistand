<?php
namespace HIS\Exceptions;

class OttomanReligionException extends \Exception {

    public function __toString() {
        return "Ottoman spaces are not valid targets for religious actions.";
    }
}

?>