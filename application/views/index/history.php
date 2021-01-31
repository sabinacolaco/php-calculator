<?php 
$this->layout = '~/views/shared/_defaultLayout.php';
?>
<style>
table {
  border-collapse: collapse;
  border: 1px solid black;
  table-layout: auto;
  width: 70%;  
  margin-left:auto; 
  margin-right:auto;
} 

th,td {
  border: 1px solid black;
  text-align:center;
}
</style>
<div class="">
<table>
    <thead>
      <tr>
        <th>#</th>
        <th>Number 1</th>
        <th>Number 2</th>
        <th>Operator</th>
        <th>Result</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i=1;
      foreach($records as $row) {
          switch($row['operator'])
          {
              case '+':
              $result = $row['num1'] + $row['num2'];
              break;
              
              case '-':
              $result = $row['num1'] - $row['num2'];
              break;
              
              case '*':
              $result = $row['num1'] * $row['num2'];
              break;
              
              case '/':
              $result = $row['num1'] / $row['num2'];
              break;
              
              default:
              $result = "Sorry No command found";
          }
        ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo floatval($row['num1']); ?></td>
          <td><?php echo floatval($row['num2']); ?></td>
          <td><?php echo $row['operator']; ?></td>
          <td><?php echo floatval($result); ?></td>
        </tr>
        <?php
        $i++;
      } ?>
    </tbody>
</table>
</div>