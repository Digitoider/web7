<?php

/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 14.05.2017
 * Time: 0:20
 */
class GuestBook_model
{
    public function save($fName, $sName, $mName, $email, $msg){
        $file = fopen("userdata/messages.inc", "a+");
        if(!$file){
            return false;
        }

        $date = date("d:m:Y");
        $fio = join(" ", array($sName, $fName, $mName,));
        $record = goin(";",array($date, $fio, $email, $msg));

        $done = false;
        if(fwrite($file, $record+"\r\n")){
            $done = true;
        }

        fclose($file);

        return $done;
    }
}