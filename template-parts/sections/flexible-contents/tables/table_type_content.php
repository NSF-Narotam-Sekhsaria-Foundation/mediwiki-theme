<div class="clearfix"></div> 

<div class="container">
    <div class="row">
        <section class="content-section">
            <div class="heading-top-line"></div>
            <?php 
                if( get_sub_field('table_heading_table_type_content') ) { 
                    ?>
                    <h3 class="content-heading"><?php the_sub_field('table_heading_table_type_content'); ?></h3>
                    <?php 
                }
                if(get_sub_field('table_width_col1')!=0 && get_sub_field('table_width_col2')!=0){
                    $width_col1 = get_sub_field('table_width_col1')."%";
                    $width_col2 = get_sub_field('table_width_col2')."%";
                }else{
                    $width_col1 = "";
                    $width_col2 = "";
                }
            ?>
            <div class="col-md-12 padding-left-0">
                <table class="table table-responsive custom-table">
                    <thead>
                        <tr>             
                            <th width="<?php echo $width_col1; ?>" class="col-md-3"><?php the_sub_field('table_column_heading_1'); ?></th>
                            <th width="<?php echo $width_col2; ?>" class="col-md-9"><?php the_sub_field('table_column_heading_2'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if( have_rows('columns') ) {
                                while ( have_rows('columns') ) { 
                                    the_row(); 
                                    ?>
                                    <tr>
                                    <?php 
                                        if( have_rows('content_group_table_type_content') ) {
                                            while( have_rows('content_group_table_type_content') ) {
                                                the_row();
                                                ?>                                        
                                                <td width="<?php echo $width_col1; ?>">
                                                    <?php $heading_inside_table_type_content = get_sub_field('heading_inside_table_type_content');
                                                        if ($heading_inside_table_type_content!="") {
                                                            ?>
                                                            <div class="heading-inside-table"><?php the_sub_field('heading_inside_table_type_content'); ?></div>
                                                            <?php 
                                                        }
                                                    ?>
                                                    <?php $content_inside_table_type_content = get_sub_field('content_inside_table_type_content');
                                                        if ($content_inside_table_type_content!="") {
                                                            ?>
                                                            <div class="content-inside-table">
                                                                <?php the_sub_field('content_inside_table_type_content'); ?>
                                                            </div>
                                                            <?php 
                                                        }
                                                    ?>
                                                </td>
                                                <?php 
                                            }
                                        }
                                    ?>
                                        <td width="<?php echo $width_col2;?>" style="padding-left: 15px!important;">
                                            <?php $content_inside_table_type_content_copy = get_sub_field('content_inside_table_type_content_copy');
                                                if ($content_inside_table_type_content_copy!="") {
                                                    ?>
                                                    <div class="content-inside-table">
                                                        <?php the_sub_field('content_inside_table_type_content_copy'); ?>
                                                    </div>
                                                    <?php 
                                                }
                                            ?>
                                        </td>                                                    
                                    </tr>
                                    <?php 
                                }
                            } 
                        ?>              
                    </tbody>
                  </table>                        
            </div>                
        </section>
    </div>
</div>

<div class="clearfix"></div>   
    