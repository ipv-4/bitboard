<?php /** @var string|array|null $extra_js */ ?>

<script src="assets/js/bootstrap.min.js"></script>

<?php foreach ((array) ($extra_js ?? []) as $js_file) : ?>
    <script src="assets/js/<?= htmlspecialchars($js_file) ?>"></script>
<?php endforeach; ?>
