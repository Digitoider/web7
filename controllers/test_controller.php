<?php
require_once 'models/TestTable.php';
class Test_controller extends Controller
{
    private $fio = '';
    private $group = '';
    private $question1 = '';
    private $question2 = '';
    private $question3 = '';
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->view->render('test');
    }

    public function checkForm()
    {
        if(isset($_POST['FIO'])){
            $this->fio = $_POST['FIO'];
        }
        if(isset($_POST['group'])){
            $this->group = $_POST['group'];
        }
        if(isset($_POST['question1'])){
            $this->question1 = $_POST['question1'];
        }
        if(isset($_POST['question2'])){
            $this->question2 = $_POST['question2'];
        }
        if(isset($_POST['question3'])){
            $this->question3 = $_POST['question3'];
        }

        require_once 'libs/TestFormValidator.php';
        $testFormValidator = new TestFormValidator();
        $testFormValidator->setRule("fio", "isEmpty");
        $testFormValidator->setRule("group", "isEmpty");
        $testFormValidator->setRule("question1", "isEmpty");
        $testFormValidator->setRule("question2", "isEmpty");
        $testFormValidator->setRule("question3", "isEmpty");
        $testFormValidator->setRule("question3", "isLessThan30Words");

        $testFormValidator->validate(array('fio' => $this->fio,
                                            'group' => $this->group,
                                            'question1' => $this->question1,
                                            'question2' => $this->question2,
                                            'question3' => $this->question3));
        $errors = $testFormValidator->getErrors();

        return $errors;
    }

    public function save(){
        require_once 'libs/TestFormValidator.php';
        $testFormValidator = new TestFormValidator();
        $correctness = $testFormValidator->checkAnswers($this->question1, $this->question2);
        require_once 'libs/ActiveRecord.php';
        require_once 'models/TestTable.php';

        $record = new TestTable();
        $record->fio = $this->fio;
        $record->usergroup = $this->group;
        $record->answers = join("%qsep%", array($this->question1, $this->question2, $this->question3));
        $record->correctness = $correctness;
        $record->date = date("Y-m-d");

        $record->save();
    }

    public function getTestInfo()
    {
        return TestTable::getAll();
    }
}