<?php 
    include_once 'header.php';
    require_once 'inc/dbh.inc.php';

    // hindrar skadliga strängar i get-metoden?
    $type = mysqli_real_escape_string($conn, $_GET['type'])
    $id = mysqli_real_escape_string($conn, $_GET['id'])

    $sql = "SELECT * FROM `items` WHERE `type` = $type AND `id` = $id"

    $result = mysqli_query($conn, $sql);

    $item = mysqli_fetch_assoc($result);
?>

<form action="inc/log.inc.php" method="post" id="log_overlay">
    <div class="overlay_box">
        <div class="rate_wrapper">
            <div class="poster_container"><img src="img/metadata/poster.jpg" alt="Poster"></div>
            <div><?php echo htmlspecialchars($item['name']); ?><br>(<?php echo htmlspecialchars(date('Y', strtotime($item['date']))); ?>)</h3></div>
        </div>
        <input type="number" name="rating" min="1" max="5" step="0.1" placeholder="Rate">
        <input type="date" name="date">
    </div>
    <button class="button" type="submit" name="submit">Confirm</button>
    <button class="button" type="button" name="close_log" onclick="deactivateOverlay()">Cancel</button>
</form>

<section>
    <?php if($item): ?>
        <div class="sub_header">    
            <h2><?php echo htmlspecialchars($item['name']); ?> (<?php echo htmlspecialchars(date('Y', strtotime($item['date']))); ?>)</h2>
            <p><?php echo htmlspecialchars($item['type']); ?></p>
        </div>
        <div class="item_wrapper">
            <div class="poster_container"><img src=<?php echo $item['poster_path']; ?> alt="Poster"></div>
            <div class="score_container"><?php echo htmlspecialchars($item['rating']); ?></div>
        </div>
        <button class="button" type="button" name="init_log" onclick="activateOverlay()">Rate</button>
    <?php else: ?>
        <div class="sub_header">    
            <h2>Something went wrong.</h2>
        </div>
    <?php endif; ?>
</section>

<?php include_once 'footer.php'; ?>