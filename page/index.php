<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Boxicons -->
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <!-- My CSS -->
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
        <!-- JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- <meta http-equiv="refresh" content="1"> -->
        <title>IoT Page Control</title>
    </head>
    <body onload="startTime()">
        <section id="sidebar">
            <a href="#"class="brand">
                <i class="bx bxs-smile"></i>
                <span class="text">IoT Page Control</span>
            </a>
            <ul class="side-menu top">
                <li class="active">
                    <a href="#">
                        <i class="bx bxs-dashboard"></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="#">
                        <i class='bx bx-stats'></i>
                        <span class="text">Control</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bx-desktop' ></i>
                        <span class="text">Monitoring</span>
                    </a>
                </li> -->
            </ul>
            <ul class="side-menu">
                <li>
                    <a href="logout.php" class="logout">
                        <i class="bx bxs-log-out-circle"></i>
                        <span class="text">Logout</span>
                    </a>
                </li>
            </ul>
        </section>

        <section id="content">
            <nav>
                <i class='bx bx-menu'></i>
                <a href="#" class="nav-link">Control & Acquisition Data</a>
                <form action="#">
                    <div class="form-input">
                        
                    </div>
                </form>
                <input type="checkbox" id="switch-mode" hidden>
                
                <a href="#" class="profile">
                    <img src="img/user.png">
                </a>
                </nav>

                <main>
                    <div class="head-title">
                        <div class="left">
                            <h1>Dashboard</h1>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#">Dashboard</a>
                                    <li>
                                        <i class="bx bx-chevron-right"></i>
                                    </li>
                                    <li>
                                        <a href="#" class="active">Home</a>
                                    </li>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <ul class="box-info">
                        <li>
                            <i class="bx bxs-check-square"></i>
                            <span class="text">
                                <h3>1</h3>
                                <p>Active Sensor</p>
                            </span>
                        </li>
                        <li>
                            <i class="bx bxs-check-square"></i>
                            <span class="text">
                                <h3>1</h3>
                                <p>Active Actuators</p>
                            </span>
                        </li>
                        <li>
                            <i class='bx bxs-time-five' ></i>
                            <script>
                                function startTime(){
                                    const today = new Date();
                                    let h = today.getHours();
                                    let m = today.getMinutes();
                                    let s = today.getSeconds();
                                    m = checkTime(m);
                                    s = checkTime(s);
                                    document.getElementById('text').innerHTML =  h + ":" + m + ":" + s;
                                    setTimeout(startTime, 1000);
                                }

                                function checkTime(i) {
                                    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
                                    return i;
                                }
                            </script>
                            <span class="text">
                                <h3 id="text"></h3>
                                <p>Time Now</p>
                            </span>
                            
                        </li>
                    </ul>

                    <ul class="box-info-bing">
                        <li>
                            <i class="bx bx-stats"></i>
                            <span class="text">
                                <h3>Control Panel</h3>

                            </span>
                        </li>
                        <li>
                            <i class="bx bx-desktop"></i>
                            <span class="text">
                                <h3>Monitoring Data</h3>

                            </span>
                        </li>
                    </ul>
                    <ul class="box-info-control">
                        <li>
                        <form action="send.php" method="post" name="form1">
                            <div>
                                <button class="on-btn" type="submit" name="ON" value="ON">ON Servo</button>
                            </div>
                            <br>
                            <div>
                                <button class="off-btn" type="submit" name="OFF" value="OFF">OFF Servo</button>
                            </div>
                            <?php
                                include_once ("config.php");
                                $sql_query = mysqli_query($koneksi, "SELECT data FROM tb_servo ORDER BY id DESC Limit 1");
                                $data = mysqli_fetch_array($sql_query);
                                if($data['data'] == 1){
                                    $status = "on";
                                }else{
                                    $status = "off";
                                }
                            ?>
                        </form>

                        </li>
                        
                        <li>
                        <?php
                            include_once ("config.php");
                            $sql=mysqli_query($koneksi,"SELECT nilai, reading_time from tb_ultrasonic ORDER BY id DESC Limit 1");
                            echo "<p>Ketinggian Bak Kosong (min 10cm): </p>";
                            if($data = mysqli_fetch_array($sql)){
                                echo $data['nilai'];
                                echo "<p>cm</p>";
                                echo "<p>Timesnap: </p>";
                                echo $data['reading_time'];
                            }
                            
                        ?>
                        </li>
                    </ul>
                    <div class="sliderContainer">
                        <input type="range" min="0" max="100" value="0" id="myRange" class="slider-range">
                        <p>Value: <span id="value"></span></p>
                    </div>
                    <script>
                        function sendData(pos){
                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function(){
                                if(this.readyState == 4 && this.status == 200){
                                    console.log(this.responseText);
                                }
                            };
                            xhttp.open("GET", "setPOS?servoPOS="+pos, true);
                            xhttp.send();
                        }
                        var slider = document.getElementById("myRange");
                        var  output = document.getElementById("value");
                        output.innerHTML = slider.value;
                        slider.oninput = function(){
                            output.innerHTML = this.value;
                            sendData(output.innerHTML);
                        }
                    </script>
                </main>
        </section>
        <script language="javascript">
            function refreshSomething(){
            var dt = new Date();
            document.getElementById('box-info-control').innerHTML = dt.getSeconds();
            }


            setInterval(function(){
                refreshSomething() // this will run after every second
            }, 1000);
        </script>
        <script src="js/script.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>