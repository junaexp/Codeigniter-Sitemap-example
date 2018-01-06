<?='<?xml version="1.0" encoding="UTF-8" ?>';?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <?php foreach($list as $url) { ?>
    <url>
        <loc><?=$url;?></loc>
        <priority>0.5</priority>
    </url>
    <?php } ?>

</urlset>
