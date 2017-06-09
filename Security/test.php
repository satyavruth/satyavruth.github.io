<?php
echo "<pre>";
if(isset($_POST['numbers']) && isset($_POST['unchecked']))
{
  $checked_items = $_POST['numbers'];
  $unchecked_items = array_diff($_POST['unchecked'],$_POST['numbers']);
  echo 'Checked Item<br/>';
  print_r($checked_items);
  echo '<br/><br/>Unchecked Items<br/>';print_r($unchecked_items);
}
?>

<form name='frmname' action='' method='post'>
<input type='radio' name='numbers[]' value='one'/>One
<input type='radio' name='numbers[]' value='two' />Two
<input type='radio' name='numbers[]' value='three' />Three

<input type='hidden' name='unchecked[]' value='one' />
<input type='hidden' name='unchecked[]' value='two' />
<input type='hidden' name='unchecked[]' value='three' />

<input type='submit' name='submit' value='Submit' />
</form>
