<?php
/**
 * @author William Ssenyondo
 * @email sseywilliam@gmail.com
 * @create date 2024-10-05 14:38:13
 * @modify date 2024-10-05 14:38:13
 * @desc API documentation
 */
?>
 <!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title>dfcu HR API | Registration</title>
    <meta name="description" content="dfcu HR API registration document">
    <meta name="author" content="William Ssenyondo">

    <meta http-equiv="cleartype" content="on">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo base_url('public/api/css/hightlightjs-dark.css')?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.8.0/highlight.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;1,300&family=Source+Code+Pro:wght@300&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo base_url('public/api/css/style.css')?>" media="all">
    <script>hljs.initHighlightingOnLoad();</script>
</head>

<body>
<div class="left-menu">
    <div class="content-logo">
        <div class="logo">
            <img alt="platform by Emily van den Heever from the Noun Project" title="platform by Emily van den Heever from the Noun Project" src="<?php echo base_url('public/api/images/logo.png')?>" height="32" />
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
                <a>Post Request</a>
            </li>
            <li class="scroll-to-link" data-target="content-errors">
                <a>Response Codes</a>
            </li>
        </ul>
    </div>
</div>
<div class="content-page">
    <div class="content-code"></div>
    <div class="content">
        <div class="overflow-hidden content-section" id="content-get-started">
            <h1>Get started</h1>
            <pre>
                API Endpoint
                <?php echo current_url();?>
            </pre>
            <p>
                Registration mock API to allow interaction with the dfcu HR APP &amp; end points explained.  Mock API Key &amp; Tokens where added to secure connections and data transfers,  once properly set up the API endpoints will update automatically.
            </p>
            <p>
               <code class="higlighted break-word">API_KEY:williamssenyondo &amp; API_TOKEN:256779610327</code>
            </p>
        </div>
        <div class="content-section" id="content-get-characters">
            <h2>new employee</h2>
            <pre>
                <code class="bash">
                    # Here is a curl example
                    curl \
                    -X POST <?=current_url()?>staff \
                    -F 'api_key=williamssenyondo' \
                    -F 'api_token=256779610327' \
                    -F 'surname=John' \
                    -F 'othername=Doe' \
                    -F 'dob=1900-09-09' \
                    -F 'photo=NjcwM2MwYzc4NzI1Zi5qcGc' \
                    -F 'offset=0' \
                    -F 'limit=50'
                </code>
            </pre>
            <p>
                Register a new employee/staff, make a POST request to end point :<br>
                <code class="higlighted break-word"><?=current_url()?>staff</code>
            </p>
            <br>
            <pre>
                <code class="json">
                    Result example :
                    {
                        {
                            "api_key": "williamssenyondo",
                            "api_token": "256779610327",
                            "data": {
                                "surname": "Keza",
                                "othername": "Arielle",
                                "dob": "1989-02-02",
                                "photo": "NjcwM2MwYzc4NzI1Zi5qcGc="
                            }
                        }
                        result: [
                            {
                                "message": "Employee number: 6703c13228"
                            }
                        ]
                    }
                </code>
            </pre>
            <h4>QUERY PARAMETERS</h4>
            <table class="central-overflow-x">
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
                    <td>(mandatory) API key.</td>
                </tr>
                <tr>
                    <td>api_token</td>
                    <td>String</td>
                    <td>(mandatory) API token.</td>
                </tr>
                <tr>
                    <td>surname</td>
                    <td>String</td>
                    <td>(mandatory) string data prefered.</td>
                </tr>
                <tr>
                    <td>othername</td>
                    <td>String</td>
                    <td>(mandatory) string data prefered.</td>
                </tr>
                <tr>
                    <td>dob</td>
                    <td>String</td>
                    <td>(mandatory) ISO 8601 standard - YYYY-MM-DD.</td>
                </tr>
                <tr>
                    <td>photo</td>
                    <td>String</td>
                    <td>(optional) Base64 encoded.</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="overflow-hidden content-section" id="content-errors">
            <h2>Status Codes</h2>
            <p>
                The Registration API error codes & meaning: 
            </p>
            <table style="width: 600px;">
                <thead>
                <tr>
                    <th>Response Code</th>
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
                        Internal serer error
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="content-code"></div>
</div>
<script src="<?php echo base_url('public/api/js/script.js')?>"></script>
</body>
</html>
