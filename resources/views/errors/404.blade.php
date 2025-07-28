<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>404 - Halaman Tidak Ditemukan | DPM</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #1e3c72, #2a5298);
      color: #fff;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      text-align: center;
    }

    .container {
      max-width: 700px;
      padding: 40px 30px;
      background: rgba(255, 255, 255, 0.06);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 16px;
      backdrop-filter: blur(10px);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
      animation: fadeIn 0.8s ease-in-out;
    }

    .container svg {
      width: 150px;
      margin-bottom: 20px;
    }

    h1 {
      font-size: 4rem;
      color: #ffc107;
      margin-bottom: 10px;
    }

    h2 {
      font-size: 1.6rem;
      margin-bottom: 15px;
    }

    p {
      font-size: 1rem;
      color: #ddd;
      margin-bottom: 25px;
    }

    a {
      display: inline-block;
      padding: 12px 28px;
      background-color: #ffc107;
      color: #1e3c72;
      text-decoration: none;
      font-weight: 600;
      border-radius: 30px;
      transition: background-color 0.3s ease;
    }

    a:hover {
      background-color: #e0a800;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(15px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @media (max-width: 600px) {
      h1 {
        font-size: 3rem;
      }

      h2 {
        font-size: 1.2rem;
      }

      .container svg {
        width: 100px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <svg xmlns="http://www.w3.org/2000/svg" fill="#ffc107" viewBox="0 0 24 24"><path d="M11.001 10h2v5h-2zm0-4h2v2h-2z"/><path d="M12 2C6.486 2 2 6.485 2 12s4.486 10 10 10 10-4.485 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8
8-8 8 3.589 8 8-3.589 8-8 8z"/></svg>

    <h1>404</h1>
    <h2>Halaman Tidak Ditemukan</h2>
    <p>Oops! Halaman yang kamu cari tidak tersedia atau sudah dipindahkan.</p>
    <a href="{{ url('/') }}">Kembali ke Beranda</a>
  </div>
</body>
</html>
