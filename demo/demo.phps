<?php

/**
 * LMD Crunch CSS <https://github.com/lmd-code/lmdcrunchcss>
 *
 * This is a demo of the minification capabilities, and not a usage demo.
 * See example.phps for an actual usage demo.
 *
 * You can run this demo from your local copy of LmdCrunchCss
 *
 * 1. Rename this file to 'demo.php' (it's just a file extension change).
 *
 * 2. In your browser, go to:
 *    http://host.name/path/to/lmdcrunchcss/demo/demo.php
 *
 *    For example, in a dev environment:
 *    http://project.locahost/vendor/lmdcrunchcss/demo/demo.php
 */

use lmdcode\lmdcrunchcss\LmdCrunchCss;
include '../src/LmdCrunchCss.php';
$dirPath = '/' . trim(str_replace('\\', '/', dirname($_SERVER['PHP_SELF'])), '/');
$sourceFiles = [$dirPath . '/input-1.css', $dirPath . '/input-2.css', $dirPath . '/input-3.css',];
$minifiedFile = $dirPath . '/output.min.css';
$crunch = new LmdCrunchCss($sourceFiles, $minifiedFile, $_SERVER['DOCUMENT_ROOT']);
$css = $crunch->process(LmdCrunchCss::MINIFY_NONE)->toString(); // just need the combined CSS
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMD Crunch CSS Demo</title>
    <style type="text/css"><?php // Minfiy actual CSS for this demo page inline
echo LmdCrunchCss::minify(
    "html, *, ::before, ::after {
        box-sizing: border-box;
    }
    html {
        line-height: 1.4;
        font-size: 16px;
        font-size-adjust: 0.5;
        font-weight: 400;
        text-size-adjust: none;
    }
    body {
        background-color: #fff;
        color: #000;
        font-size: 1rem;
    }
    header, main, footer {
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
    }
    header {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
        align-content: center;
        align-items: center;
    }
    header > h1 {
        flex: 1;
        margin: 0;
        padding: 0;
        font-size: 1.5rem;
    }
    header > a {
        color: #990000;
        text-decoration: none;
    }
    #gh {
        flex:  0 0 100px;
        width:   100px;
        display:  flex;
        flex-direction:  row;
        flex-wrap:  wrap;
        justify-content:  space-between;
        align-content:  center;
        align-items:   center;
        gap:  0 0.5rem;
        font-size:  0.75rem;
        line-height:  1;

    }
    #gh > svg {
        flex:  0 0 32px;
        width:  32px;
        height:  32px;

    }
    #gh > span {
        flex:  1;
        line-height:  1.2;
    }
    footer {
        text-align: center;
    }
    p {
        margin: 1rem 0;
    }
    textarea {
        width:  100%;
        max-width:  800px;
        tab-size: 4;
        white-space:  pre;
        overflow-wrap:  normal;
        overflow-x:  auto;
    }
    @media screen and (min-width: 640px) {
        body {
            font-size: 1.125rem;
        }
        header > h1 {
            font-size: 2rem;
        }
    }",
    LmdCrunchCss::MINIFY_HIGH
);
?></style>
</head>
<body>
<header>
    <h1>LMD Crunch CSS Demo</h1>
    <a href="https://github.com/lmd-code/lmdcrunchcss">
        <div id="gh">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
            <span>Get from GitHub</span>
        </div>
    </a>
</header>
<main>
    <p>Demonstrating the different levels of minification.</p>

    <h2><label for="cssout0"><code>MINIFY_LEVEL_NONE (0)</code></label></h2>
    <p><textarea id="cssout0" cols="80" rows="15"><?php echo $css;?></textarea></p>

    <h2><label for="cssout1"><code>MINIFY_LEVEL_LOW (1)</code></label></h2>
    <p><textarea id="cssout1" cols="80" rows="15"><?php
        echo LmdCrunchCss::minify($css, LmdCrunchCss::MINIFY_LOW);
    ?></textarea></p>

    <h2><label for="cssout2"><code>MINIFY_LEVEL_MEDIUM (2)</code></label></h2>
    <p><textarea id="cssout2" cols="80" rows="15"><?php
        echo LmdCrunchCss::minify($css, LmdCrunchCss::MINIFY_MEDIUM);
    ?></textarea></p>

    <h2><label for="cssout3"><code>MINIFY_LEVEL_HIGH (3)</code></label></h2>
    <p><textarea id="cssout3" cols="80" rows="3"><?php
        echo LmdCrunchCss::minify($css, LmdCrunchCss::MINIFY_HIGH);
    ?></textarea></p>
</main>
<footer>
    <p>
        LMD Crunch CSS by <a href="https://github.com/lmd-code/">LMD</a><br>
        Licensed under the <a href="https://github.com/lmd-code/lmdcrunchcss/blob/main/LICENSE">MIT License</a>
    </p>
</footer>
</body>
</html>