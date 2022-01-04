<?php
session_start();
include("dbconnection.php");

$id = $_GET['childnumber'];
?>

<div class="container-fluid">
	<div class="row">
		<div class="container">
			<table class="table table-bordered table-striped js-basic-example table-hover dataTable">
			<thead>
				<tr>
					<th>Day</th>
					<th>Weight</th>
				</tr>
			</thead>
			<tbody >
					<?php
					$query = mysqli_query($con, "SELECT * FROM `weight` WHERE childs_number = '$id' ");

						if (mysqli_num_rows($query) == null) {
							echo "<tr><td>There are zore weights here</td></tr>";
						}else{
							while($row = mysqli_fetch_array($query))
							{
							 echo "<tr><td>".$row["day"]."</td>";
							 echo "<td><input type='text' class='col-md-2' id='weightEdit' onkeyup='addValue(this.value)' value=".$row["weight"]."></input> kg</td></tr>";
							}
						}
					?>
			</tbody>
		</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	function addValue(num){
				let child ='<?php echo $id; ?>';
       let xhttp;

        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById('editDone').innerHTML = this.responseText;
        } 
        };

        xhttp.open("GET", "./edit_weight.php?cnum="+num+"&number="+child, true);
        xhttp.send();
	}
</script>