<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA HANDPHONE TERSEBAR!</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background: black;
            color: red;
            font-family: Arial, sans-serif;
            text-align: center;
            overflow: hidden;
        }
        h1 {
            font-size: 50px;
            margin-top: 20vh;
            text-shadow: 3px 3px 10px red;
        }
        p {
            font-size: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body onload="goFullScreen()">
    <h1>Selamat data kamu berhasil dikirim!</h1>
    <p>Untuk mencegah ini, hubungi <b>xira030@gmail.com</b></p>
    <p>Masukkan data diri di bawah ini:</p>
    
    <form>
        <input type="text" placeholder="Nama Lengkap" required><br>
        <input type="email" placeholder="Email" required><br>
        <button type="submit">Submit</button>
    </form>

    <!-- Audio Otomatis -->
    <audio id="bgm" autoplay loop>
        <source src="https://www.fesliyanstudios.com/play-mp3/4383" type="audio/mp3">
    </audio>

    <script>
        function goFullScreen() {
            document.documentElement.requestFullscreen().catch(err => {
                console.log("Fullscreen gagal:", err);
            });
        }

        // Auto Play BGM
        document.getElementById("bgm").play().catch(err => {
            console.log("Audio butuh interaksi user:", err);
        });
    </script>
</body>
</html>