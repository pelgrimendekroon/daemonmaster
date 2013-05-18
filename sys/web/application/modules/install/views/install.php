<h1>Install Modules</h1>
<table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Version</th>
        <th>Type</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

<?php
foreach($modules as $module):
?>
    <tr class="success">
      <td><?=$module['module'] ?></td>
      <td><?=$module['description'] ?></td>
      <td><?=$module['version']?></td>
      <td><?=$module['type']?></td>
      <td><?=(($module['installed'] != 1) &&  (empty($module['errors'])) ? anchor("install/install/app/".$module['type']."/".$module['module'], 'installeren') : (empty($module['errors']) ? 'ge&iuml;nstalleerd' : 'kan niet installeren'));?></td>      
    </tr>

<?php
endforeach;
?>
   </tbody>
</table>
