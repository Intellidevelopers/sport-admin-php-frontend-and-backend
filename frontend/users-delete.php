<?php  
require '../config/function.php';

$paramResult = checkParamId('id');
if(is_numeric($paramResult)){
    $userId = validate($paramResult);

    $user = getById('users', $userId);
    if($user){
        $userDeleteRes = deleteQuery('users', $userId);
        if($userDeleteRes){
            redirect('index.php','User Deleted Successfully');
        } else {
            redirect('index.php','Failed to delete user');
        }
    } else {
        redirect('index.php','User not found');
    }
} else {
    redirect('index.php',$paramResult);
}