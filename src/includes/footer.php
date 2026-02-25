
<?php if (!isset($extra_js)) {
    $extra_js = null;
} ?>
<script src="assets/js/bootstrap.min.js"></script>

<?php if (isset($extra_js)) {
    if (is_array($extra_js)) {
        foreach ($extra_js as $js_file) {
            echo '<script src="assets/js/' . $js_file . '"></script>' . "\n";
        }
    } else {
        echo '<script src="assets/js/' . $extra_js . '"></script>' . "\n";
    }
} ?>
