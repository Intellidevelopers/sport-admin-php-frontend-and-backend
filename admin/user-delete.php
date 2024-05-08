<?php  
require '../config/function.php';

$paramResult = checkParamId('id');
if(is_numeric($paramResult)){
    $userId = validate($paramResult);

    $user = getById('users', $userId);
    if($user){
        $userDeleteRes = deleteQuery('users', $userId);
        if($userDeleteRes){
            redirect('users.php','User Deleted Successfully');
        } else {
            redirect('users.php','Failed to delete user');
        }
    } else {
        redirect('users.php','User not found');
    }
} else {
    redirect('users.php',$paramResult);
}