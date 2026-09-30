<?php
/**
 * Snippet: Resume Page (HUD)
 * Full-takeover resume dashboard for the "Resume" page (slug: resume).
 * White background + green accents, carbon copy of the hire-protocol HUD layout.
 * Guarded by is_page('resume') so nothing else is affected.
 */
add_action('template_redirect', function () {
    if (!is_page('resume')) {
        return;
    }
    status_header(200);
    nocache_headers();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script>
/* Desktop-site override: if the bolu_desktop cookie is set, force a desktop-width viewport. */
(function(){try{if(/(?:^|;\s*)bolu_desktop=1/.test(document.cookie)){var vp=document.querySelector('meta[name="viewport"]');if(vp)vp.setAttribute('content','width=1280');document.documentElement.className+=' force-desktop';}}catch(e){}})();
</script>
<title>Resume &mdash; Boluwatife Johnson</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
:root{
  --bg:#f6faf8;
  --card:#ffffff;
  --border:#d9e6de;
  --border-soft:#e7f0ea;
  --ink:#16211c;
  --body:#3c4a44;
  --dim:#75837d;
  --faint:#a9b6b0;
  --green:#17bb85;
  --green-dark:#0b8a5e;
  --green-soft:#e4f6ee;
  --bar-empty:#e6efe9;
}
*{margin:0;padding:0;box-sizing:border-box}
html{scroll-behavior:smooth}
body{
  font-family:'Martian Mono',ui-monospace,monospace;
  background:var(--bg);color:var(--ink);
  font-size:11px;font-weight:500;letter-spacing:.5px;line-height:1.6;
  -webkit-font-smoothing:antialiased;
}
a{color:inherit;text-decoration:none}
::selection{background:var(--green-soft)}

/* ---------- header ---------- */
.hud-header{
  position:sticky;top:0;z-index:60;
  display:flex;align-items:center;justify-content:space-between;
  height:48px;padding:0 16px;background:#fff;
  border-bottom:1px solid var(--border);
}
.brand{font-size:13px;font-weight:800;letter-spacing:1.5px}
.brand .exe{color:var(--green-dark)}
.hud-nav{display:flex;gap:20px}
.hud-nav a{font-size:10px;font-weight:500;letter-spacing:1.5px;color:var(--dim);text-transform:uppercase}
.hud-nav a:hover{color:var(--green-dark)}
.hud-profile{display:flex;align-items:center;gap:14px;font-size:10px;letter-spacing:1px;color:var(--dim)}
.hud-profile .picons{display:flex;gap:10px;font-size:15px;color:var(--faint)}

/* ---------- layout ---------- */
.hud-main{
  display:flex;gap:12px;padding:14px;
  max-width:1280px;margin:0 auto;
  height:calc(100dvh - 48px - 52px);
  min-height:480px;
}
.col{display:flex;flex-direction:column;gap:12px;overflow-y:auto;scrollbar-width:none;padding-bottom:90px}
.col::-webkit-scrollbar{display:none}
.col1{flex:1.12}.col2{flex:1}.col3{flex:1.05}.col4{flex:1}

/* ---------- cards ---------- */
.card{background:var(--card);border:1px solid var(--border);border-radius:4px;padding:10px 12px}
.card-head{
  display:flex;align-items:center;justify-content:space-between;
  font-size:11px;font-weight:600;letter-spacing:2px;text-transform:uppercase;
  padding-bottom:8px;margin-bottom:10px;border-bottom:1px dashed var(--border);
}
.card-head .ico{color:var(--faint);font-size:14px;font-weight:400}
.card-head .tag{font-size:9px;letter-spacing:1px;color:var(--dim);font-weight:500}
.rowline{display:flex;justify-content:space-between;gap:10px;padding:7px 0;border-bottom:1px dashed var(--border-soft);font-size:10px}
.rowline:last-child{border-bottom:none}
.rowline .k{color:var(--dim);letter-spacing:1px}
.rowline .v{color:var(--ink);text-align:right}
.tbd{color:var(--faint);letter-spacing:1px}

/* name card */
.pname{font-size:15px;font-weight:800;letter-spacing:1px;display:flex;justify-content:space-between;align-items:flex-start}
.pname .cross{color:var(--faint);font-weight:400;font-size:13px}
.prole{margin-top:8px;font-size:10px;color:var(--body);letter-spacing:1px;line-height:1.9}
.pstatus{display:flex;justify-content:space-between;margin-top:10px;padding-top:8px;border-top:1px dashed var(--border-soft);font-size:9px;letter-spacing:1px;color:var(--dim)}
.dot{display:inline-block;width:7px;height:7px;border-radius:50%;background:var(--green);margin-right:6px;vertical-align:1px}
.ok{color:var(--green-dark);font-weight:600}

/* bio */
.bio-video{border-radius:4px;overflow:hidden;border:1px solid var(--border-soft);margin-bottom:10px;background:#000}
.bio-video video{display:block;width:100%;aspect-ratio:4/4.4;object-fit:cover}
.bio-text{font-size:10px;color:var(--body);letter-spacing:.5px;line-height:1.8;text-transform:uppercase}
.bio-end{text-align:right;color:var(--faint);font-size:9px;letter-spacing:1px;margin-top:8px}

/* clock */
.clock-card{display:flex;justify-content:space-between;align-items:center}
.clock-label{font-size:9px;color:var(--dim);letter-spacing:1px;line-height:1.9}
.clock-time{font-size:26px;font-weight:500;font-variant-numeric:tabular-nums;letter-spacing:1px}

/* mini strip */
.mstrip{display:flex;gap:8px}
.mcell{flex:1;border:1px solid var(--border-soft);border-radius:4px;padding:8px 6px;text-align:center}
.mcell .mk{font-size:8px;color:var(--dim);letter-spacing:1px}
.mcell .mv{font-size:9px;font-weight:600;letter-spacing:1px;margin-top:4px}

/* timeline */
.tl{position:relative;padding-left:22px}
.tl::before{content:'';position:absolute;left:6px;top:8px;bottom:8px;width:1px;background:var(--border)}
.tl-item{position:relative;padding-bottom:16px}
.tl-item:last-child{padding-bottom:2px}
.tl-item::before{content:'';position:absolute;left:-20px;top:5px;width:9px;height:9px;border-radius:50%;border:2px solid var(--green);background:#fff}
.tl-meta{display:flex;justify-content:space-between;font-size:9px;color:var(--dim);letter-spacing:1px;margin-bottom:4px}
.tl-title{font-size:11px;font-weight:700;letter-spacing:.5px}
.tl-sub{font-size:10px;color:var(--dim);letter-spacing:1px}

/* achievements grid */
.ach-grid{display:grid;grid-template-columns:1fr 1fr;gap:8px}
.ach{border:1px solid var(--border-soft);border-radius:4px;padding:10px;text-align:center}
.ach .aico{font-size:18px;color:var(--green-dark)}
.ach .an{font-size:9px;font-weight:700;letter-spacing:1px;margin-top:6px}
.ach .ac{font-size:8px;color:var(--dim);letter-spacing:1px;margin-top:2px}

/* skills */
.skill{display:flex;justify-content:space-between;align-items:center;padding:5px 0}
.skill .sn{font-size:10px;letter-spacing:1px;color:var(--body)}
.bars{display:flex;gap:4px}
.seg{width:14px;height:6px;border-radius:1px;background:var(--bar-empty)}
.seg.on{background:var(--green)}

/* projects */
.proj{display:flex;align-items:center;gap:10px;padding:9px 0;border-bottom:1px dashed var(--border-soft)}
.proj:last-child{border-bottom:none}
.proj .pbox{width:36px;height:36px;flex:0 0 36px;border:1px solid var(--border);border-radius:4px;display:flex;align-items:center;justify-content:center;font-size:16px;color:var(--green-dark)}
.proj .pn{font-size:10px;font-weight:700;letter-spacing:.5px}
.proj .ps{font-size:9px;color:var(--dim);letter-spacing:1px}
.proj .py{margin-left:auto;font-size:9px;color:var(--dim)}
.proj .pa{color:var(--faint);font-size:12px}
a.proj:hover .pn{color:var(--green-dark)}

/* activity feed */
.feed-row{padding:7px 0;border-bottom:1px dashed var(--border-soft);font-size:10px;letter-spacing:1px;color:var(--body)}
.feed-row:last-of-type{border-bottom:none}
.feed-row .gt{color:var(--green-dark);font-weight:700;margin-right:8px}
.feed-end{text-align:center;color:var(--faint);font-size:9px;letter-spacing:2px;margin-top:8px}
.pulse{display:inline-block;width:7px;height:7px;border-radius:50%;background:var(--green);margin-right:6px;animation:pl 1.6s infinite}
@keyframes pl{0%,100%{opacity:1}50%{opacity:.25}}
.live{font-size:9px;letter-spacing:1px;color:var(--green-dark);font-weight:600}

/* access card */
.access{display:flex;justify-content:space-between;align-items:center}
.chip{border:1px solid var(--green);color:var(--green-dark);border-radius:999px;padding:5px 12px;font-size:9px;font-weight:600;letter-spacing:1.5px}
.logged{text-align:right;font-size:8px;color:var(--dim);letter-spacing:1px;line-height:1.9}
.logged b{display:block;color:var(--green-dark);font-size:9px}

/* tools */
.tools{display:grid;grid-template-columns:repeat(4,1fr);gap:8px}
.tool{border:1px solid var(--border-soft);border-radius:4px;padding:12px 4px;text-align:center}
.tool .tico{font-size:18px}
.tool .tico img{width:22px;height:22px;display:block;margin:0 auto}
.tool .tn{font-size:8px;letter-spacing:1px;color:var(--dim);margin-top:6px}

/* contact rows */
.crow{display:flex;align-items:center;gap:10px;padding:8px 0;border-bottom:1px dashed var(--border-soft);font-size:10px}
.crow:last-of-type{border-bottom:none}
.crow .cico{color:var(--faint);font-size:13px;width:18px;text-align:center}
.crow .cl{color:var(--dim);letter-spacing:1px}
.crow .cv{margin-left:auto;letter-spacing:.5px}
.mini-tag{font-size:8px;letter-spacing:1px;color:var(--green-dark);border:1px solid var(--green);border-radius:3px;padding:2px 6px;margin-left:8px;white-space:nowrap}
.bigbtn{display:block;margin-top:10px;border:1px solid var(--border);border-radius:4px;padding:12px;text-align:center;font-size:10px;font-weight:600;letter-spacing:2px;color:var(--body)}
.bigbtn:hover{border-color:var(--green);color:var(--green-dark)}

/* ---------- status bar ---------- */
.hud-status{
  position:fixed;left:0;right:0;bottom:0;z-index:60;height:52px;
  background:#fff;border-top:1px solid var(--border);
  display:flex;align-items:stretch;font-size:9px;letter-spacing:1px;
}
.stat{padding:8px 16px;border-right:1px solid var(--border-soft);display:flex;flex-direction:column;justify-content:center;gap:2px}
.stat .sk{color:var(--faint);font-size:8px}
.stat .sv{color:var(--body);font-weight:600;white-space:nowrap}
.classif{margin-left:auto;display:flex;align-items:center;gap:10px;padding:0 16px;border-left:1px solid var(--border-soft)}
.classif .ck{color:var(--faint);font-size:8px}
.classif .cvv{font-weight:700;letter-spacing:1px}
.brackets{color:var(--green-dark);font-weight:400}
.barcode{width:110px;margin:10px 4px;background:repeating-linear-gradient(90deg,var(--ink) 0 2px,transparent 2px 5px,var(--ink) 5px 8px,transparent 8px 10px,var(--ink) 10px 11px,transparent 11px 15px);opacity:.75}
.hire-btn{display:flex;align-items:center;background:#fff;border:none;border-left:3px solid var(--green);padding:0 22px;font-family:inherit;font-size:10px;font-weight:700;letter-spacing:2px;color:var(--ink);cursor:pointer;white-space:nowrap}
.hire-btn:hover{background:var(--green-soft);color:var(--green-dark)}
.view-toggle{background:none;border:1px solid var(--border);border-radius:999px;padding:4px 10px;font-family:inherit;font-size:9px;letter-spacing:1.5px;color:var(--dim);cursor:pointer;white-space:nowrap}
.view-toggle:hover{border-color:var(--green);color:var(--green-dark)}

/* ---------- responsive ---------- */
@media (max-width:1199px){
  .hud-main{flex-wrap:wrap;height:auto}
  .col{flex:1 1 44%;overflow:visible;padding-bottom:0}
}
@media (max-width:809px){
  .hud-nav{display:none}
  .hud-main{flex-direction:column;height:auto}
  .col{overflow:visible;padding-bottom:0}
  .hud-status{position:static;flex-wrap:wrap;height:auto}
  .stat{flex:1 1 40%}
  .barcode{display:none}
  .hire-btn{width:100%;justify-content:center;padding:14px}
  .tools{grid-template-columns:repeat(3,1fr)}
}
</style>
</head>
<body>

<header class="hud-header">
  <div class="brand">CV<span class="exe">.EXE</span></div>
  <nav class="hud-nav">
    <a href="#personal-data">Personal Data</a>
    <a href="#experience">Experience</a>
    <a href="#education">Education</a>
    <a href="#projects">Projects</a>
    <a href="#achievements">Achievements</a>
    <a href="#contact">Contact</a>
  </nav>
  <div class="hud-profile">
    <span>PROFILE ID: BOLU-2026</span>
    <span class="picons"><span>&#9786;</span><span>&#9783;</span><span>&#12336;</span></span>
    <button class="view-toggle" id="view-toggle" type="button">DESKTOP SITE</button>
  </div>
</header>

<main class="hud-main">

  <!-- COLUMN 1 -->
  <div class="col col1">

    <section class="card" id="personal-data">
      <div class="pname"><span>JOHNSON, BOLUWATIFE, PMP</span><span class="cross">&#10010;</span></div>
      <div class="prole">TECHNICAL PROJECT MANAGER / 3D ENVIRONMENT ARTIST<br>BASED IN WISCONSIN, USA</div>
      <div class="pstatus">
        <span><span class="dot"></span><span class="ok">STATUS: ACTIVE</span></span>
        <span>UPDATED: 29.09.2026</span>
      </div>
    </section>

    <section class="card">
      <div class="card-head"><span>Biography</span><span class="ico">&#9786;</span></div>
      <div class="bio-video">
        <video autoplay muted loop playsinline preload="metadata"
          poster="https://bolu.info/wp-content/uploads/2026/09/media-generation-bolu-typing-poster-v8-seamless.webp">
          <source src="https://bolu.info/wp-content/uploads/2026/09/media-generation-bolu-typing-v8-seamless.mp4" type="video/mp4">
        </video>
      </div>
      <p class="bio-text">I'M AN ENGINEER AND AN AUTHOR. I LOVE MAKING 3D ENVIRONMENTS AND READING.</p>
      <div class="bio-end">// END OF BIO</div>
    </section>

    <section class="card clock-card">
      <div class="clock-label">LOCAL TIME<br><span id="tz-label">GMT</span></div>
      <div class="clock-time" id="hud-clock">00:00:00</div>
    </section>

    <section class="card">
      <div class="card-head"><span>Personal Information</span><span class="ico">&#9432;</span></div>
      <div class="rowline"><span class="k">LOCATION</span><span class="v">WISCONSIN, USA</span></div>
      <div class="rowline"><span class="k">EMAIL</span><span class="v">JOHNSONBOLU5@GMAIL.COM</span></div>
      <div class="rowline"><span class="k">WEBSITE</span><span class="v">BOLU.INFO</span></div>
      <div class="rowline"><span class="k">PHONE</span><span class="v">+1 252 361 5857</span></div>
      <div class="rowline"><span class="k">LANGUAGES</span><span class="v">ENGLISH &middot; YORUBA &middot; JAPANESE</span></div>
      <div class="rowline"><span class="k">DATE OF BIRTH</span><span class="v">MAY 09</span></div>
      <div class="rowline"><span class="k">NATIONALITY</span><span class="v tbd">TBD</span></div>
    </section>

    <section class="mstrip">
      <div class="mcell"><div class="mk">DATA</div><div class="mv">ENCRYPTED</div></div>
      <div class="mcell"><div class="mk">CV SYSTEMS</div><div class="mv">VERSION 1.0</div></div>
      <div class="mcell"><div class="mk">ACCESS LEVEL</div><div class="mv">PUBLIC</div></div>
    </section>

  </div>

  <!-- COLUMN 2 -->
  <div class="col col2">

    <section class="card" id="experience">
      <div class="card-head"><span>Experience Timeline</span><span class="ico">&#128188;</span></div>
      <div class="tl">
        <div class="tl-item">
          <div class="tl-meta"><span>2026 &mdash; PRESENT</span><span>WISCONSIN, USA</span></div>
          <div class="tl-title">TECHNICAL PROJECT MANAGER</div>
          <div class="tl-sub">SCHNEIDER ELECTRIC</div>
        </div>
        <div class="tl-item">
          <div class="tl-meta"><span>2024 &mdash; 2026</span><span>TIMNATH, CO</span></div>
          <div class="tl-title">SITE LEAD | APPLICATIONS DESIGN ENGINEER &mdash; SCADA</div>
          <div class="tl-sub">SCHNEIDER ELECTRIC</div>
        </div>
        <div class="tl-item">
          <div class="tl-meta"><span>PRIOR</span><span>&nbsp;</span></div>
          <div class="tl-title">APPLICATION DESIGN ENGINEER</div>
          <div class="tl-sub">SCHNEIDER ELECTRIC</div>
        </div>
      </div>
    </section>

    <section class="card" id="education">
      <div class="card-head"><span>Education</span><span class="ico">&#127891;</span></div>
      <div class="rowline"><span class="k">M.S. CYBERSECURITY</span><span class="v">LIBERTY UNIVERSITY &middot; 2026 &mdash; PRESENT</span></div>
      <div class="rowline"><span class="k">B.S. COMPUTER SCIENCE</span><span class="v">NC WESLEYAN UNIVERSITY &middot; 2018 &mdash; 2020</span></div>
      <div class="rowline"><span class="k">A.A. GENERAL ELECTIVES</span><span class="v">PITT COMMUNITY COLLEGE &middot; 2014 &mdash; 2016</span></div>
    </section>

    <section class="card" id="achievements">
      <div class="card-head"><span>Achievements</span><span class="ico">&#127942;</span></div>
      <div class="ach-grid">
        <div class="ach"><div class="aico">&#9734;</div><div class="an">SIGMA BETA DELTA</div><div class="ac">INTL HONOR SOCIETY &middot; MAR 2020</div></div>
        <div class="ach"><div class="aico">&#9734;</div><div class="an">NCICU ETHICS COMPETITION</div><div class="ac">SEMI-FINALIST &middot; FEB 2020</div></div>
        <div class="ach"><div class="aico">&#9734;</div><div class="an">DESK WORKER OF THE YEAR</div><div class="ac">NC WESLEYAN &middot; APR 2019</div></div>
      </div>
    </section>

  </div>

  <!-- COLUMN 3 -->
  <div class="col col3">

    <section class="card">
      <div class="card-head"><span>Skills Matrix</span><span class="tag">LEVEL: DRAFT</span></div>
      <div class="skill"><span class="sn">PROJECT MANAGEMENT</span><span class="bars" data-level="16"></span></div>
      <div class="skill"><span class="sn">3D MODELING / UNREAL ENGINE</span><span class="bars" data-level="15"></span></div>
      <div class="skill"><span class="sn">SCADA SYSTEMS</span><span class="bars" data-level="14"></span></div>
      <div class="skill"><span class="sn">EPMS COMMISSIONING</span><span class="bars" data-level="14"></span></div>
      <div class="skill"><span class="sn">TECHNICAL WRITING</span><span class="bars" data-level="13"></span></div>
      <div class="skill"><span class="sn">WORDPRESS / WEB</span><span class="bars" data-level="12"></span></div>
    </section>

    <section class="card" id="projects">
      <div class="card-head"><span>Selected Projects</span><span class="ico">&#9744;</span></div>
      <a class="proj" href="https://www.youtube.com/@johnsonbolu1" target="_blank" rel="noopener">
        <span class="pbox">&#127918;</span>
        <span><span class="pn">VIRTUAL BEDROOM II: R&Oslash;LDAL COCOON</span><br><span class="ps">UNREAL ENGINE ENVIRONMENT</span></span>
        <span class="py">&mdash;</span><span class="pa">&nearr;</span>
      </a>
      <a class="proj" href="https://www.youtube.com/@johnsonbolu1" target="_blank" rel="noopener">
        <span class="pbox">&#127918;</span>
        <span><span class="pn">GOTHIC CATHEDRAL, S&Oslash;RLANDET</span><br><span class="ps">UNREAL ENGINE ENVIRONMENT</span></span>
        <span class="py">&mdash;</span><span class="pa">&nearr;</span>
      </a>
      <a class="proj" href="https://www.youtube.com/@johnsonbolu1" target="_blank" rel="noopener">
        <span class="pbox">&#127918;</span>
        <span><span class="pn">SWISS ALPS SOCCER FACILITY</span><br><span class="ps">UNREAL ENGINE ENVIRONMENT</span></span>
        <span class="py">&mdash;</span><span class="pa">&nearr;</span>
      </a>
      <a class="proj" href="https://www.youtube.com/@johnsonbolu1" target="_blank" rel="noopener">
        <span class="pbox">&#127918;</span>
        <span><span class="pn">YOSHIDA'S ART GALLERY</span><br><span class="ps">UNREAL ENGINE ENVIRONMENT</span></span>
        <span class="py">&mdash;</span><span class="pa">&nearr;</span>
      </a>
    </section>

    <section class="card">
      <div class="card-head"><span>Activity Feed</span><span class="live"><span class="pulse"></span>LIVE FEED</span></div>
      <div class="feed-row"><span class="gt">&gt;</span>BOLU.INFO REDESIGN</div>
      <div class="feed-row"><span class="gt">&gt;</span>UNREAL ENGINE ENVIRONMENTS</div>
      <div class="feed-row"><span class="gt">&gt;</span>NOVEL: ALL THAT AVAILS IS FLIGHT</div>
      <div class="feed-row"><span class="gt">&gt;</span>EPMS COMMISSIONING &mdash; MKE16 / MKE17</div>
      <div class="feed-end">END OF FEED</div>
    </section>

  </div>

  <!-- COLUMN 4 -->
  <div class="col col4">

    <section class="card access">
      <span class="chip">&#9673; FULL ACCESS GRANTED</span>
      <span class="logged">LOGGED IN AS<b>GUEST</b></span>
    </section>

    <section class="card">
      <div class="card-head"><span>Tools &amp; Technologies</span><span class="ico">&#128736;</span></div>
      <div class="tools">
        <div class="tool"><div class="tico"><img src="https://upload.wikimedia.org/wikipedia/commons/0/0c/Blender_logo_no_text.svg" alt="Blender" loading="lazy"></div><div class="tn">BLENDER</div></div>
        <div class="tool"><div class="tico"><img src="https://upload.wikimedia.org/wikipedia/commons/d/da/Unreal_Engine_Logo.svg" alt="Unreal Engine" loading="lazy"></div><div class="tn">UNREAL ENGINE</div></div>
        <div class="tool"><div class="tico"><img src="https://web.archive.org/web/20240101203315im_/https://damassets.autodesk.net/content/dam/autodesk/www/product-imagery/badge-75x75/mudbox-badge-75x75.png" alt="Mudbox" loading="lazy"></div><div class="tn">MUDBOX</div></div>
        <div class="tool"><div class="tico"><img src="https://upload.wikimedia.org/wikipedia/commons/9/95/ZBrush_icon_new.svg" alt="ZBrush" loading="lazy"></div><div class="tn">ZBRUSH</div></div>
        <div class="tool"><div class="tico"><img src="https://upload.wikimedia.org/wikipedia/commons/0/0f/Autodesk_Maya_version_2023_icon.jpg" alt="Autodesk Maya" loading="lazy"></div><div class="tn">AUTODESK MAYA</div></div>
        <div class="tool"><div class="tico"><img src="https://upload.wikimedia.org/wikipedia/commons/b/ba/Autodesk_3ds_Max_Logo.svg" alt="Autodesk 3ds Max" loading="lazy"></div><div class="tn">AUTODESK 3DS MAX</div></div>
        <div class="tool"><div class="tico"><img src="https://upload.wikimedia.org/wikipedia/commons/c/c6/Autodesk_Revit_Logo.svg" alt="Autodesk Revit" loading="lazy"></div><div class="tn">AUTODESK REVIT</div></div>
        <div class="tool"><div class="tico"><img src="https://upload.wikimedia.org/wikipedia/commons/d/dc/Cinema_4D_Logo.svg" alt="Cinema 4D" loading="lazy"></div><div class="tn">CINEMA 4D</div></div>
        <div class="tool"><div class="tico"><img src="https://upload.wikimedia.org/wikipedia/commons/9/90/DaVinci_Resolve_17_logo.svg" alt="DaVinci Resolve" loading="lazy"></div><div class="tn">DAVINCI RESOLVE</div></div>
        <div class="tool"><div class="tico"><img src="https://upload.wikimedia.org/wikipedia/commons/4/40/Adobe_Premiere_Pro_CC_icon.svg" alt="Premiere Pro" loading="lazy"></div><div class="tn">PREMIERE PRO</div></div>
        <div class="tool"><div class="tico"><img src="https://upload.wikimedia.org/wikipedia/commons/e/e3/Adobe_Animate_CC_icon.svg" alt="Adobe Animate" loading="lazy"></div><div class="tn">ADOBE ANIMATE</div></div>
        <div class="tool"><div class="tico"><img src="https://upload.wikimedia.org/wikipedia/commons/f/fb/Adobe_Illustrator_CC_icon.svg" alt="Adobe Illustrator" loading="lazy"></div><div class="tn">ADOBE ILLUSTRATOR</div></div>
        <div class="tool"><div class="tico"><img src="https://upload.wikimedia.org/wikipedia/commons/a/af/Adobe_Photoshop_CC_icon.svg" alt="Adobe Photoshop" loading="lazy"></div><div class="tn">ADOBE PHOTOSHOP</div></div>
        <div class="tool"><div class="tico"><img src="https://api.iconify.design/thesvg-color:substance-3d-painter.svg" alt="Substance 3D Painter" loading="lazy"></div><div class="tn">ADOBE SUBSTANCE PAINTER</div></div>
        <div class="tool"><div class="tico"><img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Adobe_Dimension_CC_2026_icon.svg" alt="Adobe Dimension" loading="lazy"></div><div class="tn">ADOBE DIMENSION</div></div>
      </div>
    </section>

    <section class="card">
      <div class="card-head"><span>Certifications</span><span class="ico">&#127895;</span></div>
      <div class="rowline"><span class="k">AWS SOLUTIONS ARCHITECT &mdash; ASSOCIATE</span><span class="v">AMAZON WEB SERVICES &middot; MAY 2026</span></div>
      <div class="rowline"><span class="k">SC-100 CYBERSECURITY ARCHITECT EXPERT</span><span class="v">MICROSOFT &middot; MAY 2026</span></div>
      <div class="rowline"><span class="k">SC-300 IDENTITY &amp; ACCESS ADMIN ASSOCIATE</span><span class="v">MICROSOFT &middot; MAY 2025</span></div>
      <div class="rowline"><span class="k">COMPTIA SECURITYX</span><span class="v">COMPTIA &middot; APR 2026</span></div>
      <div class="rowline"><span class="k">COMPTIA CYSA+</span><span class="v">COMPTIA &middot; MAR 2026</span></div>
      <div class="rowline"><span class="k">COMPTIA SECURITY+</span><span class="v">COMPTIA &middot; FEB 2026</span></div>
      <div class="rowline"><span class="k">PROJECT MANAGEMENT PROFESSIONAL (PMP)</span><span class="v">PMI &middot; OCT 2025</span></div>
      <div class="rowline"><span class="k">ECOSTRUXURE POWER SCADA OPERATION</span><span class="v">SCHNEIDER ELECTRIC &middot; MAR 2024</span></div>
      <div class="rowline"><span class="k">ECOSTRUXURE POWER MONITORING EXPERT</span><span class="v">SCHNEIDER ELECTRIC &middot; MAR 2024</span></div>
      <div class="rowline"><span class="k">OSHA 10-HOUR</span><span class="v">OSHA SAFETY TRAINING INST. &middot; MAY 2026</span></div>
      <div class="rowline"><span class="k">COMPTIA A+</span><span class="v">COMPTIA &middot; MAY 2017</span></div>
    </section>

    <section class="card" id="contact">
      <div class="card-head"><span>Contact Protocol</span><span class="ico">&#9742;</span></div>
      <div class="rowline" style="border:none;padding:2px 0 8px"><span class="k">CHANNELS</span><span class="v tbd">&nbsp;</span></div>
      <div class="crow"><span class="cico">&#9993;</span><span class="cl">EMAIL</span><span class="cv">JOHNSONBOLU5@GMAIL.COM</span></div>
      <div class="crow"><span class="cico">&#9654;</span><span class="cl">YOUTUBE</span><span class="cv">@JOHNSONBOLU1</span><span class="mini-tag">VERIFIED</span></div>
      <div class="crow"><span class="cico">&#128187;</span><span class="cl">GITHUB</span><span class="cv">/JOHNSONBOLU5</span><span class="mini-tag">VERIFIED</span></div>
      <div class="crow"><span class="cico">&#128101;</span><span class="cl">LINKEDIN</span><span class="cv">LINKEDIN.COM/IN/BOLUWATIFE-JOHNSON</span></div>
      <a class="bigbtn" href="https://bolu.info/contact/">&#128274; SECURE MESSAGE PROTOCOL INITIATED</a>
    </section>

  </div>

</main>

<footer class="hud-status">
  <div class="stat"><span class="sk">/SYS/SECURITY</span><span class="sv"><span class="dot"></span>FIREWALL ACTIVE</span></div>
  <div class="stat"><span class="sk">/SYSTEM/STATUS</span><span class="sv"><span class="dot"></span>ALL SYSTEMS OPERATIONAL</span></div>
  <div class="classif"><span class="ck">CLASSIFICATION</span><span class="cvv"><span class="brackets">[</span> PUBLIC &mdash; SHARE FREELY <span class="brackets">]</span></span></div>
  <div class="barcode"></div>
  <a class="hire-btn" href="https://bolu.info/contact/">INITIATE HIRING PROCESS</a>
</footer>

<script>
(function(){
  // live clock
  function tick(){
    var el = document.getElementById('hud-clock');
    if(!el) return;
    var d = new Date();
    var p = function(n){ return (n<10?'0':'')+n; };
    el.textContent = p(d.getHours())+':'+p(d.getMinutes())+':'+p(d.getSeconds());
    var off = -d.getTimezoneOffset()/60;
    var lbl = document.getElementById('tz-label');
    if(lbl) lbl.textContent = 'GMT '+(off>=0?'+':'')+off;
  }
  tick(); setInterval(tick, 1000);
  // desktop-site toggle (shared bolu_desktop cookie with the rest of the site)
  var vt=document.getElementById('view-toggle');
  function isD(){return /(?:^|;\s*)bolu_desktop=1/.test(document.cookie);}
  if(vt){
    vt.textContent=isD()?'MOBILE SITE':'DESKTOP SITE';
    vt.addEventListener('click',function(){
      document.cookie=isD()?'bolu_desktop=; path=/; max-age=0':'bolu_desktop=1; path=/; max-age=2592000';
      location.reload();
    });
  }

  // skill bars: 18 segments
  document.querySelectorAll('.bars').forEach(function(bar){
    var level = parseInt(bar.getAttribute('data-level')||'0', 10);
    for(var i=0;i<18;i++){
      var s = document.createElement('span');
      s.className = 'seg'+(i<level?' on':'');
      bar.appendChild(s);
    }
  });
})();
</script>

</body>
  <style>
/* 2026-09-29 patch: cert logos + tools grid overflow fix */
.cert-logo{height:24px;width:auto;vertical-align:middle;margin-right:8px}
.tools{grid-template-columns:repeat(auto-fit,minmax(72px,1fr))!important}
.tool{min-width:0}
@media(min-width:1200px){.tools{grid-template-columns:repeat(4,1fr)!important}}
</style>
<script>
(function(){
var U='https://bolu.info/wp-content/uploads/2026/09/';
var LG={aws:U+'aws-final.png',ms:U+'microsoft-final.png',ct:U+'comptia.png',pmi:U+'pmi-final.png',se:U+'schneider.png',osha:U+'osha-final.jpg'};
function keyFor(n){
if(n.indexOf('AWS ')===0)return['aws','AWS'];
if(n.indexOf('SC-')===0)return['ms','Microsoft'];
if(n.indexOf('COMPTIA')===0)return['ct','CompTIA'];
if(n.indexOf('PROJECT MANAGEMENT PROFESSIONAL')===0)return['pmi','PMI'];
if(n.indexOf('ECOSTRUXURE')===0)return['se','Schneider Electric'];
if(n.indexOf('OSHA')===0)return['osha','OSHA'];
return null;
}
var cards=document.querySelectorAll('.card');
for(var i=0;i<cards.length;i++){
var hd=cards[i].querySelector('.card-head span');
if(!hd||hd.textContent.trim()!=='Certifications')continue;
var rows=cards[i].querySelectorAll('.rowline');
for(var j=0;j<rows.length;j++){
if(rows[j].querySelector('.cert-logo'))continue;
var k=rows[j].querySelector('.k');
if(!k)continue;
var m=keyFor(k.textContent.trim());
if(!m)continue;
var im=document.createElement('img');
im.className='cert-logo';
im.src=LG[m[0]];
im.alt=m[1]+' logo';
im.setAttribute('loading','lazy');
k.insertBefore(im,k.firstChild);
}
}
})();
</script>
  <script>
/* 2026-09-29 patch: school logos for Education card */
(function(){
var U='https://bolu.info/wp-content/uploads/2026/09/';
var LG={lu:U+'liberty2.png',ncw:U+'ncwesleyan.png',pcc:U+'pittcc-final.png'};
function keyFor(n){
if(n.indexOf('M.S. CYBERSECURITY')===0)return['lu','Liberty University'];
if(n.indexOf('B.S. COMPUTER SCIENCE')===0)return['ncw','NC Wesleyan'];
if(n.indexOf('A.A. GENERAL ELECTIVES')===0)return['pcc','Pitt Community College'];
return null;
}
var cards=document.querySelectorAll('.card');
for(var i=0;i<cards.length;i++){
var hd=cards[i].querySelector('.card-head span');
if(!hd||hd.textContent.trim()!=='Education')continue;
var rows=cards[i].querySelectorAll('.rowline');
for(var j=0;j<rows.length;j++){
if(rows[j].querySelector('.cert-logo'))continue;
var k=rows[j].querySelector('.k');
if(!k)continue;
var m=keyFor(k.textContent.trim());
if(!m)continue;
var im=document.createElement('img');
im.className='cert-logo';
im.src=LG[m[0]];
im.alt=m[1]+' logo';
im.setAttribute('loading','lazy');
k.insertBefore(im,k.firstChild);
}
}
})();
</script>
</html>
    <?php
    exit;
});
