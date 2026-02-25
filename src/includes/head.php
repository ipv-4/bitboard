<?php
/**
 * @var string|null $page_title
 * @var array|string|null $extra_css
 */
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo isset($page_title)
        ? $page_title
        : "Mini Pinterest"; ?></title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <?php foreach ((array) ($extra_css ?? []) as $css_file) : ?>
        <link rel="stylesheet" href="assets/css/<?= htmlspecialchars($css_file) ?>">
    <?php endforeach; ?>

</head>
