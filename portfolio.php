<?php
$folder_path = 'img/works/original-size/';
$images = glob($folder_path . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

// Pagination settings
$images_per_page = 3;
$total_images = count($images);
$total_pages = ceil($total_images / $images_per_page);

// Determine current page
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$current_page = max(1, min($current_page, $total_pages)); // Ensure page is within valid range

// Calculate start and end indexes for images on current page
$start_index = ($current_page - 1) * $images_per_page;
$end_index = min($start_index + $images_per_page, $total_images);

// Display images for current page
echo '<div class="container-fluid">
<div class="row p-30-0">';
foreach (array_slice($images, $start_index, $images_per_page) as $image) {
    $thumbnail = 'img/works/thumbnail/' . basename($image);
    $filename = pathinfo($image, PATHINFO_FILENAME); // Filename without extension
    $description = $filename; // Use filename as description
?>

    <div class="col-lg-<?php echo 12 / $images_per_page; ?>">
        <div class="art-a art-blog-card">
            <a href="#" class="art-port-cover">
                <img src="<?php echo $thumbnail; ?>" alt="<?php echo $filename; ?>" />
            </a>

            <div class="art-post-description">
                <a href="#">
                    <h5 class="mb-15"><?php echo $filename; ?></h5> <!-- Displaying filename -->
                </a>

                <div class="mb-15"><?php echo $description; ?></div>

                <a href="#" class="art-link art-color-link art-w-chevron">Read more</a>
            </div>
        </div>
    </div>

<?php } ?>
</div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="art-a art-pagination">
                <?php if ($current_page > 1) : ?>
                    <a href="?page=<?php echo ($current_page - 1); ?>" class="art-link art-color-link art-w-chevron art-left-link"><span>Previous page</span></a>
                <?php endif; ?>
                <div class="art-pagination-center art-m-hidden">
                    <?php for ($page = 1; $page <= $total_pages; $page++) : ?>
                        <?php if ($page == $current_page) : ?>
                            <a class="art-active-pag" href="?page=<?php echo $page; ?>"><span><?php echo $page; ?></span></a>
                        <?php else : ?>
                            <a href="?page=<?php echo $page; ?>"><span><?php echo $page; ?></span></a>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
                <?php if ($current_page < $total_pages) : ?>
                    <a href="?page=<?php echo ($current_page + 1); ?>" class="art-link art-color-link art-w-chevron"><span>Next page</span></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>