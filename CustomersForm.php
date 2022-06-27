<?php
	$Name = $_POST['Name'];
    $number = $_POST['number'];
	$Address = $_POST['Address'];
    $Country = $_POST['Country'];
    $CheckInDate = $_POST['CheckOutDate'];
    $CheckOutDate = $_POST['CheckOutDate'];
    $PaymentStatus = $_POST['PaymentStatus'];
    $PaymentMethod = $_POST['PaymentMethod'];
    $TotalCost = $_POST['TotalCost'];

	// Database connection
	$conn = new mysqli('localhost','root','','customersDb');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into customer(Name, number, Address, Country, CheckInDate, CheckOutDate, PaymentStatus, PaymentMethod, TotalCost) 
        values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sissssbsi", $Name,$number,$Address,$Country,$CheckInDate,$CheckOutDate,$PaymentStatus,$PaymentMethod,$TotalCost);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>