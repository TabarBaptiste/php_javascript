<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="server.css">
    <?php
    if (isset($_SERVER['HTTP_USER_AGENT'])) {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];

        if (strpos($userAgent, 'Windows') !== false) {
            $rep = "Vous utilisez un système d'exploitation Windows.";
        } elseif (strpos($userAgent, 'Macintosh') !== false || strpos($userAgent, 'Mac OS X') !== false) {
            $rep = "Vous êtes sur un système d'exploitation macOS.";
        } elseif (strpos($userAgent, 'Linux') !== false) {
            $rep = "Vous êtes sur un système d'exploitation Linux.";
        } else {
            $rep = "Impossible de détecter votre système d'exploitation.";
        }
    } else {
        $userAgent = "Impossible de récupérer les informations du navigateur.";
    }
    ?>
</head>

<body>
    <h1></h1>
    <p>
        <?php echo $userAgent, "<br>"; ?>
    </p>
    <p class="rep">
        <?php echo $rep, "<br>"; ?>
    </p>
</body>

</html>