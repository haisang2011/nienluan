
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
            $query = "select * from ((loaitin join theloai on loaitin.tl_ma=theloai.tl_ma) join tintuc on loaitin.lt_ma=tintuc.lt_ma) where tintuc.tt_ma=".$row["tt_ma"];
            $rs = $conn->query($query);
            $id_tintuc = $rs->fetch_assoc();
			$str = preg_replace('/(\?|-|\:|\,|\"|)/', '', $row["tt_tieuDe"]);
			$str = preg_replace('/\.{3}/','',$str);
			$str = strtolower($str);
			array_push($data["intents"],json_decode('{"tag": "'."id_".$row["tt_ma"].'",
				"patterns": ["tôi muốn tìm tin '.$str.'","bạn có thể trả đường dẫn đến bảng tin '.$str.'","cho tôi bảng tin về '.$str.'","hãy giúp tôi tìm tin '.$str.'","tôi cần tìm tin '.$str.'"],
				"responses": ["Có phải bạn đang tìm kiếm bảng tin này không? <a href=\"http://localhost/'.$id_tintuc["tl_tenkhongdau"].'/'.$id_tintuc["lt_tenkhongdau"].'/'.$id_tintuc["tt_ma"].'\">","Bạn đang tìm kiếm: <a href=\"http://localhost/'.$id_tintuc["tl_tenkhongdau"].'/'.$id_tintuc["lt_tenkhongdau"].'/'.$id_tintuc["tt_ma"].'\">"],
				"context_set": ""
			}',true));
            echo $str ."<br>";
			//http://localhost/trangchu/kinh-doanh/tai-chinh/114
			//'http://localhost/'.$id_tintuc["tl_tenkhongdau"].'/'.$id_tintuc["lt_tenkhongdau"].'/'.$id_tintuc["tt_ma"]
		}

		//kết thúc for

		//ghi dữ liệu vào file jgon
		$myfile = fopen("vi_2.json", "w") or die("Unable to open file!");

		fwrite($myfile, json_encode($data, JSON_UNESCAPED_UNICODE));
		

	?>
