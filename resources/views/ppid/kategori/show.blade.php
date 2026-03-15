<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $kategori->nama_kategori }} – PPID Bapenda Jateng</title>

{{-- CSS dari portal (untuk navbar) --}}
<link href="{{ url('portal/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
<link href="{{ url('portal/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ url('portal/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ url('portal/plugin/smartmenu/jquery.smartmenus.bootstrap.css') }}">
<link rel="stylesheet" href="{{ url('portal/css/main.css') }}">
<link rel="stylesheet" href="{{ url('portal/css/style.css') }}?t={{ time() }}">

<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/1531875d2d.js" crossorigin="anonymous"></script>

<style>
/* ===== CSS Variables ===== */
:root {
    --navy: #0a2540;
    --blue: #1a56db;
    --blue-lt: #e8f0fe;
    --blue-mid: #3b82f6;
    --gray-50: #f8fafc;
    --gray-100: #f1f5f9;
    --gray-200: #e2e8f0;
    --gray-400: #94a3b8;
    --gray-600: #475569;
    --gray-700: #334155;
    --white: #ffffff;
    --shadow: 0 2px 12px rgba(0,0,0,.08);
    --radius: 10px;
}

/* ===== Reset body font — override CSS portal ===== */
body {
    font-family: 'Nunito', sans-serif !important;
    background: var(--gray-50) !important;
    color: var(--gray-700) !important;
    font-size: 16px !important;
}

/* ===== Navbar active style ===== */
.aktif > a {
    color: #fff !important;
    background: rgb(1, 86, 198);
    padding: 9px;
    border-radius: 8px;
}

/* ===== Hero ===== */
.hero {
    margin-top: 0 !important;
    background: linear-gradient(130deg, #0a2540 0%, #0e3460 55%, #1a56db 100%);
    padding: 52px 190px 44px;
    position: relative;
    overflow: hidden;
}
.hero::after {
    content: '';
    position: absolute;
    right: -60px; top: -60px;
    width: 320px; height: 320px;
    border-radius: 50%;
    background: rgba(255,255,255,.04);
}
.hero-inner { max-width: 1280px; margin: 0 auto; }
.hero-chip {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: rgba(255,255,255,.13);
    color: rgba(255,255,255,.85);
    font-size: 13px !important;
    font-weight: 700;
    letter-spacing: .07em;
    text-transform: uppercase;
    padding: 6px 14px;
    border-radius: 20px;
    margin-bottom: 14px;
}
.hero h1 {
    font-size: 2rem !important;
    font-weight: 800;
    color: #fff;
    margin-bottom: 10px;
}
.hero p {
    color: rgba(255,255,255,.75);
    font-size: 15px !important;
    max-width: 480px;
    line-height: 1.7;
}

/* ===== Page Layout ===== */
.page-body {
    max-width: 1280px;
    margin: 0 auto;
    padding: 36px 20px 56px;
    display: grid;
    grid-template-columns: 240px 1fr;
    gap: 28px;
}

/* ===== Sidebar ===== */
.sidebar { position: sticky; top: 130px; align-self: start; }
.sidebar-box {
    background: var(--white);
    border: 1px solid var(--gray-200);
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: 0 1px 4px rgba(0,0,0,.06);
}
.sidebar-head {
    background: var(--navy);
    color: var(--white) !important;
    font-size: 14px !important;
    font-weight: 800;
    letter-spacing: .06em;
    text-transform: uppercase;
    padding: 15px 18px;
}
.sidebar-list { list-style: none; padding: 8px; margin: 0; }
.sidebar-list li a {
    display: flex !important;
    align-items: center;
    gap: 10px;
    padding: 11px 13px;
    font-size: 15px !important;
    font-weight: 600;
    color: var(--gray-600) !important;
    text-decoration: none !important;
    border-radius: 7px;
    transition: all .14s;
}
.sidebar-list li a:hover { background: var(--blue-lt) !important; color: var(--blue) !important; }
.sidebar-list li.on a { background: var(--blue-lt) !important; color: var(--blue) !important; }
.dot {
    width: 8px; height: 8px;
    border-radius: 50%;
    background: var(--gray-400);
    flex-shrink: 0;
    transition: background .14s;
}
.sidebar-list li.on a .dot,
.sidebar-list li a:hover .dot { background: var(--blue); }

/* ===== Main Content ===== */
.main { min-width: 0; }
.topbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: var(--white);
    border: 1px solid var(--gray-200);
    border-radius: var(--radius);
    padding: 15px 20px;
    margin-bottom: 24px;
    box-shadow: 0 1px 4px rgba(0,0,0,.05);
}
.topbar h2 {
    font-size: 18px !important;
    font-weight: 800;
    color: var(--navy) !important;
    margin: 0;
}
.badge-count {
    background: var(--blue);
    color: #fff !important;
    font-size: 13px !important;
    font-weight: 700;
    padding: 5px 15px;
    border-radius: 20px;
}

