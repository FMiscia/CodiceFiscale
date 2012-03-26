<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RetrieveData
 *
 * @author francesco
 */
interface RetrieveData {
    //put your code here
    public function connectToSource();
    public function getFromSource($what=NULL);

}
?>
