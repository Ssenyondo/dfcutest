<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>API - Documentation</title>
    <meta name="description" content="dfcu HR update API">
    <meta name="author" content="William Ssenyondo">

    <meta http-equiv="cleartype" content="on">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/hightlightjs-dark.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.8.0/highlight.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;1,300&family=Source+Code+Pro:wght@300&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="<?=base_url('public/css/style.css')?>" media="all">
    <script>
        hljs.initHighlightingOnLoad();
    </script>
</head>

<body class="one-content-column-version">
<div class="left-menu">
    <div class="content-logo">
        <div class="logo">
            <img alt="platform by Emily van den Heever from the Noun Project" title="platform by Emily van den Heever from the Noun Project" src="<?=base_url('public/images/logo.png')?>" height="32" />
            <span>API Documentation</span>
        </div>
        <button class="burger-menu-icon" id="button-menu-mobile">
            <svg width="34" height="34" viewBox="0 0 100 100"><path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058"></path><path class="line line2" d="M 20,50 H 80"></path><path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942"></path></svg>
        </button>
    </div>
    <div class="mobile-menu-closer"></div>
    <div class="content-menu">
        <div class="content-infos">
            <div class="info"><b>Version:</b> 1.0.0</div>
            <div class="info"><b>Name:</b> Registration API</div>
            <div class="info"><b>Developed By:</b> William Ssenyondo</div>
        </div>
        <ul>
            <li class="scroll-to-link active" data-target="content-get-started">
                <a>Get Started</a>
            </li>
            <li class="scroll-to-link" data-target="content-get-characters">
                <a>Get Characters</a>
            </li>
            <li class="scroll-to-link" data-target="content-errors">
                <a>Errors</a>
            </li>
        </ul>
    </div>
</div>


<div class="content-page">
    <div class="content">
        <div class="overflow-hidden content-section" id="content-get-started">
            <h1>Get started</h1>
            <p>
                Registration mock API to allow interaction with the dfcu HR APP &amp; end points explained.  Mock API Key &amp; Tokens where added to secure connections and data transfers,  once properly set up the API endpoints will update automatically.
            </p>
            <p>
               <code class="higlighted break-word">API_KEY:williamssenyondo &amp; API_TOKEN:256779610327</code>
            </p>
        </div>
        <div class="overflow-hidden content-section" id="content-get-characters">
            <h2>get characters</h2>
            <p>
                To edit a user make a JSON , CURL PUT request to following end point url :<br>
                <code class="higlighted break-word"><?=current_url()?>edit</code>
            </p>
            <br>
            <h4>QUERY PARAMETERS</h4>
            <table>
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>api_key</td>
                    <td>String</td>
                    <td>API key.</td>
                </tr>
                <tr>
                    <td>api_token</td>
                    <td>String</td>
                    <td>API token.</td>
                </tr>
                <tr>
                    <td>id</td>
                    <td>String</td>
                    <td>Employee number</td>
                </tr>
                <tr>
                    <td>dob</td>
                    <td>String</td>
                    <td>Date of birth (ISO 8601 YYYY-MM-DD)</td>
                </tr>
                <tr>
                    <td>photo</td>
                    <td>String</td>
                    <td>Employee photo (base64 encoded)</td>
                </tr>
                <tr>
                    <td>JSON</td>
                    <td><pre>
                <code class="json">
                {
    "api_key": "williamssenyondo",
    "api_token": "256779610327",
    "data": {
       "id": "4883934343",
       "dob": "1989-02-02",
       "photo": "NjcwM2MwYzc4NzI1Zi5qcGc="
    }
}
                </code>
        </pre></td>
                </tr>
                </tbody>
            </table>
        </div>
     
        <div class="overflow-hidden content-section" id="content-errors">
            <h2>Errors</h2>
            <p>
                The Registration API error codes &amp; meaning:
            </p>
            <table>
                <thead>
                <tr>
                    <th>Error Code</th>
                    <th>Meaning</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>200</td>
                    <td>Indicates that the request has succeeded.</td>
                </tr>
                <tr>
                    <td>201</td>
                    <td>Indicates that the request has succeeded and a new resource has been created as a result.</td>
                </tr>
                <tr>
                    <td>404</td>
                    <td>The server can not find the requested resource.</td>
                </tr>
                <tr>
                    <td>400</td>
                    <td>Bad post parameters.</td>
                </tr>
                <tr>
                    <td>500</td>
                    <td>
                        INternal serer error
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .github-corner:hover .octo-arm {
        animation: octocat-wave 560ms ease-in-out
    }

    @keyframes octocat-wave {
        0%,
        100% {
            transform: rotate(0)
        }
        20%,
        60% {
            transform: rotate(-25deg)
        }
        40%,
        80% {
            transform: rotate(10deg)
        }
    }

    @media (max-width:500px) {
        .github-corner:hover .octo-arm {
            animation: none
        }
        .github-corner .octo-arm {
            animation: octocat-wave 560ms ease-in-out
        }
    }
    @media only screen and (max-width:680px){ .github-corner > svg { right: auto!important; left: 0!important; transform: rotate(270deg)!important;}}
</style>
<!-- END Github Corner Ribbon - to remove -->
<script src="<?=base_url('public/js/script.js')?>"></script>
</body>

</html>