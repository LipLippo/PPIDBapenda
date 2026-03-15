<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Informasi Berkala – PPID Bapenda Jateng</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/1531875d2d.js" crossorigin="anonymous"></script>
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
    --navy:      #0a2540;
    --blue:      #1a56db;
    --blue-lt:   #e8f0fe;
    --blue-mid:  #3b82f6;
    --gray-50:   #f8fafc;
    --gray-100:  #f1f5f9;
    --gray-200:  #e2e8f0;
    --gray-400:  #94a3b8;
    --gray-600:  #475569;
    --gray-700:  #334155;
    --white:     #ffffff;
    --shadow:    0 2px 12px rgba(0,0,0,.08);
    --radius:    10px;
}

body {
    font-family: 'Nunito', sans-serif;
    background: var(--gray-50);
    color: var(--gray-700);
    font-size: 14px;
}

/* ─── NAVBAR ─── */
.navbar {
    background: var(--white);
    box-shadow: var(--shadow);
    position: sticky;
    top: 0;
    z-index: 999;
}

/* gambar navbar langsung jadi seluruh konten navbar */
.navbar-img-wrap {
    max-width: 1280px;
    margin: 0 auto;
    display: flex;
    align-items: center;
}

/* Kita pakai gambar asli sebagai background atas,
   lalu duplikasi konten dengan CSS supaya tetap klikable.
   Tapi untuk preview, kita render ulang persis sesuai gambar. */
.navbar-brand {
    display: flex;
    align-items: center;
    padding: 10px 20px;
    text-decoration: none;
    flex-shrink: 0;
}

/* Logo: karena file lokal belum ada, kita mock-up persis gambar */
.logo-box {
    display: flex;
    align-items: center;
    gap: 0;
}

.logo-icon {
    width: 52px;
    height: 52px;
    background: #1a56db;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 22px;
    flex-shrink: 0;
}

.logo-text-wrap {
    display: flex;
    flex-direction: column;
    line-height: 1;
    padding-left: 6px;
}

.logo-main {
    font-size: 1.7rem;
    font-weight: 800;
    color: #1a56db;
    letter-spacing: -1px;
}

.logo-sub {
    font-size: 0.62rem;
    color: #555;
    letter-spacing: .01em;
    white-space: nowrap;
}

.logo-jateng {
    font-size: 1.1rem;
    font-weight: 800;
    color: #e63535;
    font-style: italic;
    margin-left: -4px;
    align-self: flex-end;
    padding-bottom: 2px;
}

/* Nav menu */
.nav-menu {
    list-style: none;
    display: flex;
    align-items: center;
    gap: 0;
    margin-left: auto;
    padding-right: 20px;
}

.nav-item { position: relative; }

.nav-link {
    display: flex;
    align-items: center;
    gap: 4px;
    padding: 24px 11px;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: .04em;
    color: #444;
    text-decoration: none;
    white-space: nowrap;
    transition: color .15s;
}

.nav-link:hover, .nav-item.active > .nav-link { color: var(--blue); }

.nav-link .ch {
    font-size: .55rem;
    opacity: .7;
}

/* Dropdown */
.dropdown {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    min-width: 210px;
    background: var(--white);
    border: 1px solid var(--gray-200);
    border-radius: var(--radius);
    box-shadow: 0 6px 24px rgba(0,0,0,.1);
    list-style: none;
    padding: 6px;
    z-index: 999;
}

.nav-item:hover .dropdown { display: block; }

.dropdown li a {
    display: block;
    padding: 8px 12px;
    font-size: .8rem;
    font-weight: 600;
    color: var(--gray-700);
    text-decoration: none;
    border-radius: 7px;
    transition: background .12s;
}

.dropdown li a:hover { background: var(--blue-lt); color: var(--blue); }

/* Mobile hamburger */
.hamburger {
    display: none;
    border: none;
    background: none;
    padding: 12px 16px;
    cursor: pointer;
    margin-left: auto;
}
.hamburger span {
    display: block; width: 22px; height: 2px;
    background: #444; border-radius: 2px; margin: 5px 0;
}

