<?
$arr    = explode("|", $board[bo_category_list]);
$arr1   = explode("|", $board[bo_10]);

echo "function category_data(str, target) { \n";
foreach ($arr as $key => $sca) {
    $cate   = explode("^", $arr1[$key]);
    $i = 1;
    
    echo "if (str == '$sca') { \n";
    echo "discard(document.fwrite.wr_10); \n";
    echo "document.forms[\"fwrite\"].wr_10.options[0] = new Option('�����ϼ���', ''); \n";
    
    foreach ($cate as $value) {
        if (trim($value)) {
            echo "document.forms[\"fwrite\"].wr_10.options[$i] = new Option('$value', '$value'); \n";
            $i++;
        }
    }
    
    echo "} \n\n";
}
echo "}";
?>

// �ɼ��� �ʱ�ȭ ��Ű�� �Լ�
function discard(form)
{
    for ( i = form.length-1 ; i > -1 ; i--)
    {
		form.options[i].value = null;
		form.options[i] = null;
    }
}