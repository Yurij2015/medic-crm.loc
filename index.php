<?php include 'includes/session.php'; ?>
<?php include 'includes/db_connect.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php $layout_context = "public"; ?>
<?php include 'includes/header.php'; ?>
<?php find_selected_page(true); ?>
    <!-- welcome -->
    <div class="welcome">
        <div class="container">
            <div class="news-grid">
                <div class="col-md-8 blog-left">
                    <div class="blog-left-grid">
                        <h2><?php echo htmlentities($current_page["menu_name"], ENT_QUOTES, "UTF-8"); ?></h2>
                        <?php if ($current_page) { ?>
                            <?php echo($current_page["content"]); ?>
                        <?php } else { ?>
                            <h3>Выберите запись из списка:</h3>
                            <?php echo public_navigation($current_subject, $current_page); ?>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="col-md-4 blog-right">
                <h2>Меню</h2>
                <?php echo public_navigation($current_subject, $current_page); ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- //welcome -->
<?php include 'includes/footer.php'; ?>