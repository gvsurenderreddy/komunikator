<?
if (!$id_name) $id_name='id';
foreach ($rows as $row) {
    $updates = array();
    $id = null;
    foreach ($row as $key => $value) {
        $value = $conn->escapeSimple($value);
        if ($key == 'id') $id = $value; else {
            $value = "'$value'";
            $updates[] = "$key = $value";
        }
    }
    if ($id && $updates) {
        $sql=sprintf("UPDATE %s SET %s WHERE %s='%s'", $table_name, implode(', ', $updates), $id_name,$id);
        query($sql);
    }
};

$out = array("success"=>true,"message"=>'saved');
echo (out($out)); 
?>