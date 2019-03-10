<!DOCTYPE html>

<html>
	<head>
	<title>Product Administration</title>
	<link rel="icon" href="data:,">
	<style>
		th{
			text-align:left;
		}
	</style>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

	</head>
	<body>
		<form  id="main" method="post" action="prosseser.php">
			<table id="productTable">
				<thead>
					<tr>
						<th class="category">Category</th>
						<th class="subcategory">SubCategory</th>
						<th class="product_name">ProductName</th>
						<th class="tags">Tags</th>
						<th class="us_available">US Available</th>
						<th class="us_price">US Price</th>
						<th class="ca_available">CA Available</th>
						<th class="ca_price">CA Price</th>
						<th class="weight">Weight</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<input name="Category0" />
						</td>
						<td>
							<input name="SubCategory0" />
						</td>
						<td>
							<input name="ProductName0" />
						</td>
						<td>
							<input name="Tags0"/>
						</td>
						<td>
							<select name="USAvailable0">
								<option value="">US Available</option>
								<option value="true">true</option>
								<option value="false">false</option>
							</select>
						</td>
						<td>
							<input name="USPrice0" />
						</td>
						<td>
							<select name="CAAvailable0">
								<option value="">CA Available</option>
								<option value="true">true</option>
								<option value="false">false</option>
							</select>
						</td>
						<td>
							<input name="CAPrice0" />
						</td>
						<td>
							<input name="Weight0" />
						</td>			
						<td>			
							<input type ="submit" id="add" value="add" />
						</td>			
					</tr>
				</tbody>
			</table>
			<input type = "button" value = "save" id = "save" \>
		</form>
		<script> 
			$(document).ready(function(){
				const $body = $("body");
				function loadProducts(){
					$.ajax({
						url: "data.json?_=" + new Date().getTime(),
						type:"get",
						success: function(res) {
							$tbody = $('#productTable tbody');
							var products = res["Products"];
							for(var x in products){
								var product = res["Products"][x];
								var $tr = $("<tr>");
								$tr.append("<td><input value = \"" + product["Category"] +"\" name = \"Category" +(parseInt(x)+1)+  "\" hidden/></td>");
								$tr.append("<td><input value = \"" + product["SubCategory"] +"\" name = \"SubCategory" +(parseInt(x)+1)+  "\"/></td>");
								$tr.append("<td><input value = \"" + product["SubCategory"] +"\" name = \"ProductName" +(parseInt(x)+1)+  "\"/></td>");
								$tr.append("<td><input value = \"" + product["Tags"] +"\" name = \"Tags" +(parseInt(x)+1)+  "\"/></td>");
								$tr.append(' \
									<td><select name="USAvailable'+(parseInt(x)+1)+ '">\
									<option value="">US Available</option> \
									<option value="true">true</option> \
									<option value="false">false</option> \
									</select>\
									</td>');
								$tr.append("<td><input value = \"" + product["USPrice"] +"\" name = \"USPrice" +(parseInt(x)+1)+  "\"/></td>");
								$tr.append(' \
									<td><select name="CAAvailable'+(parseInt(x)+1)+ '">\
									<option value="">CA Available</option> \
									<option value="true">true</option> \
									<option value="false">false</option> \
									</select>\
									</td>\
								');
								$tr.append("<td><input value = \"" + product["CAPrice"] +"\" name = \"CAPrice" +(parseInt(x)+1)+  "\"/></td>");
								$tr.append("<td><input value = \"" + product["Weight"] +"\" name = \"Weight" +(parseInt(x)+1)+  "\"/></td>");
								$tr.append('<td><input value = "remove" name = "remove" class = "remove" type = "button"/></td>');
								$tbody.append($tr);
							}
						},
						error: function (xhr, ajaxOptions, thrownError) {
							alert(xhr.status);
							alert(thrownError);
						}
					});
				};
				loadProducts();
				$("#productTable").on("click",".remove",function(e){
					$(this).closest("tr").remove(); 
				});
				$("#add").on("click",function(event){
					event.preventDefault();
					$.post( "prosseser.php?ts=" +(new Date()).getTime(), $("#main").serialize(),function(){location.reload()});
				});
			});
			$("#save").on("click", function(){
				$.post( "prosseser.php?ts=" +(new Date()).getTime(), $("#main").serialize(),function(){location.reload()});			
			});
			
		</script>
	</body>
</html> 