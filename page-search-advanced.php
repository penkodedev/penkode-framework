<?php
ob_start();
/*
* Template Name: Advanced Search
*/
get_header(); // Calls the WordPress Header

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

    <section class="page-title">
        <div class="page-title-container">
            <h1><?php the_title(); ?></h1>
        </div>
    </section>
    <main class="grid-main animate fadeIn" id="main-container">
        <article class="grid-article">


        
        <form id="news-search-form">
  <select name="genre" id="genre-select">
    <option value="">All Genres</option>
    <?php
    // Retrieve the genre terms
    $genres = get_terms(array('taxonomy' => 'genre', 'hide_empty' => false));
    foreach ($genres as $genre) {
      echo '<option value="' . $genre->slug . '">' . $genre->name . '</option>';
    }
    ?>
  </select>
  <input type="checkbox" name="rock" value="1"> Rock
  <button type="submit">Search</button>
</form>

<div id="news-results-container">
  <div id="news-results"></div>
  <div id="loading-spinner" style="display: none;"></div>
</div>





        </article>
    </main>

   
   
    <script>

jQuery(document).ready(function($) {
  var searchForm = $('#news-search-form');
  var resultsContainer = $('#news-results');

  searchForm.on('submit', function(e) {
    e.preventDefault();
    loadNewsResults();
  });

  // Trigger the search when the genre select changes
  $('#genre-select').on('change', function() {
    loadNewsResults();
  });

  function loadNewsResults() {
    var formData = searchForm.serialize();

    $.ajax({
      type: 'GET',
      url: '<?php echo admin_url('admin-ajax.php'); ?>',
      data: formData + '&action=search_news',
      beforeSend: function() {
        // Show loading spinner
        $('#loading-spinner').show();
        resultsContainer.empty();
      },
      success: function(response) {
        if (response.success) {
          // Process the response and update the HTML
          var results = response.data;
          resultsContainer.html(results.join(''));
        } else {
          console.log(response.data);
        }
      },
      error: function(xhr, textStatus, errorThrown) {
        console.log(xhr.responseText);
      },
      complete: function() {
        // Hide loading spinner
        $('#loading-spinner').hide();
      }
    });
  }
});



</script>




    <?php get_footer(); ?>