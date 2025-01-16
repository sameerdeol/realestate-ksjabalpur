<h1>Database Connection Status</h1>
    <?php if (strpos($message, 'failed') !== false): ?>
        <p class="error"><?= $message; ?></p>
    <?php else: ?>
        <p class="success"><?= $message; ?></p>
    <?php endif; ?>