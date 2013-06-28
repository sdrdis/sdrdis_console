<?php
$_SERVER['NOS_ROOT'] = realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..');

// Boot the app
require_once $_SERVER['NOS_ROOT'].DIRECTORY_SEPARATOR.'novius-os'.DIRECTORY_SEPARATOR.'framework'.DIRECTORY_SEPARATOR.'bootstrap.php';

define('NOVIUSOS_PATH', realpath(DOCROOT.'..'.DS.'novius-os').DS);

if (\Input::is_ajax()) {
    echo('<div class="console_item"> > '.nl2br($_POST['exec']));
    echo ('<div style="color: #0A0; margin-top: 10px; margin-left: 40px; margin-bottom: 20px;">');
    eval($_POST['exec']);
    echo ('</div>');
    echo('</div>');
} else {
    ?>
    <html>
        <head>
            <title>Console</title>
            <script type="text/javascript" src="../../static/apps/sdrdis_console/plugins/jquery/jquery.js"></script>
        </head>
        <body>
        <h1>Console</h1>
        <div id="console">
        </div>
        <form action="console.php" onsubmit="$.post($(this).attr('action'), $(this).serialize(), function(data) { $('#console').append(data); }); $('#exec').focus(); return false;">
            <table>
                <tr>
                    <td>
                        >
                    </td>
                    <td>
                        <textarea name="exec" id="exec" style="height: 100px; width: 600px;"></textarea>
                    </td>
                    <td>
                        <input type="submit" value="Executer" />
                    </td>
                </tr>
            </table>
        </form>
        </body>
    </html>
    <?php
}