<?php 
    get_header();
?>

<div class="breadcrumbs_single_card_listing">
    <div class="container">
        <div class="row">                        
            <div class="col-md-9 col-xs-12">
                <div class="links_area mt-0">
                    <?php 
                        $post_object = get_post_type_object( get_post_type() );
                    ?>                    
                    <h4>
                        <?php
                        if(function_exists('bcn_display')) {
                            bcn_display();
                        }else{?>
                            <span onclick="goBack()"><?php echo $post_object->labels->name;?></span>
                      <?php  }
                        ?>

                    </h4>

                </div>
                <h3 class="banner-heading"><?php the_title(); ?></h3>                                   
            </div> 
            <div class="col-md-3 col-xs-12">
                <div class="pull-right icon-list">
<!--                    <span>-->
<!--                        <a id="copy-title-link" href="javascript:void(0);" data-href="--><?php //the_permalink(); ?><!--" onclick="copyToClipboard(this)">Copy Link</a>-->
<!--                    </span>-->
<!--                    <span>-->
<!--                        <a href="https://wa.me/?text=--><?php //the_permalink(); ?><!--" data-action="share/whatsapp/share" target="_blank"><i class="fa fa-whatsapp"></i></a>-->
<!--                    </span>-->
                    <span class="mobile-hidden">
                        <a href="javascript:vloid(0)" onclick="window.print();return false;"><i class="fa fa-print"></i></a>
                    </span>
                    <!-- <span>
                        <a id="copy-title-link" href="javascript:void(0);" onclick="goBack()">Go Back</a>
                    </span> -->
                </div>
            </div> 
        </div>    
    </div>              
</div>

    <!-- AddToAny BEGIN -->
    <div class="a2a_kit a2a_kit_size_42 a2a_default_style" data-a2a-icon-color="#15a59b">
        <a class="a2a_button_facebook"></a>
        <a class="a2a_button_twitter"></a>
        <a class="a2a_button_whatsapp"></a>
        <a class="a2a_button_email"></a>
    </div>
    <script async src="https://static.addtoany.com/menu/page.js"></script>
    <!-- AddToAny END -->

<section class="grid-area">
    <div class="container">
        <div class="row">

        <?php
            while ( have_posts() ) :
            the_post(); 
        ?>

            <section class="single-card-listing-section">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="heading-top-line"></div>
                        <h3 class="single-card-listing-heading">Address</h3>
                        <div class="single-card-listing-paragraph address-box"><?php the_field('address'); ?></div>

                        <div class="heading-top-line"></div>
                        <h3 class="single-card-listing-heading">Contact</h3>
                        <div class="row">                                    
                            <div class="col-sm-12">                                
                                <?php
                                    if( have_rows('phone_numbers') ) {
                                        while ( have_rows('phone_numbers') ) {
                                            the_row(); 

                                            $phoneNumber = get_sub_field('phone_number');

                                            if ($phoneNumber!="") {
                                                ?>
                                                <p class="single-card-listing-paragraph"><i class="fa fa-phone padding-left-0"></i><?php echo $phoneNumber; ?></p>
                                                <div class="clearfix"></div>
                                                <?php 
                                            }                                            
                                        }
                                    }                                    

                                    if (!$phoneNumber) { 
                                        ?>
                                        <p class="single-card-listing-paragraph"><?php echo "Not available"; ?></p>
                                        <?php    
                                    } 
                                ?>
                            </div>
                        </div>                        

                    </div>
                    <div class="col-md-6 col-sm-12 mt-60-not-mobile">
                        <?php the_field('google_map'); ?>
                    </div> 

                    <div class="clearfix"></div>
                    <?php if(!empty(get_field('editor'))){ ?>
                    <div class="heading-top-line"></div>
                    <div class="row">
                        <div class="col-md-12 theme-content padding-left-0">
                            <br>
                            <?php the_field('editor'); ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>                      
            </section> 
              
            <?php 
                endwhile; // End of the loop.
            ?>                 
        </div>
    </div>
</section>

<section class="grid-area">
    <div class="container">
        <div class="row">
            <section class="single-card-listing-section">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="heading-top-line"></div>
                        <h3 class="single-card-listing-heading">FILTERS</h3>                                
                        <div class="row single-card-listing-filter-heading"> 
                            <?php 
                                $current_post_type = get_post_type( get_the_ID() );

                                // Get all the taxonomies for this post type
                                $taxonomies = get_object_taxonomies($current_post_type, 'objects' );
                                //print_r($taxonomies);
                            
                                $selected_array = array();

                                // Loops through all the available taxonomies
                                foreach( $taxonomies as $taxonomy )  {
                                    $selected_terms = get_the_terms( get_the_ID(), $taxonomy->name ); 
                                    $terms = get_terms( $taxonomy->name, array('hide_empty'=>false, 'order' => 'ASC') );
                                    // If any of the term in the taxonomy selected
                                    if ( $selected_terms ) {
                                        foreach( $selected_terms as $selected_term ) {
                                            array_push( $selected_array, $selected_term->term_id );
                                        }
                                        ?>
                                        <div class="col-md-3 col-sm-6 col-xs-12 col-5-width noMatch" data-mh="filters-group">
                                            <h4><?php echo $taxonomy->labels->name; ?></h4>
                                            <ul class="card">
                                                <?php 
                                                    foreach( $terms as $term ) {
                                                        // Check if this term is selected
                                                        if ( in_array($term->term_id, $selected_array) ) {
                                                            ?>  
                                                            <li class="right_icon"><?php echo $term->name; ?></li>
                                                            <?php
                                                            
                                                        } else {
                                                            ?>  
                                                            <li class="wrong_icon"><?php echo $term->name; ?></li>
                                                            <?php 
                                                        }
                                                    }
                                                ?>
                                            </ul>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="col-md-3 col-sm-6 col-xs-12 col-5-width noMatch" data-mh="filters-group">
                                            <h4><?php echo $taxonomy->labels->name; ?></h4>
                                            <ul class="card">
                                                <?php 
                                                    foreach( $terms as $term ) {
                                                        ?>  
                                                        <li class="wrong_icon"><?php echo $term->name; ?></li>
                                                        <?php 
                                                    }
                                                ?>
                                            </ul>
                                        </div>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>                                                    
                </div>                      
            </section>                    
        </div>
    </div>
</section> 

<div id="snackbar">Link Copied!</div>   

<?php 
    get_footer();
?>