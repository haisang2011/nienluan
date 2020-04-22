<div>
<?php

		//đọc file ra
		$myfile = fopen("vi.json", "r") or die("Unable to open file!");
		$data = json_decode(fread($myfile, filesize("vi.json")),true);		
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$database = "nlcs";

		// Create connection
		$conn = new mysqli($servername, $username, $password,$database);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		echo "Connected successfully";

		$sql ="select *from tintuc;";
		$arr = array();
		$t;
		$result = $conn->query($sql);

		while($row = $result->fetch_assoc()) {
			//\-\:\,\"\.
			$str = preg_replace('/(\?|-|\:|\,|\"|)/', '', $row["tt_tieuDe"]);
			$str = preg_replace('/\.{3}/','',$str);
			array_push($data["intents"],json_decode('{"tag": "'."id_".$row["tt_ma"].'",
				"patterns": ["'.$str.'"],
				"responses": ["'.$row["tt_ma"].'"],
				"context_set": ""
			}',true));
			echo $str ."<br>";
		}

		//kết thúc for

		//ghi dữ liệu vào file jgon
		$myfile = fopen("vi_2.json", "w") or die("Unable to open file!");

		fwrite($myfile, json_encode($data, JSON_UNESCAPED_UNICODE));
		

	?>
</div>