<?php

class Test {
    public function talk() {
        return "hey there";
    }
}

$hi = Test::talk();
echo $hi;

?>