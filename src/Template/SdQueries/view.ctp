<title>Query Content</title>

<div class="container-fluid w-75 my-3">
    <div class="jumbotron">
    <h1 class="display-4"><?= h($sdQuery->title) ?></h1>
    <div class="d-flex">
        <div class="lead w-75">From: <?php 
                if($sdQuery->senderfirstname==null) echo "SystmNotice";
                else echo $sdQuery->senderfirstname." ".$sdQuery->senderlastname."  &lt;".$sdQuery->senderEmail."&gt;";
                ?>
        </div>
        <div class="lead w-75">To: <?php 
                if($sdQuery->receiverfirstname==null) echo "SystmNotice";
                else echo $sdQuery->receiverfirstname." ".$sdQuery->receiverlastname."   &lt;".$sdQuery->receiverEmail."&gt;";
                ?>
        </div>
        <div class="float-right text-right w-25"><?= h($sdQuery->send_date) ?></div>
    </div>
    <hr class="my-4">
    <?php echo ($sdQuery->content) ?>
    <button type="button" class="btn btn-primary float-right" onclick="window.history.back();">Go Back</button>
    </div>
</div>