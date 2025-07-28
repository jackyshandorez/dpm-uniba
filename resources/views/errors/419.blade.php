<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>419 - Session Expired</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #373B44, #4286f4);
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      text-align: center;
      padding: 20px;
    }

    .container {
      max-width: 600px;
    }

    h1 {
      font-size: 5rem;
      margin-bottom: 10px;
    }

    h2 {
      font-size: 1.5rem;
      margin-bottom: 20px;
    }

    p {
      color: #ddd;
      margin-bottom: 30px;
    }

    a {
      background: #fff;
      color: #373B44;
      text-decoration: none;
      padding: 12px 30px;
      border-radius: 30px;
      font-weight: bold;
      transition: background 0.3s;
    }

    a:hover {
      background: #f2f2f2;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>419</h1>
    <h2>Sesi Berakhir</h2>
    <p>Waktu sesi kamu telah habis. Silakan muat ulang halaman atau login kembali.</p>
    <a href="{{ url()->previous() }}">Kembali</a>
  </div>
</body>
</html>
