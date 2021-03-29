<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('./gen_header.php'); ?>
    <?php include('./db.php'); ?>
    <?php 
        include_once('./get_articles.php'); 
        $data = @curl_get_contents('http://mah-ev.hu/backend/mahev_article/tesla/cikk/' . $_GET['q']);
        $article = json_decode($data, true);
    ?>

    <title><?php print $article['title']; ?></title>
    <meta name="description" content="<?php print $article['field_lead']; ?>" />
    <meta property="fb:app_id" content="1192951680871368" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="<?php print $article['title']; ?>" />
    <meta property="og:url" content="<?php print (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" />
    <meta property="og:title" content="<?php print $article['title']; ?>" />
    <meta property="og:determiner" content="auto" />
    <meta property="og:description" content="<?php print $article['field_lead']; ?>" />
    <meta property="og:image" content="https://mah-ev.hu<?php print $article['field_main_image']; ?>" />
    <meta property="og:image:url" content="https://mah-ev.hu<?php print $article['field_main_image']; ?>" />
    <meta property="og:image:secure_url" content="https://mah-ev.hu<?php print $article['field_main_image']; ?>" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:url" content="https://www.mah-ev.hu/" />
    <meta name="twitter:title" content="<?php print $article['title']; ?>" />
    <meta name="dcterms.title" content="<?php print $article['title']; ?>" />
    <meta name="dcterms.type" content="Text" />
    <meta name="dcterms.identifier" content="https://www.mah-ev.hu/" />
    <meta name="dcterms.format" content="text/html" />
  </head>
  <body class="bg-white article-page"> 



    
    <div id="sitewrapper">
      
      <?php include('./gen_svg.php'); ?>
      <?php include('./gen_header_menu.php'); ?>

      <div class="py-16">
        <?php if (!empty($article)): ?>
        <div class="_article container">
        <header class="lg:grid lg:grid-cols-3 gap-8 mb-16">
            <div class="col-span-2 mb-8 flex flex-col">
                <div class=" _section-title2 _io w-full text-gray-500 leading-loose text-center mx-auto md:text-left md:mx-0 max-w-md">
    
                    <h1 class="text-2xl md:text-3xl leading-snug"><?php print $article['title']; ?></h1>
                    <div class="w-16 border-t-2 border-emerald-500 mx-auto md:ml-0 my-4 md:my-8"></div>
                </div>
                <div class="border-2 border-gray-400 block mb-4 mx-auto md:ml-0 px-4 py-2 text-gray-400 z-10"><?php print date('Y. m. d.', $article['created']); ?></div>
            </div>
            <div>
                <ul class="_tags text-gray-500 flex -mx-2 flex-wrap justify-center sm:justify-start lg:justify-end">
                    <?php foreach ($article['field_tags'] as $tag): ?>
                    <li class="inline-flex mx-2 mb-2"><span class="bg-gray-50 px-4 py-1"><?php print($tag); ?></span></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </header>
        <main class="_article-content lg:w-8/12 mx-auto">
            <h2>
                <?php print strip_tags($article['field_lead']); ?>
            </h2>
            <?php
                $body = $article['field_body'];
                $body = str_replace('/backend/sites/default/files', 'https://mah-ev.hu/backend/sites/default/files', $body);
                $body = str_replace('"/sites/default/files', '"https://mah-ev.hu/backend/sites/default/files', $body);
                $body = str_replace(array("\r\n", "\r", "\n"), "", $body);


                preg_match('/Forrás:.*?(<a.*?<\/a>)/', $body, $match);
                if (!empty($match)) {
                    $source = $match[1];
                } 
                $body = preg_replace('/Forrás:.*?<a.*?<\/a>/', '', $body);
                
                print $body;


            ?>
            

        </main>
        <?php endif; ?>
        <!--article-content-->
        <?php if (!empty($match)) : ?>
        <footer class="_article-footer lg:w-8/12 mx-auto">
            Forrás: <?php print $source; ?>
        </footer>
    <?php endif; ?>
    </div>
    <!--container-->
</div>
<!--article-->


        <?php include('./gen_news_block.php'); ?>
        <?php include('./gen_footer.php'); ?>

    </div>
      
  </body>
</html>

