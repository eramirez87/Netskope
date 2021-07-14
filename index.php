<?php
    include_once('connect.php');
    $connect = new Connect();
    $r = $connect->getMovies();
    $autocomplete = [];
    foreach($r as $row){
        $autocomplete[ $row['Film'] ] = null;
    }
?>
<html>
    <header>
        <title>Movies comments</title>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
    </header>
    <body>
        <div class='container'>
            <div class="row" id="list_container">
                <div class='input-field col s12'>
                    <label>Search</label>
                    <input class='search' type="text">
                </div>
                <div class='col s12'>
                    <div class="collection list">
                        <?php foreach($r as $row) : ?>
                        <a href="detail.php?id=<?= $row['id'] ?>" target='_blank' class="collection-item"><span class='Film'><?= $row['Film'] ?></span></a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class='s12'>
                    <ul class="pagination"></ul>
                </div>
            </div>
        </div>
        <script src='index.js'></script>
    </body>
</html>