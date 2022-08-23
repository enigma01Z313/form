<!DOCTYPE html>
<html lang="en">
  <?php
    require_once "./funcs.php";
  ?>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>form</title>
    <style>
      table {
        font-family: arial;
        border-collapse: collapse;
        width: 70%;
      }

      td,
      th {
        border: 1px solid #c0c0c0;
        text-align: left;
        padding: 8px;
      }
    </style>
  </head>
  <body>
    <div style="display: flex">
      <div style="margin-right: 40px">
        <h2>GET method</h2>
        <form action="addUser1.php">
          <label for="fname">First name:</label>
          <input type="text" name="fname" id="fname" /><br /><br />
          <label for="lname">Last name:</label>
          <input type="text" name="lname" id="lname" /><br /><br />
          <label>gender:</label>
          <input type="radio" name="gender" value="male" id="male1" />
          <label for="male1">male</label>
          <input type="radio" name="gender" value="female" id="female1" />
          <label for="female1">female</label>
          <input type="radio" name="gender" value="other" id="other1" />
          <label for="other1">other</label><br /><br />

          <label>Hobby:</label>
          <input type="checkbox" name="hobby[]" value="coding" id="code1" />
          <label for="code1"> coding</label>
          <input type="checkbox" name="hobby[]" value="playing" id="play1" />
          <label for="play1"> Playing</label>
          <input type="checkbox" name="hobby[]" value="reading" id="read1" />
          <label for="read1"> reading</label><br /><br />
          <label for="country">country :</label>
          <select name="country">
            <option value="iran">iran</option>
            <option value="canada">canada</option>
            <option value="southKorea">south korea</option>
          </select>
          <br /><br />
          <input type="submit" value="Submit" name="addData"/><br /><br /><br />
        </form>
        <hr>
        <a href="http://form.touriya.ir/addUser1.php?fname=reza&lname=mohamadi&hobby[]=coding&hobby[]=playing&country=iran&addData=Submit">
          Get Link
        </a>
      </div>
      <div>
        <h2>POST method</h2>
        <form action="addUser2.php" method="post">
          <label for="fname">First name:</label>
          <input type="text" name="fname" id="fname" /><br /><br />
          <label for="lname">Last name:</label>
          <input type="text" name="lname" id="lname" /><br /><br />

          <label>gender:</label>
          <input type="radio" name="gender" value="male1" id="male2" />
          <label for="male2">male</label>
          <input type="radio" name="gender" value="female" id="female2" />
          <label for="female2">female</label>
          <input type="radio" name="gender" value="other1" id="other2" />
          <label for="other2">other</label><br /><br />

          <label>Hobby:</label>
          <input type="checkbox" name="hobby[]" value="coding" id="code2" />
          <label for="code2"> coding</label>
          <input type="checkbox" name="hobby[]" value="playing" id="play2" />
          <label for="play2"> Playing</label>
          <input type="checkbox" name="hobby[]" value="reading" id="read2" />
          <label for="read2"> reading</label><br /><br />
          <label for="country">country :</label>
          <select name="country">
            <option value="iran">iran</option>
            <option value="canada">canada</option>
            <option value="southKorea">south korea</option>
          </select>
          <br /><br />
          <input type="submit" value="Submit" name="addData"/><br /><br /><br />
        </form>
      </div>
    </div>

    <h2>List</h2>
    <table>
      <thead>
        <tr>
          <th>First name</th>
          <th>Last name</th>
          <th>Gender</th>
          <th>Hobby</th>
          <th>Country</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $conn = new mysqli(
            "localhost",
            'touriya_form',
            'ZKW47jhjsbNF',
            'touriya_form'
          );

          $query = "
              SELECT * FROM form
          ";
          $result = $conn->query($query);

          while ($row = $result->fetch_assoc()) {
          ?>
            <tr>
              <td><?php echo $row['fname']; ?></td>
              <td><?php echo $row['lname']; ?></td>
              <td><?php echo $row['gender']; ?></td>
              <td>
              <?php 
                echo implode(', ', json_decode($row['hobby']));
              ?>
              </td>
              <td><?php echo $row['country']; ?></td>
            </tr>
          <?php
          }
        ?>
      </tbody>
    </table>
  </body>
</html>