/* ===== Section Cards ===== */
.sec-card {
    background: var(--white);
    border: 1px solid var(--gray-200);
    border-radius: var(--radius);
    margin-bottom: 18px;
    overflow: hidden;
    box-shadow: 0 1px 4px rgba(0,0,0,.05);
    transition: box-shadow .18s;
}
.sec-card:hover { box-shadow: 0 4px 18px rgba(0,0,0,.09); }
.sec-head {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 16px 22px;
    background: linear-gradient(90deg, #f8fafc 0%, #fff 100%);
    border-bottom: 1px solid var(--gray-100);
}
.sec-num {
    width: 36px; height: 36px;
    background: var(--navy);
    color: #fff !important;
    border-radius: 7px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px !important;
    font-weight: 800;
    flex-shrink: 0;
}
.sec-title {
    font-size: 16px !important;
    font-weight: 700;
    color: var(--navy) !important;
    flex: 1;
}
.sec-cnt {
    font-size: 13px !important;
    font-weight: 700;
    color: var(--gray-400) !important;
    background: var(--gray-100);
    padding: 4px 12px;
    border-radius: 20px;
    white-space: nowrap;
}

/* ===== Doc List ===== */
.doc-list { list-style: none; margin: 0; padding: 0; }
.doc-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 13px 22px;
    border-bottom: 1px solid var(--gray-100);
    gap: 14px;
    transition: background .12s;
}
.doc-row:last-child { border-bottom: none; }
.doc-row:hover { background: #fafbff; }
.doc-name {
    font-size: 15px !important;
    color: var(--gray-700) !important;
    flex: 1;
    display: flex;
    align-items: center;
    gap: 10px;
}
.doc-name::before {
    content: '';
    display: block;
    width: 5px; height: 5px;
    background: var(--blue-mid);
    border-radius: 50%;
    flex-shrink: 0;
}
.btn-lihat {
    display: inline-flex !important;
    align-items: center;
    gap: 6px;
    padding: 7px 18px;
    background: var(--blue) !important;
    color: #fff !important;
    font-size: 14px !important;
    font-weight: 700;
    border-radius: 6px;
    text-decoration: none !important;
    transition: background .15s, transform .12s;
    flex-shrink: 0;
}
.btn-lihat:hover { background: #1344b8 !important; transform: translateY(-1px); color: #fff !important; }

/* ===== Empty State ===== */
.empty-state { text-align: center; padding: 60px 20px; color: var(--gray-400); }
.empty-state i { font-size: 3rem; margin-bottom: 12px; display: block; }
.empty-state p { font-size: 15px !important; font-weight: 600; }

/* ===== Footer ===== */
.footer {
    background: var(--navy);
    color: rgba(255,255,255,.65);
    padding: 40px 20px 24px;
}
.footer-inner {
    max-width: 1280px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1.3fr 1fr 1fr;
    gap: 32px;
    margin-bottom: 28px;
}
.f-head {
    color: #fff !important;
    font-size: 14px !important;
    font-weight: 800;
    letter-spacing: .06em;
    text-transform: uppercase;
    margin-bottom: 14px;
    padding-bottom: 10px;
    border-bottom: 2px solid rgba(255,255,255,.12);
}
.f-text { font-size: 14px !important; line-height: 1.9; }
.f-list { list-style: none; margin: 0; padding: 0; }
.f-list li {
    font-size: 14px !important;
    margin-bottom: 9px;
    display: flex;
    align-items: flex-start;
    gap: 9px;
}
.f-list li i { color: var(--blue-mid); margin-top: 3px; }
.f-list a { color: rgba(255,255,255,.65); text-decoration: none; }
.f-list a:hover { color: #fff; }
.footer-bottom {
    border-top: 1px solid rgba(255,255,255,.09);
    padding-top: 18px;
    text-align: center;
    font-size: 13px !important;
    color: rgba(255,255,255,.45);
    max-width: 1280px;
    margin: 0 auto;
}

/* ===== Responsive ===== */
@media (max-width: 1024px) {
    .page-body { grid-template-columns: 1fr; }
    .sidebar { position: static; }
    .footer-inner { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 640px) {
    .hero h1 { font-size: 1.4rem !important; }
    .footer-inner { grid-template-columns: 1fr; }
    .doc-row { flex-direction: column; align-items: flex-start; }
    .btn-lihat { align-self: flex-start; }
}
</style>
</head>
<body>

{{-- jQuery dibutuhkan navbar portal --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

{{-- ======= Top Bar ======= --}}
<div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope"></i>
            <a href="mailto:bapenda@jatengprov.go.id">bapenda@jatengprov.go.id</a>
            <i class="bi bi-telephone"></i> (024) 3515514
        </div>
        <div class="d-none d-lg-flex social-links align-items-center">
            <a href="https://www.facebook.com/bapenda.jateng" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="https://twitter.com/BPPD_JATENG" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="https://www.instagram.com/bapenda_jateng/" class="instagram"><i class="bi bi-instagram"></i></a>
        </div>
    </div>
</div>

{{-- ======= Header / Navbar ======= --}}
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <a href="/ppid_bapenda" class="logo me-auto">
            <img src="{{ url('portal/img/logo-bapenda.png') }}" alt="" class="img-fluid">
        </a>
        <nav id="navbar" class="navbar order-last order-lg-0">
            <?php
            $num = $mainmenuppid->count();
            $i = 0; $j = 0; $id = 0;
            foreach ($mainmenuppid->get() as $item) {
                if ($i == 0) echo "\n<ul>";
                $i++;
                if (strpos($item->url, 'http') !== false or strpos($item->url, 'www') !== false) {
                    $link = $item->url;
                } else {
                    $link = url('') . '/' . $item->url;
                }
                $url = $item->jenis_konten == 3 ? $link : (($item->jenis_konten == 1 or $item->jenis_konten == 2) ? url('') . '/page/' . $item->url : '#');
                $target = $item->jenis_konten == 3 ? " target='" . $item->target . "'" : '';
                $cek = DB::table('ppid_main_menu')->where('id_parent', $item->id)->count();
                if ($item->jenis_konten == 0) {
                    echo "<li data-sm-reverse='true' class='dropdown' data-menu='$item->id'><a href='#' class='a-utama'>$item->title <i class='bi bi-chevron-down'></i></a>";
                } else {
                    echo "<li data-menu='$item->id'><a href='$url' $target>$item->title</a>";
                }
                $j++;
                showmenuatas2_ppid($item->id);
                echo '</li>';
                echo ($cek > 0 and $item->id_parent != 0) ? '</li>' : '';
                if ($i == $num) echo '</ul>';
            }
            ?>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>

{{-- ======= Hero Section ======= --}}
<section class="hero">
    <div class="hero-inner">
        <div class="hero-chip">
            <i class="fa-solid fa-shield-halved"></i> Keterbukaan Informasi Publik
        </div>
        <h1>Layanan Informasi Publik</h1>
        <p>Akses dokumen dan informasi publik yang tersedia sesuai kategori yang telah ditetapkan.</p>
    </div>
</section>

{{-- ======= Page Body ======= --}}
<div class="page-body">

    <aside class="sidebar">
        <div class="sidebar-box">
            <div class="sidebar-head">Kategori Informasi</div>
            <ul class="sidebar-list">
                @foreach($semuaKategori as $kat)
                <li class="{{ $kat->id === $kategori->id ? 'on' : '' }}">
                    <a href="{{ route('ppid.kategori.show', $kat->slug) }}">
                        <span class="dot"></span> {{ $kat->nama_kategori }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </aside>

    <main class="main">

        <div class="topbar">
            <h2>{{ $kategori->nama_kategori }}</h2>
            <span class="badge-count">{{ $totalDokumen }} Dokumen</span>
        </div>

        @if($kontenTanpaSubKategori->count())
        <div class="sec-card">
            <div class="sec-head">
                <div class="sec-num"><i class="fa-solid fa-file"></i></div>
                <div class="sec-title">{{ $kategori->nama_kategori }}</div>
                <span class="sec-cnt">{{ $kontenTanpaSubKategori->count() }} dokumen</span>
            </div>
            <ul class="doc-list">
                @foreach($kontenTanpaSubKategori as $konten)
                <li class="doc-row">
                    <span class="doc-name">{{ $konten->judul_isi }}</span>
                    <a href="{{ $konten->link }}" target="_blank" class="btn-lihat">
                        <i class="fa-solid fa-eye"></i> Lihat
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        @foreach($subKategoris as $index => $sub)
        @if($sub->konten->count())
        <div class="sec-card">
            <div class="sec-head">
                <div class="sec-num">{{ $index + 1 }}</div>
                <div class="sec-title">{{ $sub->nama_sub_kategori }}</div>
                <span class="sec-cnt">{{ $sub->konten->count() }} dokumen</span>
            </div>
            <ul class="doc-list">
                @foreach($sub->konten as $konten)
                <li class="doc-row">
                    <span class="doc-name">{{ $konten->judul_isi }}</span>
                    <a href="{{ $konten->link }}" target="_blank" class="btn-lihat">
                        <i class="fa-solid fa-eye"></i> Lihat
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        @endif
        @endforeach

        @if($totalDokumen === 0)
        <div class="sec-card">
            <div class="empty-state">
                <i class="fa-solid fa-folder-open"></i>
                <p>Belum ada dokumen pada kategori ini.</p>
            </div>
        </div>
        @endif

    </main>
</div>

{{-- ======= Footer ======= --}}
<footer class="footer">
    <div class="footer-inner">
        <div>
            <div class="f-head">Tentang PPID</div>
            <p class="f-text">Pejabat Pengelola Informasi dan Dokumentasi (PPID) Badan Pengelola Pendapatan Daerah (Bapenda) Provinsi Jawa Tengah berkomitmen memberikan layanan informasi publik yang transparan dan akuntabel.</p>
        </div>
        <div>
            <div class="f-head">Hubungi Kami</div>
            <ul class="f-list">
                <li><i class="fa-solid fa-location-dot"></i> Jl. Pemuda No.1 Semarang, Jawa Tengah</li>
                <li><i class="fa-solid fa-phone"></i> <a href="#">(024) 3515514</a></li>
                <li><i class="fa-solid fa-envelope"></i> <a href="mailto:bapenda@jatengprov.go.id">bapenda@jatengprov.go.id</a></li>
                <li><i class="fa-brands fa-whatsapp"></i> <a href="#">0811 2835 000</a></li>
            </ul>
        </div>
        <div>
            <div class="f-head">Tautan Cepat</div>
            <ul class="f-list">
                <li><i class="fa-solid fa-link"></i> <a href="#">Portal Jawa Tengah</a></li>
                <li><i class="fa-solid fa-link"></i> <a href="#">Data Jateng</a></li>
                <li><i class="fa-solid fa-link"></i> <a href="#">e-PPID Jateng</a></li>
                <li><i class="fa-solid fa-link"></i> <a href="#">Komisi Informasi Jateng</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; {{ date('Y') }} Badan Pengelola Pendapatan Daerah Provinsi Jawa Tengah. Semua hak dilindungi.
    </div>
</footer>

</body>
</html>