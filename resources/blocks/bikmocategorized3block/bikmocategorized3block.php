<section class="bikmocategorizedblock bikmocategorized3block <?php echo (get_field('bikmo_categorized3_block_border_top') == 'true' ? 'bikmocategorizedblock--border-top' : ''); ?>">
    <div class="wrapper">

        <div class="bikmocategorizedblock-header">
            <h2 class="bikmocategorizedblock-header__title bikmocategorizedblock-header__title--numbered block_title section_title">
                <span class="bikmocategorizedblock-header__title__number green_text"><?php the_field('bikmo_categorized3_block_title_prefix'); ?></span>
                <?php echo preg_replace('/\{(.*?)\}/', '<span class="green_text">$1</span>', get_field('bikmo_categorized3_block_title')); ?>
            </h2>
            <div class="bikmocategorizedblock-header__subtitle block-text-regular"><?php the_field('bikmo_categorized3_block_subtitle'); ?></div>
        </div>

        <div class="bikmocategorizedblock-body">
        
            <?php if( have_rows('bikmo_categorized3_block_content') ): ?>
                <?php while( have_rows('bikmo_categorized3_block_content') ): the_row(); ?>

                    <?php if( get_row_layout() == 'text_g' ): ?>
                        <div class="bikmocategorized3block__text block-text-regular">
                            <?php the_sub_field('text'); ?>
                        </div>

                    <?php elseif( get_row_layout() == 'list_g' ): ?>
                        <?php if (have_rows('list')) : ?>
                            <ul class="bikmocategorized3block__list">
                            <?php while (have_rows('list')) : ?>
                                <?php the_row(); ?>
                                <li><?php the_sub_field('item'); ?></li>
                            <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>

                    <?php elseif( get_row_layout() == 'table_g' ): ?>

                        <?php
                        $table = [];
                        $table_head = [];
                        $table_values = [];

                        if (have_rows('rows')) : 
                            while (have_rows('rows')) : the_row();
                                $values = [];
                                $values2 = [];
                                if (have_rows('columns')) :
                                    while (have_rows('columns')) : the_row();

                                        $k = get_sub_field('name');
                                        $v = get_sub_field('value');

                                        if (!in_array($k, $table_head)) {
                                            $table_head[] = $k;
                                        }

                                        $values[] = $v;
                                        $values2[$k] = $v;

                                    endwhile;
                                endif;
                                $table_values[] = $values;
                                $table[] = $values2;
                            endwhile;
                        endif;
                        ?>

                        
                        <div class="bikmocategorized3block_rows bikmocategorized3block_rows--mobile">
                            <?php foreach($table as $group): ?>
                                <div class="bikmocategorized3block_rows__card">
                                    <?php foreach($group as $k => $v): ?>
                                            <div class="bikmocategorized3block_rows__card__group">
                                                <div class="bikmocategorized3block_rows__label"><?php echo $k; ?></div>
                                                <div class="bikmocategorized3block_rows__value"><?php echo $v; ?></div>
                                            </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>


                        <table class="bikmo_table bikmocategorized3block_rows bikmocategorized3block_rows--desktop">
                            <thead>
                                <tr>
                                    <?php foreach($table_head as $th): ?>
                                        <th class="bikmocategorized3block_rows__th">
                                            <?php echo $th ?>
                                        </th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach($table_values as $row): ?>
                                    <tr>
                                        <?php foreach($row as $value): ?>
                                            <td class="bikmocategorized3block_rows__td">
                                                <?php echo $value; ?>
                                            </td>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    <?php endif; ?><!-- END FELXIBLE CONTENT BLOCKS -->

                <?php endwhile; ?>
            <?php endif; ?><!-- END FELXIBLE CONTENT -->

        </div>
    </div>
</section>