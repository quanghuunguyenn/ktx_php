<!-- <?php 
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	 // //Lấy ngày hiện tại
  //   $today = date('Y-m-d');
  //   echo "Today is ". $today . "<br />";
            
  //   //Cộng thêm 1 tuần
  //   $week = strtotime(date("Y-m-d", strtotime($today)) . " +1 week");
  //   $week = strftime("%Y-%m-%d",$week);
  //   echo "A week later is ". $week . "<br />";
    
  //   //Cộng thêm 1 tháng       
  //   $month = strtotime(date("Y-m-d", strtotime($today)) . " +1 month");
  //   $month = strftime("%Y-%m-%d",$month);
  //   echo "A month later is ". $month . "<br />"; 

?>
<input type="date" name=""> -->
<?php

// thời gian hiện tại
echo date('h:i:s') . "\n";

// ngừng 10 giây
sleep(10);

// chạy lại
echo date('h:i:s') . "\n";

// kết quả 2 thời gian in ra sẽ chênh lệnh nhau 10 giây
?>