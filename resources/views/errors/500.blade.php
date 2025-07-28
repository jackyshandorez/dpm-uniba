<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>500 - Kesalahan Server</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #141e30, #243b55);
      color: white;
      text-align: center;
      padding: 80px 20px;
      min-height: 100vh;
    }

    h1 {
      font-size: 5rem;
      color: #ffc107;
      margin-bottom: 10px;
    }

    h2 {
      font-size: 1.5rem;
      margin-bottom: 20px;
    }

    p {
      color: #ccc;
      margin-bottom: 30px;
    }

    a {
      background: #ffc107;
      color: #141e30;
      padding: 12px 28px;
      border-radius: 30px;
      text-decoration: none;
      font-weight: bold;
    }

    a:hover {
      background: #e0a800;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>500</h1>
    <h2>Oops! Terjadi Kesalahan Server</h2>
    <p>Maaf, server sedang bermasalah. Silakan coba lagi nanti atau hubungi admin.</p>
    <a href="{{ url('/') }}">Kembali ke Beranda</a>
  </div>
</body>
</html>
