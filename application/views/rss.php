
<?xml version="1.0" encoding="utf-8" ?>

<rss version="2.0">

	<channel>
    		<title>¿ Quién Compró ?</title>

   <description>Plataforma de periodismo de datos para transparentar el uso del dinero público en el Congreso de México</description>
	           
<?php
                        foreach ($nota as $key => $value) {
                    ?>
                        <item>
                            <link><?=base_url()?>rss/RSS<?=$value['id']?>/<?=urlencode($value['title'])?></link>
                            
                         

       <link>http://quiencompro.com/</link>


       <description>Plataforma de periodismo de datos para transparentar el uso del dinero público en el Congreso de México</description>
    	           
        <?php
             foreach ($nota as $key => $value) {
        ?>
        <item>
           <link><?=base_url()?>notas/rss/<?=$value['id']?>/<?=urlencode($value['title'])?> </link>
                                   

                 <author>quiencompro@gmail.com</author>
                 <pubDate><?=$value['modify_date']?></pubDate>
                 <title> <?=$value['title'];?> </title>
                 <description> <?=$value['description'];?> </description>
                                       
                               
        </item>
         <?php
                  }
         ?>

	</channel>
</rss>
