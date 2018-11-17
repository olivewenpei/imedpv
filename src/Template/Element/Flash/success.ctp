<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<!-- The Bootstrap success message, the css file in login.css -->
<div class="msgbar alert alert-success alert-dismissible fade show" role="alert">
    <?= $message ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" class="msgbarBtn">&times;</span>
    </button>
</div>