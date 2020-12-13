<?php
$servername = "192.168.153.120";
$username = "natasha";
$password = "123123";
$dbname = "class";
$ops = $_POST["myname"];

// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}
 
$sql = "SELECT sid,姓名,手机号码 FROM students where 姓名 like '$ops%'";
$result = mysqli_query($conn, $sql);
 
if (mysqli_num_rows($result) > 0) {
    // 输出数据
    $all = mysqli_num_rows($result);
    echo "总共找到 " . $all . "条记录";
    while($row = mysqli_fetch_assoc($result)) {
     echo "<hr>";
     echo "<h3>";
     echo "ID: " . $row["sid"]. "<br>" . "姓名: " . $row["姓名"]. "<br>". "手机号码:" . $row["手机号码"]. "<br>";
     echo "</h3>";
     echo "<hr>";
    }
} else {
    echo "0 结果";
}
 
mysqli_close($conn);
?>


