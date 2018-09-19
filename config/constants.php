<?php

$current_year = date('Y');
$next_year = $current_year+1;
$previous_year = $current_year-1;
$current_month = date('n');
$current_session = '';

if ($current_month > 9){
    $current_session = $current_year.'/'.$next_year;
}
else{
    $current_session = $previous_year.'/'.$current_year;
}

return [

    'school_name'=>'The School Name',
    'current_session'=> $current_session
];