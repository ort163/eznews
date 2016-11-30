<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-15965741-1', 'alexkras.com');
          ga('send', 'pageview');

        </script>
        <style>
            body {
                font-size: 170%;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                <?php 
                    $newsSource = array(
                        array(
                            "title" => "BBC",
                            "url" => "http://feeds.bbci.co.uk/news/rss.xml?edition=us"
                        ),
                        array(
                            "title" => "CNN",
                            "url" => "http://rss.cnn.com/rss/cnn_topstories.rss"
                        ),
                        array(
                            "title" => "Fox News",
                            "url" => "http://feeds.foxnews.com/foxnews/latest"
                        )
                    );

                    function printFeed($url){
                        $rss = simplexml_load_file($url);
                        $count = 0;
                        print '<ul>';
                        foreach($rss->channel->item as$item) {
                            $count++;
                            if($count > 7){
                                break;
                            }
                            print '<li><a href="'.$item->link.'">'.$item->title.'</a></li>';
                        }
                        print '</ul>';
                    }

                    foreach($newsSource as $source) {
                        print '<h2>'.$source["title"].'</h2>';
                        printFeed($source["url"]);
                    }
                ?> 
                </div>
            </div>
        </div>
    </body>
</html>
