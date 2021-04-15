<?php
//------Reuable functions------

function executeQuery($sql,$data){
    global $conn;
    $stmt =  $conn->prepare($sql);
    $values=array_values($data);
    $types = str_repeat('s',count($values));
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    return $stmt;
 }

function selectAll($table, $conditions=[]){
    global $conn;
    $sql= "SELECT * FROM $table";
    if(empty($conditions)){
    $stmt= $conn->prepare($sql);
    $stmt->execute();
    $records=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
    }
    else{
        $i=0;
        foreach($conditions as $key=>$value){
            if($i===0){
                $sql=$sql . " WHERE $key=?";
            }else{
                $sql=$sql . " AND $key=?";
            }
            $i++;
        }
        
        $stmt= executeQuery($sql,$conditions);
        $records=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
       
    }
 }

//  ------Signup Funtions------
function emptyInputSignup($name,$email,$username,$pwd,$pwdRepeat){
    $result='unset';
    if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function invalidUid($username){
    $result='unset';
    if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function invalidEmail($email){
    $result='unset';
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function pwdLength($pwd){
    $result='unset';
    $uppercase = preg_match('@[A-Z]@', $pwd);
    $lowercase = preg_match('@[a-z]@', $pwd);
    $number    = preg_match('@[0-9]@', $pwd);
    $specialChars = preg_match('@[^\w]@', $pwd);
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pwd)<8){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function pwdMatch($pwd,$pwdRepeat){
    $result='unset';
    if($pwd !== $pwdRepeat){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function uidExists($conn,$username,$email){
   $sql= "SELECT * FROM users WHERE userUid = ? OR userEmail = ?;";
   $stmt=mysqli_stmt_init($conn);
   if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location:../signup.php?error=stmtfailed");
    exit();
   }
   
    mysqli_stmt_bind_param($stmt,"ss",$username,$email);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    if($row=mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result=false;
        return $result;
    }
    
    mysqli_stmt_close($stmt);
     
}

function createUser($conn,$name,$email,$username,$pwd){
   $sql= "INSERT INTO users (userName, userEmail, userUid, userPwd) VALUES (?, ?, ?, ?);";
   $stmt=mysqli_stmt_init($conn);
   if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location:../signup.php?error=Something went wrong");
    exit();
   }

   $hashedPwd=password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$username,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location:../signup.php?error=none");
    exit();
}

//------Login Functions------

function emptyInputLogin($username,$pwd){
    $result='unset';
    if(empty($username) || empty($pwd)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function loginUser($conn,$username,$pwd){
    $uidExists= uidExists($conn,$username,$username);

    if($uidExists === false){
        header("location:../login.php?error=wronglogin");
        exit();
    }
    
    $pwdHashed = $uidExists["userPwd"];
    $checkPwd=password_verify($pwd,$pwdHashed);

    if($checkPwd === false){
        header("location:../login.php?error=wronglogin");
        exit();
    }
    else if($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["userId"];
        $_SESSION["useruid"] = $uidExists["userUid"];
        $_SESSION["username"]= $uidExists["userName"];
        header("location:../index.php");
        exit();
    }
}