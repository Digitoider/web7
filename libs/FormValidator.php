<?php

/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 08.05.2017
 * Time: 14:31
 */
class FormValidator
{
    protected $rules;
    protected $errors;

    public function __construct()
    {
    }

    public function isEmpty($data)
    {
        $data = trim($data);
        if(!isset($data)){
            return "Parameter 'data' doesn't exist";
        }

        if ($data == '') {
            return "Field is empty";
        }

        return "noError";
    }

    public function isInteger($data)
    {
        if(!isset($data)){
            return "Parameter 'data' doesn't exist";
        }

        if (preg_match('/^\d+$/', $data)) {
            return "noError";
        }

        return "Field is not an Integer";
    }

    public function isImage($fileType){
        if($fileType == "image/jpeg"){
            return "noError";
        }

        return "File type isn't correct. Try to load an image";
    }

    public function isLess($data, $value)
    {

        if ($this->isInteger($data) && $this->isInteger($value)) {

            if ((int)$data < (int)$value) {
                return "noError";
            }

        }

        return "'" . $data . "' is not less than '" . $value ."'";
    }

    public function isGreater($data, $value)
    {

        if ($this->isInteger($data) && $this->isInteger($value)) {

            if ((int)$data > (int)$value) {
                return "noError";
            }
        }

        return "'" . $data . "' is not greater than '" . $value ."'";
    }

    public function setRule($fieldName, $validatorName)
    {
        $this->rules[$fieldName][] = $validatorName;
    }

    public function validate($postArray)
    {
        foreach($postArray as $fieldName => $value){
            //echo '<p>' . $fieldName . ': ' . $value . '</p>';
            foreach($this->rules[$fieldName] as $validatorName){

                switch($validatorName){
                    case "isEmpty": $error = $this->isEmpty($value); break;
                    case "isInteger": $error = $this->isInteger($value); break;
                    case "isLess": $error = $this->isLess($value['data'], $value['value']); break;
                    case "isGreater": $error = $this->isGreater($value['data'], $value['value']); break;
                    case "isImage": $error = $this->isImage($value); break;
                    default: $error = "No validator defined for field '" . $fieldName;
                }

                if(strcmp($error, "noError") != 0){
                    //echo "<p>$fieldName: $value; error: $error</p>";
                    //$this->errors[] = $error;
                    $this->errors[$fieldName][] = $error;
                }
            }
        }
    }
    public function getErrors(){
        return $this->errors;
    }
}