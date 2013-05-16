<form method="post" action="<?=site_url('scenario/create/receive')?>">
  <fieldset>
    <legend>Name your scenario</legend>
    <div class="row-fluid">
    	<div class="span5">
        	<label for="name">Name of your scenario</label>
        	<input id="name" name="name" type="text" placeholder="E.g. Wheater" />
        </div>
        <div class="span5">
        	<label for="description">Descripe your scenario</label>
        	<input id="description" name="description" class="input-xlarge" type="text" placeholder="E.g. Monitoring the wheater at home."/>
        </div>
    </div>

<legend>Create your scenario</legend>
<div class="row-fluid">
	<div class="span1">
      <h1>If</h1>
	</div>
  <div class="span4">
      <h1>Monitor</h1>
      <p>Select your monitor:</p>
      <select name="mon">
      <?php foreach($mons as $mon): ?>
      	<option value="<?=$mon['id']?>"><?=$mon['module']?></option>
      <?php endforeach;?>
      </select>
  </div>
  <!--To do: implement differences between OK, Warn and Error -->
  
   <!--<div class="span3">
      <h1>Is</h1>
      <p>Select the status:</p>
        <select>
      		<option>OK</option>
            <option>Warning</option>
            <option>Error</option>
       	</select>  
	</div>-->
  <div class="span4">
  		<h1>Then</h1>
		<p>Select your Action:</p>
     	<select name="act">
      	<?php foreach($actions as $action): ?>
      		<option value="<?=$action['id']?>"><?=$action['module']?></option>
		<?php endforeach;?>
       	</select>        
  </div>
</div>

<legend>Press the button</legend>
    <button type="submit" class="btn btn-primary btn-large">Create scenario</button>
  </fieldset>
</form>