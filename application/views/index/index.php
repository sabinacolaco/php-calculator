<?php 
$this->layout = '~/views/shared/_defaultLayout.php';
?>
<script>
function callCalculator() {
    var num1 = document.getElementById("num1").value;
    var num2 = document.getElementById("num2").value;
    var operator = document.getElementById("operator").value;
    operator = encodeURIComponent(operator)
    var data = "num1="+num1+"&num2="+num2+"&operator="+operator;
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
           document.getElementById("showResult").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "index/getresult", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(data); 
}
</script>
<form method="post">
<table align="center">
    <tr>
        <td colspan="2"><strong><div id="showResult" style="height:20px;text-align:center"></div></strong></td>
    </tr>
    <tr>
        <td>Enter the 1st Number</td>
        <td><input type="text" name="num1" id="num1"></td>
    </tr>
    <tr>
        <td>Enter the 2nd Number</td>
        <td><input type="text" name="num2" id="num2"></td>
    </tr>
    <tr>
        <td>Select the Operator</td>
        <td>
            <select name="operator" id="operator">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><input type="button" name="submit" onclick = callCalculator() value="Calculate"></td>
    </tr>
</table>
<div style="margin-top: 50px;text-align:center">click <a href="/php-calculator/index/history">here</a> to check the history</div>
</form>
