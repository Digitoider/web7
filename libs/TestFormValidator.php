<?php

/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 09.05.2017
 * Time: 13:55
 */
require_once 'FormValidator.php';
class TestFormValidator extends  FormValidator
{
    public function __construct()
    {
    }
    public function isLessThan30Words($data){
        if(!isset($data)){
            return "Parameter 'data' doesn't exist";
        }

        if (empty($data)) {
            return "Field is empty";
        }

        $words = explode(" ", $data);
        if(count($words) > 30){
            return "Parameter 'data' has more than 30 words";
        }

        return "noError";
    }
    public function validate($postArray){

        foreach($postArray as $fieldName => $value){

            foreach($this->rules[$fieldName] as $validatorName){

                switch($validatorName){
                    case "isEmpty": $error = $this->isEmpty($value); break;
                    case "isInteger": $error = $this->isInteger($value); break;
                    case "isLess": $error = $this->isLess($value['data'], $value['value']); break;
                    case "isGreater": $error = $this->isGreater($value['data'], $value['value']); break;
                    case "isLessThan30Words": $error = $this->isLessThan30Words($value); break;
                    default: $error = "No validator defined for field '" . $fieldName;
                }

                if(strcmp($error, "noError") != 0){
                    $this->errors[$fieldName][] = $error;
                }
            }
        }
    }

    public function checkAnswers($question1, $question2)
    {
        $firstAnswer = $secondAnswer = false;
        if(strcmp($question1, "option1") == 0){
            $firstAnswer = true;
        }
        if(strcmp($question2, "0") == 0){
            $secondAnswer = true;
        }
        return $firstAnswer && $secondAnswer;
    }
}