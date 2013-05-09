<h1>Module management</h1>
  
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Version</th>
        <th>Type</th>
      </tr>
    </thead>
    <tbody>
  
<?php

if (count($modules) > 0)
{
	foreach($modules as $id => $row):
	  	if($row->enabled==0)
	   		$url = anchor("install/overview/toggle_app/".$row->id."/1", "Activeer");
		else
		$url = anchor("install/overview/toggle_app/".$row->id."/0", "Deactiveer");
?>
	     <tr <?=($row->enabled==1 ? "class='success'" : "class='warning'") ?>>
            <td><?=$row->module; ?></td>
            <td><?=$row->description; ?></td>
            <td>#</td>
            <td><?=$url; ?></td>
  		</tr>
	<?php 
	endforeach;
}

?>


</tbody>
</table>