/* ─── HERO ─── */
.hero {
    background: linear-gradient(130deg, #0a2540 0%, #0e3460 55%, #1a56db 100%);
    padding: 44px 24px 36px;
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
    font-size: .7rem;
    font-weight: 700;
    letter-spacing: .07em;
    text-transform: uppercase;
    padding: 5px 13px;
    border-radius: 20px;
    margin-bottom: 12px;
}

.hero h1 {
    font-size: 1.75rem;
    font-weight: 800;
    color: #fff;
    margin-bottom: 8px;
}

.hero p {
    color: rgba(255,255,255,.68);
    font-size: .85rem;
    max-width: 480px;
    line-height: 1.6;
}

/* ─── LAYOUT ─── */
.page-body {
    max-width: 1280px;
    margin: 0 auto;
    padding: 32px 20px 48px;
    display: grid;
    grid-template-columns: 220px 1fr;
    gap: 24px;
}

/* ─── SIDEBAR ─── */
.sidebar {
    position: sticky;
    top: 78px;
    align-self: start;
}

.sidebar-box {
    background: var(--white);
    border: 1px solid var(--gray-200);
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: 0 1px 4px rgba(0,0,0,.06);
}

.sidebar-head {
    background: var(--navy);
    color: var(--white);
    font-size: .72rem;
    font-weight: 800;
    letter-spacing: .06em;
    text-transform: uppercase;
    padding: 13px 16px;
}

.sidebar-list { list-style: none; padding: 7px; }

.sidebar-list li a {
    display: flex;
    align-items: center;
    gap: 9px;
    padding: 9px 11px;
    font-size: .8rem;
    font-weight: 600;
    color: var(--gray-600);
    text-decoration: none;
    border-radius: 7px;
    transition: all .14s;
}

.sidebar-list li a:hover { background: var(--blue-lt); color: var(--blue); }

.sidebar-list li.on a {
    background: var(--blue-lt);
    color: var(--blue);
}

.dot {
    width: 7px; height: 7px;
    border-radius: 50%;
    background: var(--gray-400);
    flex-shrink: 0;
    transition: background .14s;
}
.sidebar-list li.on a .dot,
.sidebar-list li a:hover .dot { background: var(--blue); }

/* ─── MAIN ─── */
.main { min-width: 0; }

.topbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: var(--white);
    border: 1px solid var(--gray-200);
    border-radius: var(--radius);
    padding: 13px 18px;
    margin-bottom: 22px;
    box-shadow: 0 1px 4px rgba(0,0,0,.05);
}

.topbar h2 {
    font-size: .95rem;
    font-weight: 800;
    color: var(--navy);
}

.badge-count {
    background: var(--blue);
    color: #fff;
    font-size: .7rem;
    font-weight: 700;
    padding: 4px 13px;
    border-radius: 20px;
}

/* Section Card */
.sec-card {
    background: var(--white);
    border: 1px solid var(--gray-200);
    border-radius: var(--radius);
    margin-bottom: 16px;
    overflow: hidden;
    box-shadow: 0 1px 4px rgba(0,0,0,.05);
    transition: box-shadow .18s;
}
.sec-card:hover { box-shadow: 0 4px 18px rgba(0,0,0,.09); }

