<?php
require_once("/var/www/developer.wave.io/htdocs/functions.php");

if(!isLoggedIn()) {
  redirect(DOC_SERVER."/?a=login");
}
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Wave API Examples</title>

    <style>
      .highlight table td { padding: 5px; }
.highlight table pre { margin: 0; }
.highlight .gh {
  color: #999999;
}
.highlight .sr {
  color: #f6aa11;
}
.highlight .go {
  color: #888888;
}
.highlight .gp {
  color: #555555;
}
.highlight .gs {
}
.highlight .gu {
  color: #aaaaaa;
}
.highlight .nb {
  color: #f6aa11;
}
.highlight .cm {
  color: #75715e;
}
.highlight .cp {
  color: #75715e;
}
.highlight .c1 {
  color: #75715e;
}
.highlight .cs {
  color: #75715e;
}
.highlight .c, .highlight .cd {
  color: #75715e;
}
.highlight .err {
  color: #960050;
}
.highlight .gr {
  color: #960050;
}
.highlight .gt {
  color: #960050;
}
.highlight .gd {
  color: #49483e;
}
.highlight .gi {
  color: #49483e;
}
.highlight .ge {
  color: #49483e;
}
.highlight .kc {
  color: #66d9ef;
}
.highlight .kd {
  color: #66d9ef;
}
.highlight .kr {
  color: #66d9ef;
}
.highlight .no {
  color: #66d9ef;
}
.highlight .kt {
  color: #66d9ef;
}
.highlight .mf {
  color: #ae81ff;
}
.highlight .mh {
  color: #ae81ff;
}
.highlight .il {
  color: #ae81ff;
}
.highlight .mi {
  color: #ae81ff;
}
.highlight .mo {
  color: #ae81ff;
}
.highlight .m, .highlight .mb, .highlight .mx {
  color: #ae81ff;
}
.highlight .sc {
  color: #ae81ff;
}
.highlight .se {
  color: #ae81ff;
}
.highlight .ss {
  color: #ae81ff;
}
.highlight .sd {
  color: #e6db74;
}
.highlight .s2 {
  color: #e6db74;
}
.highlight .sb {
  color: #e6db74;
}
.highlight .sh {
  color: #e6db74;
}
.highlight .si {
  color: #e6db74;
}
.highlight .sx {
  color: #e6db74;
}
.highlight .s1 {
  color: #e6db74;
}
.highlight .s {
  color: #e6db74;
}
.highlight .na {
  color: #a6e22e;
}
.highlight .nc {
  color: #a6e22e;
}
.highlight .nd {
  color: #a6e22e;
}
.highlight .ne {
  color: #a6e22e;
}
.highlight .nf {
  color: #a6e22e;
}
.highlight .vc {
  color: #ffffff;
}
.highlight .nn {
  color: #ffffff;
}
.highlight .nl {
  color: #ffffff;
}
.highlight .ni {
  color: #ffffff;
}
.highlight .bp {
  color: #ffffff;
}
.highlight .vg {
  color: #ffffff;
}
.highlight .vi {
  color: #ffffff;
}
.highlight .nv {
  color: #ffffff;
}
.highlight .w {
  color: #ffffff;
}
.highlight {
  color: #ffffff;
}
.highlight .n, .highlight .py, .highlight .nx {
  color: #ffffff;
}
.highlight .ow {
  color: #f92672;
}
.highlight .nt {
  color: #f92672;
}
.highlight .k, .highlight .kv {
  color: #f92672;
}
.highlight .kn {
  color: #f92672;
}
.highlight .kp {
  color: #f92672;
}
.highlight .o {
  color: #f92672;
}
      .tocify-wrapper {
        top: 200px!important;
      }
    </style>
    <link href="stylesheets/screen.css" rel="stylesheet" media="screen" />
    <link href="stylesheets/print.css" rel="stylesheet" media="print" />
      <script src="javascripts/all.js"></script>
    <!-- Bootstrap -->
    <link href="https://developer.wave.io//stylesheets/bootstrap.min.css" rel="stylesheet">
    <link href="https://developer.wave.io//stylesheets/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,900" rel="stylesheet">
  </head>

  <body class="index" data-languages="[&quot;java&quot;,&quot;javascript&quot;]">
  
  <div class="apiheader">
    <div class="contentcontainer">
      <header>
        <!-- <div class="logo"><a href="<?php echo DOC_SERVER; ?>"><img src="https://developer.wave.io/images/smalllogo.png"></a></div> -->

          <div class="nav">
            <ul>
              <?php if(isLoggedIn()) { ?>
              <li><a href="http://developer.wave.io/">Intro</a></li>
              <li><a href="http://developer.wave.io/examples">Examples</a></li>
              <li><a href="http://developer.wave.io/api">API</a></li>
              <li><a href="http://developer.wave.io/keys.php">Keys</a></li>
              <li><a href="http://developer.wave.io/login.php?a=logout">Logout</a></li>
              <?php } else { ?>
              <li><a href="http://developer.wave.io/">Intro</a></li>
              <li><a href="http://developer.wave.io/api">Docs</a></li>  
              <?php } ?>
            </ul>
          </div>
      </header> 
    </div>
  </div>
  <div class="clearfix"></div>
  
    <a href="#" id="nav-button">
      <span>
        NAV
        <img src="images/navbar.png" alt="Navbar" />
      </span>
    </a>
    <div class="tocify-wrapper">
      <img src="images/logo.png" alt="Logo" />
        <div class="lang-selector">
              <a href="#" data-language-name="java">Android</a>
              <a href="#" data-language-name="javascript">Windows / Linux</a>
        </div>
        <div class="search">
          <input type="text" class="search" id="input-search" placeholder="Search">
        </div>
        <ul class="search-results"></ul>
      <div id="toc">
      </div>
        <ul class="toc-footer">
            <li><a href='keys.php'>Sign Up for a Developer Key</a></li>
            <li><a href='login.php?a=logout'>Logout</a></li>
        </ul>
    </div>
    <div class="page-wrapper">
      <div class="dark-box"></div>
      <div class="content">
        <h1 id="introduction">Introduction</h1>

<p>Welcome to the Wave API! We support Android and Windows / Linux (java) development.</p>

<h1 id="test">Test</h1>

<blockquote>
<p>This should appear on the right and below should be some specfic code for it.</p>
</blockquote>
<pre class="highlight java tab-java"><code><span class="n">MeshManager</span> <span class="n">mm</span> <span class="o">=</span> <span class="n">AndroidMeshManager</span><span class="o">.</span><span class="na">getInstance</span><span class="o">(</span><span class="n">MainActivity</span><span class="o">.</span><span class="na">this</span><span class="o">,</span> <span class="n">MainActivity</span><span class="o">.</span><span class="na">this</span><span class="o">);</span>
</code></pre><pre class="highlight javascript tab-javascript"><code><span class="nx">MeshManager</span> <span class="nx">mm</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">JavaMeshManager</span><span class="p">();</span>
</code></pre>
<p>Here&rsquo;s some other writing which is on the left side</p>

      </div>
      <div class="dark-box">
          <div class="lang-selector">
                <a href="#" data-language-name="java">Android</a>
                <a href="#" data-language-name="javascript">Windows / Linux</a>
          </div>
      </div>
    </div>
    
    
    
  </body>
</html>
