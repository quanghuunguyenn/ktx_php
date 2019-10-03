<?php require 'top.php' ?>

	<div class="main">
		<div class="w3-bar w3-teal">
			<button class="w3-bar-item w3-button" onClick="opentab('tab1')"> + Thông tin phòng</button>
			<button class="w3-bar-item w3-button" onClick="opentab('tab2')"> + Thông tin sinh viên</button>
			<button class="w3-bar-item w3-button" onClick="opentab('tab3')"> + Thông tin nhân viên</button>
		</div>


		<div id="tab1" class="w3-container w3-border tabs content-search">
			<div class="form w3-quarter form1">
				<h5>Thông tin chung: </h5>
				<?php
					
					$NumHL = "SELECT * FROM HouseList";
					$i = 0; $j = 0; $r = 0;
					$queryy = mysql_query($NumHL);
					$num = mysql_num_rows($queryy);
					if ($num > 0) {
						while ($row = mysql_fetch_array($queryy)) {
							$i = $i + 1;
						}
						echo '<h6>Số dãy nhà: '.$i.'</h6>';
					}

					$NumRoom = "SELECT * FROM RoomList";
					$queryyy = mysql_query($NumRoom);
					$numm = mysql_num_rows($queryyy);
					if ($numm > 0) {
						while ($row = mysql_fetch_array($queryyy)) {
							$j = $j + 1;
							if ($row["TypeRoom"] == 0) {
								$r = $r + 1;
							}
						}
						echo '<h6>Tổng: '.$j.' phòng -  Còn giường: '.$r.' phòng</h6>';
					}
				?>
				
				<h5>Tra cứu phòng còn giường theo dãy nhà!</h5>
				<label>Dãy nhà: </label>
				<select name="HouseList" id="HouseList">
					<option value="">Chọn dãy nhà</option>
					<?php
						$hl = "SELECT * FROM HouseList";
						$query = mysql_query($hl);
						$num = mysql_num_rows($query);
						if ($num > 0) {
							while ($row = mysql_fetch_array($query)) {
					?>
					<option value="<?php echo $row['HLC']; ?>"><?php echo $row['HLName']; ?></option>
					<?php
							}
						}
					?>
				</select>
				<h5>Tra cứu thông tin phòng!</h5>
				<input class="inpRoom" type="text" name="inpRoom" placeholder="" style="width: 50px;">
				<input class="btnRoom" type="button" name="btnRoom" value="Chi tiết">

			</div>
			<div class="result-info hlresult w3-threequarter w3-center">
				<h3>Kết quả tra cứu</h3>
			</div>
		</div>


		<div id="tab2" class="w3-container w3-border tabs content-search" style="display: none;">
			<div class="form w3-quarter">
				<input class="inpNameSV" type="text" name="ip1" placeholder="Họ tên sinh viên" >
				<input class="btnNameSV" type="button" name="btn" value=">> Tra cứu">
				<p>Kết quả tra cứu có thể trùng lặp nếu tra cứu qua tên sinh viên !</p>
				<input class="inpMaSV" type="text" name="ip1" placeholder="Mã sinh viên">
				<input class="btnMaSV" type="button" name="btn" value=">> Tra cứu"><br><br>
				
			</div>
			<div class="result-info w3-threequarter studentResult w3-center">
				<h3>Kết quả tra cứu</h3>
			</div>
		</div>

		
		<div id="tab3" class="w3-container w3-border tabs content-search" style="display: none;">
			<div class="form w3-quarter">
				<input class="inpNameNV" type="text" name="ip1" placeholder="Họ tên nhân viên" >
				<input class="btnNameNV" type="button" name="btnName" value=">> Tra cứu"><br><br>
				Thông tin nhân viên quản lý dãy:
					<select class="emHL">
						<option>--chọn--</option>
						<option value="A1">Dãy A1</option>
						<option value="A2">Dãy A2</option>
						<option value="B1">Dãy B1</option>
						<option value="B2">Dãy B2</option>
					</select>
			</div>
			<div class="result-info w3-threequarter w3-center emResult">
				<h3>Kết quả tra cứu</h3>
			</div>
		</div>
	</div>
	<script>
		function opentab(tabName){
			var i;
			var x=document.getElementsByClassName("tabs");
			for(i=0;i<x.length;i++){
				x[i].style.display = "none";
			}
			document.getElementById(tabName).style.display = "block";
		}
	</script>

<?php require 'bottom.php' ?>