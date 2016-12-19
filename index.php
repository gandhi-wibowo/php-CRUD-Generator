<?php
require_once 'core/function.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CRUD Generator</title>
  </head>
  <body>
    <table>
      <tr>
        <td>
          <form action="core/generate.php" method="post">
            <select  name="table">
              <option value="">Please Select</option>
              <?php
                $Table = Table();
                foreach ($Table as $key) {
                  echo "<option value='".$key['table_name']."'> ".$key['table_name']."</option>";
                }
              ?>
            </select>
            <input type="submit" name="generate" value="Generate">
          </form>


        </td>
      </tr>
      <tr>
        <td>
          <form action="core/generate.php" method="post">
            <input type="submit" name="all" value="Generate All">
          </form>
        </td>
      </tr>
    </table>
  </body>
</html>
