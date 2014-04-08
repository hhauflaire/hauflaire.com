<div id="footer"><!-- stopka w postaci poziomego pasa z kolumnowymi menu -->
        	<div id="footer_content">
            	<div id="komentarze"><!-- ostatnie komentarze na stronie -->
                	<h2 title="Ostatnie komentarze"></h2>
                    <ul>
                    	<?php latest_comments_avatars(5,0,false); ?>
                    </ul>
                </div>
            	<div id="archiwum"><!-- archiwum wpisów -->
                	<h2 title="Archiwum"></h2>
                    <ul>
                    	<?php wp_get_archives('type=monthly'); ?>
                    </ul>                    
                </div>           
            	<div id="przyjaciele"><!-- blogroll -->
                	<h2 title="Przyjaciele"></h2>
                    <ul>
                    	<?php wp_list_bookmarks('title_li=&limit=12&orderby=rand&categorize=0'); ?>
                    </ul>                        
                </div>
                <div class="end"></div>
                <h2 class="rights">
                    Portfolio Theme created by <a href="http://vivee.info">Vivee.info</a> &amp; <a href="http://waterdesign.pl">Water Design</a>
                </h2>
                <h2 class="rss"><a href="<?php bloginfo('rss2_url'); ?>" title="RSS"></a></h2>
                <div class="end"></div>                                      
            </div>
        </div><!-- koniec footer -->
		<?php wp_footer(); ?>             
</body>
</html>
