<?php  
require '../config/function.php';

$paramResult = checkParamId('id');
if(is_numeric($paramResult)){
    $userId = validate($paramResult);

    $user = getById('tournament', $userId);
    if($user){
        $userDeleteRes = deleteQuery('tournament', $userId);
        if($userDeleteRes){
            redirect('tournament.php','Tournament Deleted Successfully');
        } else {
            redirect('tournament.php','Failed to delete user');
        }
    } else {
        redirect('tournament.php','User not found');
    }
} else {
    redirect('tournament.php',$paramResult);
}