<html>
	<head>
		<title>The First.Lab1</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="css/main.css" />
	</head>
	<body>


			<div id="header" class="menu">

						<div id="logo">
							<span class="image avatar48"><img src="images/avatar.jpg" alt="" /></span>
							<h1 id="title">Polina<br />Reshetnikova</h1>
						</div>

				
						<nav id="nav">
						
							<ul>
								<li><a href="#top" id="top-link"><a href="index.html">Главная</a></span></a></li>
								<li><a href="#portfolio"><a href="gallery.html">Галерея</a></span></a></li>
								<li><a href="#about"><a href="aboutme.html">Обо мне</a></span></a></li>
								<li><a href="#hobby"><a href="hobby.html">Хобби</a></span></a></li>
								<li><a href="#new">Лабораторные ДМ</span></a>
									<ul class="sub-menu">
										<li><a href="#1"><a href="dm1.php">Первая</a></span></a></li>
										<li><a href="#2"><a href="dm2.php">Вторая</a></span></a></li>
									</ul>
								</li>
							</ul>
							
						</nav>
						
						
				
						<nav id="nav2">
						
							<ul>
								<li><span>Вход / Регистрация</span></li>
							</ul>
							
						</nav>

				
			</div>

		
			<div id="main">
			
				<div class="icon-menu">
					<img src="images/menu.png" alt="" class="open">
				</div>
				
					<div class="container">

							<header>
								<h2>Лабораторная работа по ДМ №1</h2>
							</header>
							<p>Ввод осуществляется через запятую:</p>

					</div>
			
					<form class="form" action="" method="POST">
						<input class="put" type="text" name="massA" placeholder="Первое множество" ><br>
						<input class="put" type="text" name="massB" placeholder="Второе множество" ><br>
						<p><input class="btn" type="submit" value="Выполнить" name="button" /></p>
					</form>
				
	<div class="output">			
    <?php
        function validation() {
            $massA = (string)$_POST["massA"];
            $massB = (string)$_POST["massB"];
            $arr1 = explode(",", $massA);
            $arr2 = explode(",", $massB);

            for($i=0; $i < count($arr1); $i++) {
                if($arr1[$i] >= 10000) {
                    echo "Ошибка ввода!";
                    exit();
                }
            }

            for($i=0; $i < count($arr2); $i++) {
                if($arr2[$i] >= 10000) {
                    echo "Ошибка ввода!";
                    exit();
                }
            }

            $c = $arr1;
            for($i = 0; $i < count($arr2); $i++) {
                $c1[] = $arr2[$i];
            }
            for($i = 0; $i < count($c); $i++){
                if((ord($c[$i]) - 48) >= 9){
                    echo "Ошибка ввода!";
                    exit();
                }
            }

            $c1 = f1($arr1, $arr2);
            echo "Объединение множеств: ";
            echo $c1;
            echo "<br>";

            $c2 = f2($arr1, $arr2);
            echo "Пересечение множеств: ";
            echo $c2;
            echo "<br>";

            $c3 = f3($arr1, $arr2);
            echo "Дополнение A до B: ";
            echo $c3;
            echo "<br>";

            $c4 = f4($arr1, $arr2);
            echo "Дополнение B до A: ";
            echo $c4;
            echo "<br>";

            $c5 = f5($arr1, $arr2, $c2);
            echo "Симметрическая разность: ";
            echo $c5;
            echo "<br>";

        }

        function f1($arr1, $arr2) {
            $c = $arr1;
            $res = "";

            for($i = 0; $i < count($arr2); $i++) {
                $c[] = $arr2[$i];
            }

            $n = count($c);
            for($i = 0; $i < $n-1; $i++){
                for($j = $i+1; $j < $n; $j++){
                    if($c[$i] == $c[$j]) {
                        for($z = $j; $z < $n-1; $z++){
                            $c[$z] = $c[$z+1];
                        }
                        $n--;
                    }
                }
            }

            for($i = 0; $i < $n; $i++){
                $res = $res . $c[$i] . "  ";
            }

            return $res;
        }

        function f2($arr1, $arr2){
            $res = "";
            $c1 = $arr1;
            $c2 = $arr2;
            $n = count($arr1);
            $m = count($arr2);
            $c = Array();

            for ($j=0, $k=0; $j<$n; $j++) {
                for ($i = 0; $i < $m; $i++) {
                    if ($c1[$j] == $c2[$i]) {
                        $z = true;
                        for ($l = 0; $l < $k; $l++) {
                            if ($c[$l] == $c1[$j]) {
                                $z = false;
                            }
                        }
                        if ($z) {
                            $res = $res . $c1[$j] . "  ";
                            $c[$k++] = $c1[$j];
                        }
                    }
                }
            }
            return $res;
        }

        function f3($arr1, $arr2){
            $c = $arr1;
            $res = "";

            for($i = 0; $i < count($arr2); $i++) {
                $c[] = $arr2[$i];
            }

            $n = count($c);
            for($i = 0; $i < $n-1; $i++){
                for($j = $i+1; $j < $n; $j++){
                    if($c[$i] == $c[$j]) {
                        for($z = $j; $z < $n-1; $z++){
                            $c[$z] = $c[$z+1];
                        }
                        $n--;
                    }
                }
            }

            for($i = 0; $i < $n; $i++){
                for($j = 0; $j < count($arr2); $j++){
                    if($c[$i] == $arr2[$j]) {
                        for($z = $i; $z < $n; $z++){
                            $c[$z] = $c[$z+1];
                        }
                        $n--;
                    }
                }
            }

            for($i = 0; $i < $n; $i++){
                $res = $res . $c[$i] . "  ";
            }

            return $res;
        }

        function f4($arr1, $arr2){
           $c = $arr1;
            $res = "";

            for($i = 0; $i < count($arr2); $i++) {
                $c[] = $arr2[$i];
            }

            $n = count($c);
            for($i = 0; $i < $n-1; $i++){
                for($j = $i+1; $j < $n; $j++){
                    if($c[$i] == $c[$j]) {
                        for($z = $j; $z < $n-1; $z++){
                            $c[$z] = $c[$z+1];
                        }
                        $n--;
                    }
                }
            }

            for($i = 0; $i < $n; $i++){
                for($j = 0; $j < count($arr2); $j++){
                    if($c[$i] == $arr1[$j]) {
                        for($z = $i; $z < $n; $z++){
                            $c[$z] = $c[$z+1];
                        }
                        $n--;
                    }
                }
            }

            for($i = 0; $i < $n; $i++){
                $res = $res . $c[$i] . "  ";
            }

            return $res;
        }

        function f5($arr1, $arr2, $c2) {
            $c = $arr1;
            $res = "";

            for($i = 0; $i < count($arr2); $i++) {
                $c[] = $arr2[$i];
            }

            $n = count($c);
            for($i = 0; $i < $n-1; $i++){
                for($j = $i+1; $j < $n; $j++){
                    if($c[$i] == $c[$j]) {
                        for($z = $j; $z < $n-1; $z++){
                            $c[$z] = $c[$z+1];
                        }
                        $n--;
                    }
                }
            }

            $a = explode("  ", $c2);

            for($i = 0; $i < $n; $i++){
                for($j = 0; $j < count($a); $j++){
                    if($c[$i] == $a[$j]) {
                        for($z = $i; $z < $n; $z++){
                            $c[$z] = $c[$z+1];
                        }
                        $n--;
                    }
                }
            }

            for($i = 0; $i < $n; $i++){
                $res = $res . $c[$i] . "  ";
            }

            return $res;
        }

        if (isset($_POST["button"])) {
            validation();
        }
    ?>
	</div>
					
			</div>
			<script src="js/jquery-latest.min.js"></script>
			<script src="js/menu.js"></script>
		
	</body>
</html>