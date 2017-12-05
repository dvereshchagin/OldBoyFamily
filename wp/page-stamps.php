<?php
/*
    Template Name: Stamps Page
*/
    get_header();
?>
    <div class="container">
      <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

    </div>
    <div class="container">
      <section class="cards">
        <div class="cards__container cards__container--catalog">
        <?php
          $args = array(
            'category_name'=> 'Stamps'
          );
          query_posts($args);
          
            if(have_posts()) {
              while(have_posts()) {
                the_post();

                // vars
                $card_img = get_field('card-img');
                $card_title = get_field('card-title');
                $card_text = get_field('card-text');
                $card_format = get_field('card-format');
                $card_link = get_field('card-link');
                $card_page_link = get_field('card-page-link');
                $card_badge = get_field('card-badge');
                
          ?>
          <div class="cards__card cards__card--catalog">
            <div class="cards__img"><img src="<?php echo $card_img; ?>" alt="card img"/></div>
            <div class="cards__body">
              <h4 class="cards__title"><?php echo $card_title; ?></h4>
              <p class="cards__text"><?php echo $card_text; ?></p>
              <p class="cards__format"><?php echo $card_format?></p><a class="button button--download" href="<?php echo $card_link; ?>">Скачать архив</a>
            </div>
            <div class="cards__footer"><a class="cards__badge" href="#"><?php categories(); ?></a></div>
          </div>
          <?php 
              }
            }
          ?>
          </div>
        </div>
        <div class="container">
            <?php      
        $args = array(
          'show_all'     => false, // показаны все страницы участвующие в пагинации
          'end_size'     => 1,     // количество страниц на концах
          'mid_size'     => 1,     // количество страниц вокруг текущей
          'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
          'prev_text'    => __('« Previous'),
          'next_text'    => __('Next »'),
          'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
          'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
          'screen_reader_text' => __( 'Posts navigation' ),
        );
        ?>
  
  <?php the_posts_pagination($args); ?>
          <!-- <div class="pagination">
            <ul class="pagination__list">
              <li class="pagination__item pagination__item--prev"><a class="pagination__link pagination__link--prev" href="#">Предыдущая</a></li>
              <li class="pagination__item"><a class="pagination__link" href="#">1</a></li>
              <li class="pagination__item"><a class="pagination__link" href="#">2</a></li>
              <li class="pagination__item"><a class="pagination__link" href="#">3</a></li>
              <li class="pagination__item pagination__item--next"><a class="pagination__link" href="#">Следующая</a></li>
            </ul> -->
          </div>
        </div>
      </section>
    </div>
    <?php 
        get_footer();
    ?>
    <script src="scripts.js"></script>
  </body>
</html>