<?php



function DrawDropDownMenu($TableName,$IdField,$TextField,$FirstOption){
    $ci =& get_instance();
    $ci->db->select($IdField.",".$TextField);
    $ci->db->from($TableName);

    $results = $ci->db->get()->result_array();
    if($FirstOption) {
        $option = "<option>" . $FirstOption . "</option>";
    }else{
        $option="";
    }
    foreach($results as $value){
        $option.="<option value='".$value[$IdField]."'>".$value[$TextField]."</option>";

    }
    return $option;


}