.sec-head {
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 15px 20px;
    background: linear-gradient(90deg, #f8fafc 0%, #fff 100%);
    border-bottom: 1px solid var(--gray-100);
}

.sec-num {
    width: 32px; height: 32px;
    background: var(--navy);
    color: #fff;
    border-radius: 7px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: .78rem;
    font-weight: 800;
    flex-shrink: 0;
}

.sec-title {
    font-size: .87rem;
    font-weight: 700;
    color: var(--navy);
    flex: 1;
}

.sec-cnt {
    font-size: .68rem;
    font-weight: 700;
    color: var(--gray-400);
    background: var(--gray-100);
    padding: 3px 10px;
    border-radius: 20px;
    white-space: nowrap;
}

/* Doc rows */
.doc-list { list-style: none; }

.doc-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 11px 20px;
    border-bottom: 1px solid var(--gray-100);
    gap: 14px;
    transition: background .12s;
}
.doc-row:last-child { border-bottom: none; }
.doc-row:hover { background: #fafbff; }

.doc-name {
    font-size: .8rem;
    color: var(--gray-700);
    flex: 1;
    display: flex;
    align-items: center;
    gap: 8px;
}
.doc-name::before {
    content: '';
    display: block;
    width: 4px; height: 4px;
    background: var(--blue-mid);
    border-radius: 50%;
    flex-shrink: 0;
}

.btn-lihat {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 5px 14px;
    background: var(--blue);
    color: #fff;
    font-size: .72rem;
    font-weight: 700;
    border-radius: 6px;
    text-decoration: none;
    transition: background .15s, transform .12s;
    flex-shrink: 0;
}
.btn-lihat:hover { background: #1344b8; transform: translateY(-1px); }

/* ─── FOOTER ─── */
.footer {
    background: var(--navy);
    color: rgba(255,255,255,.65);
    padding: 36px 20px 20px;
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
    color: #fff;
    font-size: .75rem;
    font-weight: 800;
    letter-spacing: .06em;
    text-transform: uppercase;
    margin-bottom: 12px;
    padding-bottom: 8px;
    border-bottom: 2px solid rgba(255,255,255,.12);
}
.f-text { font-size: .78rem; line-height: 1.8; }
.f-list { list-style: none; }
.f-list li {
    font-size: .78rem;
    margin-bottom: 7px;
    display: flex;
    align-items: flex-start;
    gap: 8px;
}
.f-list li i { color: var(--blue-mid); margin-top: 2px; }
.f-list a { color: rgba(255,255,255,.65); text-decoration: none; }
.f-list a:hover { color: #fff; }
.footer-bottom {
    border-top: 1px solid rgba(255,255,255,.09);
    padding-top: 18px;
    text-align: center;
    font-size: .72rem;
    color: rgba(255,255,255,.38);
    max-width: 1280px;
    margin: 0 auto;
}

/* ─── RESPONSIVE ─── */
@media (max-width: 1024px) {
    .nav-menu { display: none; }
    .hamburger { display: block; }
    .page-body { grid-template-columns: 1fr; }
    .sidebar { position: static; }
    .footer-inner { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 640px) {
    .hero h1 { font-size: 1.3rem; }
    .footer-inner { grid-template-columns: 1fr; }
    .doc-row { flex-direction: column; align-items: flex-start; }
}
</style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="navbar-img-wrap">

        <!-- Logo (replika persis gambar yang diupload) -->
        <a href="#" class="navbar-brand">
            <div class="logo-box">
                <div class="logo-icon">
                    <i class="fa-solid fa-building-columns"></i>
                </div>
                <div class="logo-text-wrap">
                    <div style="display:flex;align-items:baseline;gap:0">
                        <span class="logo-main">Bapenda</span>
                        <span class="logo-jateng">Jateng</span>
                    </div>
                    <span class="logo-sub">Badan Pengelola Pendapatan Daerah</span>
                </div>
            </div>
        </a>

        <!-- NOTE: Ganti logo di atas dengan tag <img> setelah file gambar tersedia:
             <img src="/assets/img/logo-ppid.png" alt="Bapenda Jateng" style="height:54px;"> -->

        <!-- Desktop Menu -->
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="#" class="nav-link">PROFIL PPID <i class="fa-solid fa-chevron-down ch"></i></a>
                <ul class="dropdown">
                    <li><a href="#">Profil Badan Publik</a></li>
                    <li><a href="#">SK &amp; Profil PPID</a></li>
                    <li><a href="#">Peraturan IP</a></li>
                    <li><a href="#">Struktur Organisasi PPID</a></li>
                    <li><a href="#">LHKPN</a></li>
                    <li><a href="#">Prestasi</a></li>
                </ul>
            </li>
            <li class="nav-item active">
                <a href="#" class="nav-link">INFORMASI PUBLIK <i class="fa-solid fa-chevron-down ch"></i></a>
                <ul class="dropdown">
                    <li><a href="#">Definisi Informasi Publik</a></li>
                    <li><a href="#" style="color:#1a56db;font-weight:700">Informasi Wajib Berkala</a></li>
                    <li><a href="#">Informasi Setiap Saat</a></li>
                    <li><a href="#">Informasi Serta Merta</a></li>
                    <li><a href="#">Informasi Dikecualikan</a></li>
                    <li><a href="#">Daftar Informasi Publik</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">FORMULIR <i class="fa-solid fa-chevron-down ch"></i></a>
                <ul class="dropdown">
                    <li><a href="#">Permohonan Informasi</a></li>
                    <li><a href="#">Formulir Keberatan</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">KANAL ADUAN <i class="fa-solid fa-chevron-down ch"></i></a>
                <ul class="dropdown">
                    <li><a href="#">Pengaduan Online</a></li>
                    <li><a href="#">Tata Cara Pengaduan</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">PARTISIPASI PUBLIK <i class="fa-solid fa-chevron-down ch"></i></a>
                <ul class="dropdown">
                    <li><a href="#">Survei Kepuasan</a></li>
                    <li><a href="#">Konsultasi Publik</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">SOP <i class="fa-solid fa-chevron-down ch"></i></a>
                <ul class="dropdown">
                    <li><a href="#">SOP Pelayanan Informasi</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">KONTAK <i class="fa-solid fa-chevron-down ch"></i></a>
                <ul class="dropdown">
                    <li><a href="#">Lokasi Kantor</a></li>
                    <li><a href="#">Hubungi Kami</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">OPEN DATA</a>
            </li>
        </ul>

        <button class="hamburger" onclick="document.getElementById('mob').classList.toggle('open')">
            <span></span><span></span><span></span>
        </button>
    </div>

    <!-- Mobile menu -->
    <div id="mob" style="display:none;padding:12px 20px 16px;border-top:1px solid #eee">
        <a href="#" style="display:block;padding:9px 0;font-size:.82rem;font-weight:700;color:#444;text-decoration:none;border-bottom:1px solid #f1f5f9">PROFIL PPID</a>
        <a href="#" style="display:block;padding:9px 0;font-size:.82rem;font-weight:700;color:#1a56db;text-decoration:none;border-bottom:1px solid #f1f5f9">INFORMASI PUBLIK</a>
        <a href="#" style="display:block;padding:9px 0;font-size:.82rem;font-weight:700;color:#444;text-decoration:none;border-bottom:1px solid #f1f5f9">FORMULIR</a>
        <a href="#" style="display:block;padding:9px 0;font-size:.82rem;font-weight:700;color:#444;text-decoration:none;border-bottom:1px solid #f1f5f9">KANAL ADUAN</a>
        <a href="#" style="display:block;padding:9px 0;font-size:.82rem;font-weight:700;color:#444;text-decoration:none;border-bottom:1px solid #f1f5f9">PARTISIPASI PUBLIK</a>
        <a href="#" style="display:block;padding:9px 0;font-size:.82rem;font-weight:700;color:#444;text-decoration:none;border-bottom:1px solid #f1f5f9">SOP</a>
        <a href="#" style="display:block;padding:9px 0;font-size:.82rem;font-weight:700;color:#444;text-decoration:none;border-bottom:1px solid #f1f5f9">KONTAK</a>
        <a href="#" style="display:block;padding:9px 0;font-size:.82rem;font-weight:700;color:#444;text-decoration:none">OPEN DATA</a>
    </div>
    <script>
        var mb = document.getElementById('mob');
        document.querySelector('.hamburger').addEventListener('click', function(){
            mb.style.display = mb.style.display === 'none' ? 'block' : 'none';
        });
    </script>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="hero-inner">
        <div class="hero-chip">
            <i class="fa-solid fa-shield-halved"></i>
            Keterbukaan Informasi Publik
        </div>
        <h1>Layanan Informasi Publik</h1>
        <p>Akses dokumen dan informasi publik yang tersedia sesuai kategori yang telah ditetapkan.</p>
    </div>
</section>

<!-- PAGE BODY -->
<div class="page-body">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-box">
            <div class="sidebar-head">Kategori Informasi</div>
            <ul class="sidebar-list">
                <li class="on"><a href="#"><span class="dot"></span> Informasi Berkala</a></li>
                <li><a href="#"><span class="dot"></span> Informasi Setiap Saat</a></li>
                <li><a href="#"><span class="dot"></span> Informasi Serta Merta</a></li>
                <li><a href="#"><span class="dot"></span> Informasi Dikecualikan</a></li>
            </ul>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main">

        <div class="topbar">
            <h2>Informasi Berkala</h2>
            <span class="badge-count">40 Dokumen</span>
        </div>

        <!-- Section 1 -->
        <div class="sec-card">
            <div class="sec-head">
                <div class="sec-num">1</div>
                <div class="sec-title">Informasi tentang Profil Badan Publik</div>
                <span class="sec-cnt">9 dokumen</span>
            </div>
            <ul class="doc-list">
                <li class="doc-row"><span class="doc-name">Kedudukan / Domisili beserta Alamat Lengkap</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">Visi dan Misi</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">Tugas Pokok dan Fungsi</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">Struktur Organisasi, Tugas, Wewenang dan Fungsi</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">Profil Pejabat Struktural di Lingkungan Bapenda Jateng</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">Profil Pejabat Fungsional di Lingkungan Bapenda Jateng</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">Profil SDM di Lingkungan Bapenda Jateng</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">Laporan Harta Kekayaan Pejabat Negara (LHKPN)</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">Laporan Harta Kekayaan Aparatur Sipil Negara (LHKASN)</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
            </ul>
        </div>

        <!-- Section 2 -->
        <div class="sec-card">
            <div class="sec-head">
                <div class="sec-num">2</div>
                <div class="sec-title">Ringkasan Program &amp; Kegiatan TA 2026</div>
                <span class="sec-cnt">8 dokumen</span>
            </div>
            <ul class="doc-list">
                <li class="doc-row"><span class="doc-name">Kerangka Acuan Kerja (KAK)</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">Nama Program dan Kegiatan</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">Penanggung Jawab, Pelaksana Program dan Kegiatan</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">Target dan Capaian Program dan Kegiatan</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">Jadwal Pelaksanaan Program dan Kegiatan</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">Agenda Pelaksanaan Tugas Badan Publik</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">Penetapan Kinerja</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">Pelaksanaan Kegiatan Pendapatan Daerah</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
            </ul>
        </div>

        <!-- Section 3 -->
        <div class="sec-card">
            <div class="sec-head">
                <div class="sec-num">3</div>
                <div class="sec-title">Informasi Laporan Akuntabilitas Kinerja TA 2025</div>
                <span class="sec-cnt">2 dokumen</span>
            </div>
            <ul class="doc-list">
                <li class="doc-row"><span class="doc-name">Laporan Akuntabilitas Kinerja Instansi Pemerintah</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">Laporan Kinerja</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
            </ul>
        </div>

        <!-- Section 4 -->
        <div class="sec-card">
            <div class="sec-head">
                <div class="sec-num">4</div>
                <div class="sec-title">Informasi Mengenai Keuangan Badan Publik</div>
                <span class="sec-cnt">12 dokumen</span>
            </div>
            <ul class="doc-list">
                <li class="doc-row"><span class="doc-name">RKA Tahun Anggaran 2026</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">DPA Tahun Anggaran 2026</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">Laporan Perubahan Ekuitas Tahun 2025</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">Neraca Keuangan Tahun 2025</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">Catatan Atas Laporan Keuangan (CALK) Tahun 2025</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">Laporan Realisasi Anggaran Tahun 2025</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">Laporan Operasional Tahun 2025</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">Rekap Target APBD Tahun 2025</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">Laporan Perkembangan Pelaksanaan Kegiatan APBD TA 2025</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">Sumber Anggaran Tahun 2026</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">Progres Kegiatan dan Anggaran Tahun Anggaran 2026</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">Daftar Aset dan Inventaris Tahun 2025</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
            </ul>
        </div>

        <!-- Section 5 -->
        <div class="sec-card">
            <div class="sec-head">
                <div class="sec-num">5</div>
                <div class="sec-title">Ringkasan Laporan Akses Informasi Publik</div>
                <span class="sec-cnt">2 dokumen</span>
            </div>
            <ul class="doc-list">
                <li class="doc-row"><span class="doc-name">Register Permohonan Informasi Tahun 2025</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
                <li class="doc-row"><span class="doc-name">Laporan Tahunan PPID Pelaksana Tahun 2025</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
            </ul>
        </div>

        <!-- Section 6 -->
        <div class="sec-card">
            <div class="sec-head">
                <div class="sec-num">6</div>
                <div class="sec-title">Informasi Tata Cara Permohonan Informasi Publik</div>
                <span class="sec-cnt">1 dokumen</span>
            </div>
            <ul class="doc-list">
                <li class="doc-row"><span class="doc-name">Mekanisme Permohonan Informasi Publik</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
            </ul>
        </div>

        <!-- Section 7 -->
        <div class="sec-card">
            <div class="sec-head">
                <div class="sec-num">7</div>
                <div class="sec-title">Informasi tentang Tata Cara Pengaduan Penyalahgunaan Badan Publik</div>
                <span class="sec-cnt">1 dokumen</span>
            </div>
            <ul class="doc-list">
                <li class="doc-row"><span class="doc-name">Tata Cara Pengaduan Penyalahgunaan Wewenang Pejabat Badan Publik</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
            </ul>
        </div>

        <!-- Section 8 -->
        <div class="sec-card">
            <div class="sec-head">
                <div class="sec-num">8</div>
                <div class="sec-title">Pengumuman Pengadaan Barang &amp; Jasa</div>
                <span class="sec-cnt">1 dokumen</span>
            </div>
            <ul class="doc-list">
                <li class="doc-row"><span class="doc-name">Rencana Umum Pengadaan Barang dan Jasa Tahun 2026</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
            </ul>
        </div>

        <!-- Section 9 -->
        <div class="sec-card">
            <div class="sec-head">
                <div class="sec-num">9</div>
                <div class="sec-title">Informasi tentang Regulasi Badan Publik</div>
                <span class="sec-cnt">1 dokumen</span>
            </div>
            <ul class="doc-list">
                <li class="doc-row"><span class="doc-name">Informasi Regulasi yang Disahkan / Ditetapkan Tahun 2026</span><a href="#" class="btn-lihat"><i class="fa-solid fa-eye"></i> Lihat</a></li>
            </ul>
        </div>

    </main>
</div>

<!-- FOOTER -->
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
                <li><i class="fa-solid fa-phone"></i> <a href="#">(024) 123-456</a></li>
                <li><i class="fa-solid fa-envelope"></i> <a href="#">ppid@bapenda.jatengprov.go.id</a></li>
                <li><i class="fa-brands fa-whatsapp"></i> <a href="#">0811 2835 000</a></li>
            </ul>
        </div>
        <div>
            <div class="f-head">Tautan Cepat</div>
            <ul class="f-list">
                <li><i class="fa-solid fa-link"></i><a href="#">Portal Jawa Tengah</a></li>
                <li><i class="fa-solid fa-link"></i><a href="#">Data Jateng</a></li>
                <li><i class="fa-solid fa-link"></i><a href="#">e-PPID Jateng</a></li>
                <li><i class="fa-solid fa-link"></i><a href="#">Komisi Informasi Jateng</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; 2026 Badan Pengelola Pendapatan Daerah Provinsi Jawa Tengah. Semua hak dilindungi.
    </div>
</footer>

</body>
</html>