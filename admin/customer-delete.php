<?php  
require '../config/function.php';

$paramResult = checkParamId('id');
if(is_numeric($paramResult)){
    $userId = validate($paramResult);

    $user = getById('customers', $userId);
    if($user){
        $userDeleteRes = deleteQuery('customers', $userId);
        if($userDeleteRes){
            redirect('customers.php','Customer Deleted Successfully');
        } else {
            redirect('customers.php','Failed to delete customer');
        }
    } else {
        redirect('customers.php','User not found');
    }
} else {
    redirect('customers.php',$paramResult);
}