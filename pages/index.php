<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>AchieveCraft - Make Minecraft achievement images</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<nav class="lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">AchieveCraft</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="#">GitHub</a></li>
        </ul>

        <ul id="nav-mobile" class="side-nav">
            <li><a href="#">GitHub</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <h1 class="header center" style="color: #ee6e73;">Custom Minecraft Achievements</h1>
        <div class="row center">
            <h5 class="header col s12 light">This is a remake of achievecraft.com, all old links work just by changing the .com to a .net!</h5>
        </div>
        <br><br>

    </div>
</div>


<div class="container">
    <div class="section">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 m4">
                <div class="icon-block">
                    <h5 class="center">Add some text</h5>

                    <p class="light">
                    <div class="input-field col" style="width: 100%;">
                        <input placeholder="Achievement Get" id="top_text" type="text">
                        <label for="top_text">Top text</label>
                    </div>

                    <div class="input-field col" style="width: 100%;">
                        <input placeholder="Placeholder" id="bottom_text" type="text" class="validate">
                        <label for="bottom_text">Bottom Text</label>
                    </div>
                    </p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h5 class="center">Find some icons</h5>
                    <p class="center"><a class="waves-effect waves-light btn modal-trigger" href="#uploadIcon">upload a
                            custom icon</a></p>

                    <p class="light">
                    <div class="input-field col" style="width: 100%;">
                        <select id="iconGroupSelect">
                            <option value="vanilla" selected>Vanilla Minecraft</option>
                        </select>
                        <label>Choose an icon group</label>
                    </div>

                    </p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h5 class="center">Choose an icon</h5>

                    <p class="light">
                        <div class="icon-list" style="overflow-y: auto; height: 150px;">
                        <div class="icon-preview" data-id="cdb714" style="background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAEPUlEQVRYhe2WMY9kSRGEv8is1z3HLSekE6BDeGDi4PG7MPH4A2fh8WPOxMLFw8FBYgVi76Sb7X6vMjCypndve7jBQULiaoxR18uqisqMiCz4bvy/D73/43ef/9r/zcO+fPMVv/nt779x5vgw6A9f/JHTaSDM9Zgg2EZim4dtAyAi2M7JfjXbKZmH2RKUyZzFUeZ722BkUC4MfH25MLbTHag7AK9enfnTn//CGAk2c/YGz42QCAkDmdGThqpeUza2GZn88hc/p57Z6A4AhtO2MV5/RapvkSGk/mgJu+MkExhhqgpJRASSmAXTPX9w8Mn3H3j9ty9fBvBw3qgqIkQgUsEICBuHGBIjhAzYlJLpYgKkkDsjEqhAdJaq6l2Wvg1AEGQGqUFIvDonH4/EiGNOLBOKvpnNJnGOjV0gBbOKEEzDow0lKnR38L8FMKsQq77RMtkyyRCPak6wWJFrzXXuyGBMYUQgwZA4wkjgMo+P15cB7GWqTAiis8osYxlXUXYTzW4C2gwlUxMwKeEqdnyLtSFH8vDR+Q7AXVFOW99LZYaEgOucXPYDW7fbPx0OYJuj5tMnDheaRjRX7GI7nZjPyOC+BLOWPZlZRdEbyG5yLe96OryqmD5IDQzs88ArFnJFNxFxvZyBeLpGBEK4zHkkI5In45xro9a7CQ20bu7WZ8faOCCyyam4V8HdTBG32y3wy5Bm/695O5yVEQEXH2SwDhGSFhDaM2y27d527mZO54EXEbeElLjOLkWVe+NVy7aCdqUtRn/zRNFmpUVC5M7klh8ed5+B/XKgEIU4KvBiPJgI3TJgOjMWHEBhpotyq6BjFmAFuQ0u13sZ3nNgLN1SbJuYuMu5ZJi6sYRYNTWmDAVcZrFX76FVgtAi6z0H7wGoRM1uIo/75In7s+rWvPeaixpmIrT8XwRDIiOR4fFirkfHZYrtmRI82wsiWwFxM53W+LUmoWCLZNocZRRt30/SPWUT8DpNMckMqsSc5nI5XgZwS00I1B3tFEkJVBOpUz3dnCCa7XpvXRWchsEnisnbVbNt/AcZmCvYJRRe0jsQkJEcVVisdheoWuuK1n2VOaqoar/Y50Q5wNUxLwGwq9OuzkCs+h8Fiu54nez+y7VplVkOcJPeLFP0e8IW18v+MoD96E3L5jKNVKiA7P7wDdoup5Pb/S6zG9ApG0SEeg0QI7tkLwEAsx9zPTjg7V5kBFH0/T6QUizXVBWX2V3zSW6SmHPiEez7zum0vQwgMYTwFv0Kkqj1wNDatGu5yJLRzpgQo5bmW8bbNqhIKt+Z04sATufBT3/0KT/71WdEJmMM6phIbhIAmS2riGDu7ZyWyOimc+w783hnyU88eXy8fDuAN/94w34UP/nsh2znjyECR/KDH38C1x3GewT4+rHfjq8GfPQA47SyYuY/33B9e4EwuNf89fXf12vqu/E/Nv4F0iShSfb6QiIAAAAASUVORK5CYII=)"></div>

                    </div>
                    </p>
                </div>
            </div>
        </div>

    </div>

    <div class="section">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 m4">
                <div class="icon-block">
                    <h5 class="center">Preview</h5>

                    <p class="light">

                    </p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h5 class="center">Links</h5>
                    <p class="center">

                    </p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h5 class="center">Codes</h5>

                    <p class="light">

                    </p>
                </div>
            </div>
        </div>

    </div>
</div>

<div id="uploadIcon" class="modal">
    <form action="new/icon" method="POST" enctype="multipart/form-data">
        <div class="modal-content">
            <h4>Upload custom icon(s)</h4>
            <p>
            <div class="file-field input-field">
                <div class="btn">
                    <span>Choose a File</span>
                    <input type="file" name="icons[]" multiple>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload one or more files">
                </div>
            </div>

            <div class="input-field col">
                <input id="icon_group_name" name="groupName" type="text" placeholder="Unnamed Icon Group" class="validate">
                <label for="icon_group_name">Icon Group Name (Optional)</label>
            </div>
            </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</button>
            <button type="submit" class="modal-action waves-effect waves-green btn-flat">Upload</button>
        </div>
    </form>
</div>

<footer class="page-footer">
    <div class="footer-copyright">
        <div class="container">
            Made by Jared. Using <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>.
        </div>
    </div>
</footer>


<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.min.js"></script>
<script src="js/init.js"></script>

</body>
</html>