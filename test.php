<?php

/**
 * Class Test
 *
 *
 *
 */
class Test
{
    /**
     *
     *
     * * @param int $a
     *
     */
    public function run($a = 0)
    {
        print 'a';
    }
}

if ($a == 1) {
    return;
}

$obj = new Test();
$obj->run();
