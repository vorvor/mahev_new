<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
        include('./gen_header.php'); 
    ?>
  </head>
  <body class="debug-screens bg-white article-page"> 



    
    <div id="sitewrapper">
      
      <?php include('./gen_svg.php'); ?>
      <?php include('./gen_header_menu.php'); ?>
      <?php include('./db.php'); ?>
      <?php include_once('./get_articles.php'); ?>


      <?php
        $data = curl_get_contents('https://mahev.hu/articles-api-one/' . $_GET['q']);
        $article_data = json_decode($data, true);
        $article = $article_data['nodes'][0]['node'];
        $tags = explode(',', $article['field_tags']);
        //print('<pre>');
        //print_r($article);
        //print('</pre>');
      ?>

      <div class="py-16">
    <div class="_article container">
        <header class="lg:grid lg:grid-cols-3 gap-8 mb-16">
            <div class="col-span-2 mb-8 flex flex-col">
                <div class=" _section-title2 _io w-full text-gray-500 leading-loose text-center mx-auto md:text-left md:mx-0 max-w-md">
    
    <h2 class="text-2xl md:text-3xl leading-snug"><?php print $article['title']; ?></h2>
    <div class="w-16 border-t-2 border-emerald-500 mx-auto md:ml-0 my-4 md:my-8"></div>
</div>
                <div class="border-2 border-gray-400 block mb-4 mx-auto md:ml-0 px-4 py-2 text-gray-400 z-10"><?php print $article['created']; ?></div>
            </div>
            <div>
                <ul class="_tags text-gray-500 flex -mx-2 flex-wrap justify-center sm:justify-start lg:justify-end">
                    <?php foreach ($tags as $tag): ?>
                    <li class="inline-flex mx-2 mb-2"><a class="bg-gray-50 hover:bg-gray-100 px-4 py-1" href="#"><?php print $tag; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </header>
        <main class="_article-content lg:w-8/12 mx-auto">
            <h2>
                <?php print $article['field_lead']; ?>
            </h2>
            
            <?php
                $body = $article['field_body'];
                $body = str_replace('/sites/default/files', 'https://mahev.hu/sites/default/files', $body);

                preg_match('/Forrás:.*?(<a.*?<\/a>)/', $body, $match);
                $source = $match[1];
                $body = preg_replace('/Forrás:.*?<a.*?<\/a>/', '', $body);
                
                print $body;


            ?>
            

        </main>
        <!--article-content-->
        <?php if (isset($match)) : ?>
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

