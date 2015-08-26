<!DOCTYPE html>

<html>

    <head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<link href="/templates/css/styles.css" rel="stylesheet"/>


        <?php if (isset($title)): ?>
            <title>Stock Indexes: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Stock Indexes</title>
        <?php endif ?>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


    </head>

    <body>
        <div class="container">

            <div id="top">
                <a href="/"><img alt="hello!" src="/img/logo.png"/> </a>
            </div>
            <br>
            <div id="middle">
