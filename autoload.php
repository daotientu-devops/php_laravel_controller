<?php
/**
 * Created by PhpStorm.
 * User: daotientu
 * Date: 12/31/2016
 * Time: 12:24 PM
 */
function eSMAutoload($class)
{
    include __DIR__.'/libs/Utils/'.$class.'.php';
}
spl_autoload_register('eSMAutoload');