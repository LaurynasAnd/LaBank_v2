<?php
namespace Control\Controllers;
use Module\App\JsonDb;
use DateTime;

class AccountController{
    private $db;
    private $answers = [];

    public function __construct(){
        $this->db = new JsonDb;
        if(isset($_SESSION['answers'])){
            $this->answers = $_SESSION['answers'];
            unset($_SESSION['answers']);
        }
        if(isset($_SESSION['message'])){
            $this->answers['message'] = $_SESSION['message'];
            unset($_SESSION['message']);
        }
    }
    
    
    public function create(){
        // this function returns view of new account creation
        $iban = (json_decode(file_get_contents(DIR.'/data/iban.json'), 1))['nextIBAN'];
        require DIR . '/views/create.php';
    }
    
    
    
    public function save(){
        //this function saves new account
        $check = 0; //this variable will count how many inputs are valid
        if(0 != count($_POST)){ //patikrinama, ar post nera paliktas tuscias
            //check name
            if(!preg_match_all('/[^\p{L}\p{M}*]+/u', $_POST['name']) && 0 != strlen($_POST['name'])){ // checks if there are only letters and returns 0
                if (strlen($_POST['name'])>3){
                    $check++;
                } else {
                    $this->answers['wrongName'] = 'Vardas turi būti ilgesnis nei 3 simboliai';
                    
                }
            } else {
                $this->answers['wrongName'] = 'Netinkamo formato vardas';
            }
            
            
            //check surname
            if(!preg_match_all('/[^\p{L}\p{M}*]+/u', $_POST['surname']) && 0 != strlen($_POST['surname'])){ // checks if there are only letters and returns 0
                if (strlen($_POST['surname'])>3){
                    $check++;
                } else {
                    $this->answers['wrongSurname'] = 'Pavardė turi būti ilgesnė nei 3 simboliai';
                    
                }
            } else {
                $this->answers['wrongSurname'] = 'Netinkamo formato pavardė';
            }


            //check id Number
            if(!preg_match_all('/[^\d]/', $_POST['idNumber']) && 11 == strlen($_POST['idNumber'])){ //preg_match_all will return 0 if there are only numbers in ID code. id number is made of 11 digits
                //next two variables will check if gender digit and birth digits are valid
                $isGender = false;  
                $isDate = false;
                $gender = intval(substr($_POST['idNumber'],0,1)); //returns int, first digit from ID
                $birthDay = substr($_POST['idNumber'],1,6); //returns unformated date of birth
                if ($gender > 2 && $gender <= 6) { // first digit is for gender and can be 3, 4, 5 or 6
                    $isGender = true;
                }
                //next the first two digits of the year will be determined. It can be done
                //by checking the gender digit. 3-4 are from 1900s 5-6 are from 2000s
                $year = (($gender == 3 || $gender == 4) ? '19' : '20') . substr($birthDay, 0, 2);
                $date = $year . '-' . substr($birthDay, 2, 2) . '-' . substr($birthDay, 4, 2); //the full year is constructed in format YYYY-MM-dd
                //the next function is used to validate the date. it return true if date is valid and false if date is not valid, for example 2020-10-01 is valid and 2020-13-01 is not
                function validateDate($date, $format = 'Y-m-d'){
                    $d = DateTime::createFromFormat($format, $date);
                    // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
                    return $d && $d->format($format) === $date;
                }
                if(validateDate($date)){
                    $isDate = true;
                }
                if($isGender && $isDate){
                    $check++;
                } else {
                    $this->answers['badID'] = 'Neteisingo formato asmens kodas';
                }
        
            } else {
                $this->answers['badID'] = 'Neteisingo formato asmens kodas';
            }
            // check password
            if (strlen($_POST['psw'])>=8){ //password must be at least 8 symbols long
        
                if(md5($_POST['psw']) == md5($_POST['repeatPsw']) && (0 != strlen($_POST['psw']) && 0 != strlen($_POST['repeatPsw']))){ //paswords are not empty and are the same
                    $check++;
                } else {
                    $this->answers['pswMissmatch'] = 'Nesutampa slaptažodžiai';
                }
            } else {
                $this->answers['pswMissmatch'] = 'Slaptažodis turi būti mažiausiai 8 simbolių';
            }
        
            
            if(4 == $check){ //jei praeina visus patikrinimus
                //prideti nauja vartotoja prie sistemos ikeliama funkcija.
                $this->db->create([
                    'surname' => ucfirst($_POST['surname']),
                    'name' => ucfirst($_POST['name']),
                    'idNumber' => $_POST['idNumber'],
                    'psw' => md5($_POST['psw']),
                    'balance' => 0
                ]);
                if($_SESSION['status']){
                    // jei priregino, peradresuoti i pagrindini puslapi
                    $_SESSION['message'] = 'Jūsų registracija sėkminga. Norėdami prisijungti prie elektroninės bankininkystės, įveskite prisijungimo duomenis';
                    unset($_SESSION['status']);
                    header('Location: '.URL); //move one directory up
                    die;
                } else {
                    //jei nepavyko prisiregistruoti, ismesti pranesima, kad tokiu ID jau registruotas zmogus
                    $_SESSION['message'] = 'Vartotojas su tokiu asmens kodu jau registruotas.';
                    unset($_SESSION['status']);
                    header('Location: '.URL.'account/create');
                }
                
            } else {
                //atmesti pildyma, ir parasyti, kas negerai parasyta buvo
                $_SESSION['answers'] = $this->answers;
                header('Location: '.URL.'account/create');
            }
        } else {
            header('Location: '.URL.'account/create');
        }
    }



    public function edit(){
        // this function returns view of editing account information
        _log('GET: ',$_GET);
        _log('POST: ',$_POST);
        require DIR . '/views/edit.php';
    }



    public function update(){
        // this function updates database input
    }



    public function delete(){
        // this function deletes whole account or single account
    }



    public function index(){
        // this function returns index view
        $user = $this->db->show('50001010101');
        require DIR . '/views/user.php';
    }
}