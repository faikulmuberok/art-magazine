<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Art Magazine</title>
  <style>
    body{font-family:system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;margin:0;color:#111}
    a{color:inherit;text-decoration:none}
    .container{max-width:1100px;margin:0 auto;padding:20px}
    header{border-bottom:1px solid #e5e7eb}
    nav a{margin-right:16px;color:#4b5563}
    .hero{padding:40px 0;text-align:center}
    .hero h1{font-size:64px;letter-spacing:8px;margin:0;line-height:0.95}
    .grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}
    .card{border:1px solid #e5e7eb;border-radius:8px;overflow:hidden;background:#fff;display:flex;flex-direction:column}
    .card img{width:100%;height:180px;object-fit:cover;background:#f3f4f6}
    .card .p{padding:14px}
    .badge{font-size:12px;padding:4px 8px;border-radius:999px;background:#eef2ff;color:#3730a3;display:inline-block}
    .muted{color:#6b7280}
    footer{border-top:1px solid #e5e7eb;margin-top:40px;padding:20px 0;color:#6b7280}
    form.inline{display:flex;gap:8px}
    input,select,textarea{width:100%;padding:8px 10px;border:1px solid #d1d5db;border-radius:6px}
    button{padding:8px 12px;border:1px solid #111;background:#111;color:#fff;border-radius:6px;cursor:pointer}
    table{width:100%;border-collapse:collapse}
    th,td{padding:10px;border-bottom:1px solid #e5e7eb;text-align:left}
    @media (max-width:900px){.grid{grid-template-columns:1fr 1fr}.hero h1{font-size:44px}}
    @media (max-width:640px){.grid{grid-template-columns:1fr}.hero h1{font-size:36px}}
  </style>
</head>
<body>
<header>
  <div class="container" style="display:flex;justify-content:space-between;align-items:center;">
    <div>
      <a href="/" style="font-weight:700">Art Magazine</a>
    </div>
    <nav>
      <a href="/">Home</a>
      <a href="/admin/posts">Admin Posts</a>
      <a href="/admin/categories">Categories</a>
      <a href="/admin/tags">Tags</a>
    </nav>
  </div>
</header>
<main class="container">
  @yield('content')
</main>
<footer>
  <div class="container">© {{ date('Y') }} Art Magazine</div>
</footer>
</body>
</html>
