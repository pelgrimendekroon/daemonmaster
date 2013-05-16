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
                <tr class="success">
                  <td><?=$scenario->id?></td>
                  <td><?=$scenario->name?></td>
                  <td><?=$scenario->description?></td>
                </tr>
<?php endforeach; ?>
              </tbody>
            </table>