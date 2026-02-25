
<?php if (!isset($page_title) or !isset($extra_css)) {
    $page_title = null;
    $extra_css = null;
} ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo isset($page_title)
        ? $page_title
        : "Mini Pinterest"; ?></title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <?php if (isset($extra_css)) {
        if (is_array($extra_css)) {
            foreach ($extra_css as $css_file) {
                echo '<link rel="stylesheet" href="assets/css/' .
                    $css_file .
                    '">' .
                    "\n";
            }
        } else {
            echo '<link rel="stylesheet" href="assets/css/' .
                $extra_css .
                '">' .
                "\n";
        }
    } ?>
</head>
