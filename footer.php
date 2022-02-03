<footer>

    <hr />

        <a href="https://www.facebook.com/anxiousarchives/" target="_blank">
        <img alt="facebook icon" src ="<?php bloginfo('template_directory');?>/images/fbicon.svg"></a>

        <a href = "https://www.instagram.com/anxiousarchives/" target="_blank">
            <img alt="instagram icon" src ="<?php bloginfo('template_directory');?>/images/instaicon.svg"></a> 


        <a href="mailto:anxiousarchives@gmail.com" target="_blank">	
        <img alt="gmail icon" src ="<?php bloginfo('template_directory');?>/images/gmailicon.svg"></a>


        <a href="https://www.tiktok.com/@anxiousarchives" target="_blank">
        <img alt="tiktok icon" src ="<?php bloginfo('template_directory');?>/images/tiktok.svg"></a>


        <?php 
        wp_nav_menu(

            array(

                'theme_location' => 'footer-menu',
                'menu_class' => 'footer-menu'
            )
            );?>


        <p>&copy <?php echo date("Y") ?> anxiousArchives</p>


        
    </div>

   
</footer>    
<?php wp_footer();?>


			



</body>
</html>