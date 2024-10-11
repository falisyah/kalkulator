<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
    <style>
        body {
            font-family: monospace;
            background-color: #ffffff; 
            display: flex;
            text-align: center;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 5px;
        }

        .container {
            background-color: #ffffff;
            border: 1px solid #167a16;
            padding: 30px;
            border-radius: 10px 100px/ 120px 100px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
        }

        button {
            padding: 10px;
            margin-top: 10px;
            width: 100%;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: green;
        }

        .result {
            margin-top: 20px;
        }

        .triangle {
            margin-top: 30px;
            white-space: pre;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Kalkulator</h1>
        
        <form method="POST" action="">
            <label for="num1"></label>
            <input type="number" name="num1" placeholder="Masukkan angka pertama" required>

            <label for="num2"></label>
            <input type="number" name="num2" placeholder="Masukkan angka kedua" required>

            <label for="operator">Pilih Operator:</label>
            <select name="operator">
                <option value="add">Penjumlahan (+)</option>
                <option value="subtract">Pengurangan (-)</option>
                <option value="multiply">Perkalian (*)</option>
                <option value="divide">Pembagian (/)</option>
            </select>

            <button type="submit">Hitung</button>
        </form>

        <div class="result">
            <?php
            // Cek jika form telah disubmit
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Mengambil nilai dari form
                $num1 = floatval($_POST['num1']);
                $num2 = floatval($_POST['num2']);
                $operator = $_POST['operator'];
                $result = 0;

                // Operasi kalkulator berdasarkan pilihan operator
                if ($operator == "add") {
                    $result = $num1 + $num2;
                    echo "<h2>Hasil: $num1 + $num2 = $result</h2>";
                } elseif ($operator == "subtract") {
                    $result = $num1 - $num2;
                    echo "<h2>Hasil: $num1 - $num2 = $result</h2>";
                } elseif ($operator == "multiply") {
                    $result = $num1 * $num2;
                    echo "<h2>Hasil: $num1 * $num2 = $result</h2>";
                } elseif ($operator == "divide") {
                    if ($num2 == 0) {
                        echo "<h2>Tidak dapat membagi dengan 0!</h2>";
                    } else {
                        $result = $num1 / $num2;
                        echo "<h2>Hasil: $num1 / $num2 = $result</h2>";
                    }
                }

                // Fungsi untuk membuat piramida bintang
                function generateTriangle($rows) {
                    $output = "";

                    if ($rows <= 0) {
                        return "Hasil tidak valid untuk membuat piramida!";
                    }

                    // Membulatkan hasil ke bawah jika hasil adalah pecahan
                    $rows = floor($rows);

                    // Loop untuk membuat piramida
                    for ($i = 1; $i <= $rows; $i++) {
                        // Menambah spasi
                        for ($j = 1; $j <= $rows - $i; $j++) {
                            $output .= " ";
                        }
                        // Menambah bintang
                        for ($k = 0; $k < (2 * $i - 1); $k++) {
                            $output .= "*";
                        }
                        $output .= "\n";
                    }

                    return $output;
                }

                // Menampilkan piramida bintang
                if ($operator != "divide" || $num2 != 0) {
                    echo "<div class='triangle'><h2>Piramida Bintang</h2>";
                    echo "<pre>" . generateTriangle($result) . "</pre></div>";
                }
            }
            ?>
        </div>
    </div>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>
