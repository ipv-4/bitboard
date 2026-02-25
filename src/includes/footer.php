
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <?php
    if (isset($extra_js)) {
        if (is_array($extra_js)) {
            foreach ($extra_js as $js_file) {
                echo '<script src="assets/js/' . $js_file . '"></script>' . "\n";
            }
        } else {

            echo '<script src="assets/js/' . $extra_js . '"></script>' . "\n";
        }
    }
    ?>

</body>
</html>