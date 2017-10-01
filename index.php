<?php
$json = '[{"parent":null,"vch_name":"25953","sname":"\u041a\u043e\u043c\u0430\u043d\u0434\u043e\u0432\u0430\u043d\u0438\u0435 \u0412\u0414\u0412"},{"parent":"25953","vch_name":"36477","sname":"728 \u0441\u0444\u043f\u0441"},{"parent":"25953","vch_name":"65391","sname":"215 \u043e\u0440\u0440"},{"parent":"25953","vch_name":"65392","sname":"969 \u043e\u0440\u0434\u043e"},{"parent":"25953","vch_name":"65385","sname":"1683 \u043e\u0431\u043c\u043e"},{"parent":"25953","vch_name":"65389","sname":"15 \u043e\u0440\u0432\u0431"},{"parent":"25953","vch_name":"65379","sname":"661 \u043e\u0438\u0441\u0431"},{"parent":"25953","vch_name":"65381","sname":"674 \u043e\u0431\u0441"},{"parent":"25953","vch_name":"65390","sname":"36 \u043e\u043c\u043e"},{"parent":"25953","vch_name":"68226","sname":"243 \u043e\u0432\u0442\u0430\u044d"},{"parent":"25953","vch_name":"65376","sname":"5 \u0437\u0440\u043f"},{"parent":"25953","vch_name":"62297","sname":"1065 \u0430\u043f"},{"parent":"25953","vch_name":"62295","sname":"217 \u043f\u0434\u043f"},{"parent":"25953","vch_name":"71211","sname":"331 \u043f\u0434\u043f"},{"parent":"25953","vch_name":"11111","sname":"qqqqq"},{"parent":"11111","vch_name":"22222","sname":"eeeee"},{"parent":"11111","vch_name":"33333","sname":"rrrrrr"},{"parent":"11111","vch_name":"45345","sname":"dfghdfgh"},{"parent":"11111","vch_name":"35464","sname":"terhedrfgh"},{"parent":"11111","vch_name":"53456","sname":"dfghdfgh"},{"parent":"11111","vch_name":"34545","sname":"gdfghdfg"},{"parent":"11111","vch_name":"32222","sname":"eeeee"},{"parent":"11111","vch_name":"43333","sname":"rrrrrr"},{"parent":"11111","vch_name":"55345","sname":"dfghdfgh"},{"parent":"11111","vch_name":"45464","sname":"terhedrfgh"},{"parent":"11111","vch_name":"63456","sname":"dfghdfgh"},{"parent":"11111","vch_name":"44545","sname":"gdfghdfg"},{"parent":"25953","vch_name":"12345","sname":"dfasgfsdfgh"},{"parent":"12345","vch_name":"46477","sname":"728 \u0441\u0444\u043f\u0441"},{"parent":"12345","vch_name":"75391","sname":"215 \u043e\u0440\u0440"},{"parent":"12345","vch_name":"75392","sname":"969 \u043e\u0440\u0434\u043e"},{"parent":"12345","vch_name":"75385","sname":"1683 \u043e\u0431\u043c\u043e"},{"parent":"12345","vch_name":"75389","sname":"15 \u043e\u0440\u0432\u0431"},{"parent":"12345","vch_name":"75379","sname":"661 \u043e\u0438\u0441\u0431"},{"parent":"12345","vch_name":"75381","sname":"674 \u043e\u0431\u0441"},{"parent":"12345","vch_name":"75390","sname":"36 \u043e\u043c\u043e"},{"parent":"12345","vch_name":"78226","sname":"243 \u043e\u0432\u0442\u0430\u044d"},{"parent":"12345","vch_name":"75376","sname":"5 \u0437\u0440\u043f"},{"parent":"12345","vch_name":"72297","sname":"1065 \u0430\u043f"},{"parent":"12345","vch_name":"72295","sname":"217 \u043f\u0434\u043f"},{"parent":"12345","vch_name":"81211","sname":"331 \u043f\u0434\u043f"},{"parent":"12345","vch_name":"21111","sname":"qqqqq"}]';

$arr = json_decode($json, true);

function parent_id(&$children,$item){
    foreach ($children as $key => $value) {
        if ($item['parent'] == $value['vch_name']) {
            $children[$key]['children'][] = $item;
            break;
        } else {
            parent_id($children[$key]['children'],$item);
        }
    }
}
$array = [];
foreach ($arr as $key => $item) {
    $item['children'] = [];
    if ($item['parent'] == null) {
        $ch = &$array;
        $ch[] = $item;
    } else {
        parent_id($ch, $item);

    }
}

print_r($array);
