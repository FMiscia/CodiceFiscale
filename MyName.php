<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyName
 *
 * @author francesco
 */
abstract class MyName {
    //put your code here
    protected static $vocali = array("a", "e", "i", "o", "u");
    abstract protected  function keepConsonant();
    abstract protected  function completeWithX();
    abstract protected  function giveMeTheCode();
    abstract public  function getName();
}
?>
