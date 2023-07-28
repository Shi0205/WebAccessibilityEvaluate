<!DOCTYPE html>
<html>
<head>
  <title>E-commerce Success Criteria Table</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    
    th, td {
      border: 1px solid black;
      padding: 8px;
      text-align: left;
    }
    
    th {
      background-color: #f2f2f2;
    }
  </style>
  <script>
    function validateRankInput(input) {
      var rankInputs = document.getElementsByName('rank');
      var valid = true;

      // Ensure the rank is between 1 and 10
      if (input.value < 1 || input.value > 10) {
        alert('Please enter a rank between 1 and 10');
        valid = false;
      }

      // Ensure subsequent rows have a higher rank than the previous row
      for (var i = 0; i < rankInputs.length; i++) {
        if (rankInputs[i] !== input && rankInputs[i].value >= input.value) {
          alert('The rank of the current row must be higher than the previous row');
          valid = false;
          break;
        }
      }

      if (!valid) {
        input.value = '';
      }
    }
  </script>
</head>
<body>
  <table>
    <thead>
      <tr>
        <th>Rank</th>
        <th>Level</th>
        <th>Meaning</th>
        <th>Success Criteria Fulfilled</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><input type="number" name="rank" value="1" min="1" max="10" onblur="validateRankInput(this)"></td>
        <td><input type="text" name="level" value="High"></td>
        <td>The e-commerce website fulfills most of the robust success criteria</td>
        <td><input type="text" name="criteria" value="Criteria ≥ 2"></td>
      </tr>
      <tr>
        <td><input type="number" name="rank" value="2" min="1" max="10" onblur="validateRankInput(this)"></td>
        <td><input type="text" name="level" value="Moderate"></td>
        <td>The e-commerce website fulfills some of the robust success criteria</td>
        <td><input type="text" name="criteria" value="Criteria ≥ 1"></td>
      </tr>
      <tr>
        <td><input type="number" name="rank" value="3" min="1" max="10" onblur="validateRankInput(this)"></td>
        <td><input type="text" name="level" value="Low"></td>
        <td>The e-commerce website did not fulfill robust success criteria</td>
        <td><input type="text" name="criteria" value="Criteria = 0"></td>
      </tr>
    </tbody>
  </table>
</body>
</html>
