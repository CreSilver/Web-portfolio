<?php
//Password checker
function PasswordChecker($password){

    if($password != ""){//IF START
        if(strlen($password) < 8){
            return "Password must be at least 8 charakters <br>";
        } else 
            if(is_numeric($password)){
                return "Password must contain at least one letter <br>";
            } else
                if (!preg_match('#[0-9]#', $password)){
                    return "Password must contain at least on number <br>";
                } else {return "";};
    }// IF END 

}// FUNCTION END



//Password checker - strick version
function PasswordCheckerSTRICK($password){

    $symbols = '/[!@#$%^&*(),.?":{}|<>]/';

    if($password != ""){//IF START
        if(strlen($password) < 8){
            return "Password must be at least 8 charakters <br>";
        } else 
            if(is_numeric($password)){
                return "Password must contain at least one letter <br>";
            } else
                if (!preg_match('#[0-9]#', $password)){
                    return "Password must contain at least one number <br>";
                } else 
                    if(!preg_match('/[A-Z]/', $password)){
                        return "Password must contain at least one upper letter <br>";
                    } else
                        if(!preg_match('/[a-z]/', $password)){
                            return "Password must contain at least one small letter <br>";
                        } else
                            if(!preg_match($symbols, $password)){
                                return "Password must contain at least one symbol: <br>".$symbols;
                            } else {return "";}

    }// IF END 

}// FUNCTION END



// Correct written email
function ValidateEmail($email){

    $symbols = '/[!#$%^&*(),?":{}|<>]/';

    if ($email != ""){//If start
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return "Your written email addres is not valid <br>";
        } else {
            if(preg_match($symbols, $email)){
                return "Your written email addres is not valid <br>";
            } else{
                return "";
            }
        }
    }// IF END 
    
}// FUNCTION END



// Valid username
function ValidateUsername($username){

    if($username != ""){//If start
        if(strlen($username) < 4){
            return "Username must be at least 4 charakters <br>";
        }else{
            if (is_numeric($username)){
                return "Username must contain at least one letter <br>";
            }else{return "";}
        }
    }// IF END 

}// FUNCTION END
?>