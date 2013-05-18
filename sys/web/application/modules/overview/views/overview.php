<h1>Scenario Overview</h1>
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Description</th>
                </tr>
              </thead>
              <tbody>
<?php foreach($scenarios as $scenario): ?>
				<?php if($scenario['last_status']=="OK")
                	echo '<tr class="success">';
                else if($scenario['last_status']=="WARN")
				   	echo '<tr class="warning">';
				else
				   	echo '<tr class="error">';
				?>	
                  <td><?=$scenario->id?></td>
                  <td><?=$scenario->name?></td>
                  <td><?=$scenario->description?></td>
                </tr>
<?php endforeach; ?>
              </tbody>
            </table>