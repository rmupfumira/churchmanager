<?php

/**
 * Created by JetBrains PhpStorm.
 * User: Russel
 * Date: 2013/07/19
 * Time: 5:57 AM
 * To change this template use File | Settings | File Templates.
 */
class Utilities {

    public function generateMemberId($assemblyname){
        $stamp = date("Ymdhis");
        return $assemblyname."-".$stamp;
    }
}

?>