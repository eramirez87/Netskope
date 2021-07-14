<?php
    if( !isset($_GET['id']) ){
        header("HTTP/1.0 404 Not Found");
    }
    error_reporting(E_ALL);
    include_once('connect.php');
    $connect = new Connect();
    $r = $connect->getMovie($_GET['id']);
?>
<html>
    <header>
        <title>Movies comments | <?= $r->Film ?></title>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </header>
    <body>
        <div class='container'>
            <div class="row">
                <div class='card mt-4'>
                    <span class='card-content'>
                        <div class='card-title'><?= $r->Film ?></div>
                        <div class='row'>
                            <hr/>
                            <div class='col s6'>
                                <b>Genre</b> <?= $r->Genre ?>
                            </div>
                            <div class='col s6'>
                                <b>Studio</b> <?= $r->Lead_Studio ?>
                            </div>
                            <div class='col s6'>
                                <b>Worldwide Gross</b> <?= $r->Worldwide_Gross ?>m
                            </div>
                            <div class='col s6'>
                                <b>Year release</b> <?= $r->Year ?>
                            </div>
                            <div class='col s4'>
                                <b>User rating</b> <?= $r->Audience_score ?>%
                                <div class="progress">
                                    <div class="determinate" style="width: <?= $r->Audience_score ?>%"></div> 
                                </div>
                            </div>
                            <div class='col s4'>
                                <b>Profitability</b> <?= round($r->Profitability,2) ?>%
                                <div class="progress">
                                    <div class="determinate" style="width: <?= round($r->Profitability,2) ?>%"></div> 
                                </div>
                            </div>
                            <div class='col s4'>
                                <b>Rotten tomatoes rating</b> <?= $r->Rotten_Tomatoes ?>%
                                <div class="progress">
                                    <div class="determinate" style="width: <?= $r->Rotten_Tomatoes ?>%"></div> 
                                </div>
                            </div>
                        </div>
                    </span>
                </div>
                <div class='card'>
                    <form class='card-content' id='commentForm' onsubmit='Detail.add(this,event)'>
                        <input type='hidden' value='<?= $_GET['id'] ?>' name='id_movie'/>
                        <div class='card-title'>Your comment</div>
                        <div class='row'>
                            <hr/>
                            <div class='input-field col s12'>
                                <input id="name" type="text" class="validate" name='name'>
                                <label for="name">Your Name</label>
                            </div>
                            <div class="input-field col s12">
                                <textarea id="comment" class="materialize-textarea" name='comment'></textarea>
                                <label for="comment" maxlength='200'>Your comment</label>
                            </div>
                            <div class="col s12">
                                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class='card mt-4 mb-4'>
                    <span class='card-content'>
                        <div class='card-title'>Comments</div>
                        <div class='row'>
                            <hr/>
                            <div class='col s12 mt-5'>
                                <!--<ul class='collection'>-->
                                    <?php foreach( $r->comments as $comment ) :?>
                                        <p class='collection-item'>
                                            <blockquote>
                                                <b><?= $comment['comment'] ?></b><br/>
                                                <small><?= $comment['name'] ?></small>
                                                <p class='right-align'><?= $comment['created_at'] ?></p>
                                        </blockquote>
                                        </p>
                                    <?php endforeach;?>
                                <!--</ul>-->
                            </div>
                        </div>
                    </span>
                </div>
            </div>
        </div>
        <script src='detail.js'></script>
    </body>
</html>