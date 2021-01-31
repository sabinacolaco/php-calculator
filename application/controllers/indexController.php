<?php
class indexController extends Controller {    

    protected function init(){    
        $this->db = new MySqlDataAdapter($this->cfg['db']['hostname'], $this->cfg['db']['username'], 
        $this->cfg['db']['password'], $this->cfg['db']['database']);
    }
	
	public function index(){
        return $this->view();
	}
    
    public function getresult() {
        $num1     = $_POST['num1'];
        $num2     = $_POST['num2'];
        $operator = $_POST['operator'];
        $error    = "";
        if (($num1 !== '') && ($num2 !== '') && !empty($operator)) {
            if (is_numeric($num1) && is_numeric($num2)) {
                switch($operator)
                {
                    case '+':
                    $value = $num1 + $num2;
                    break;
                    
                    case '-':
                    $value = $num1 - $num2;
                    break;
                    
                    case '*':
                    $value = $num1 * $num2;
                    break;
                    
                    case '/':
                    $value = ($num2 != 0) ? ($num1 / $num2) : 'Cannot Divide';
                    break;
                    
                    default:
                    $value = "Sorry No command found";
                }
                if($value != 'Cannot Divide') {
                    $id = $this->_model->create($num1, $num2, $operator);
                    echo $value; 
                } else {
                    echo "<span style='color:red'>Cannot divide by 0</span>"; 
                }
            } else {
                $error = "<span style='color:red'>Please enter only numberic values</span>";
                echo $error;
            }
        } else {
            $error = "<span style='color:red'>Please enter all the required data</span>";
            echo $error;
        }
    }
    
    public function history() {
        $data = $this->_model->read();
		$this->view->set('records',$data);
		return $this->view();
    }	
}