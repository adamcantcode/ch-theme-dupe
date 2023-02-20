<?php get_header(); ?>

<main id="primary" class="site-main ">
  <?php the_content(); ?>
  <!-- Sample content to base typograpgy on [http://snipplr.com/view/8121/html-test-page-for-css-style-guide] -->
  <h1>CSS Basic Elements</h1>

  <p>The purpose of this HTML is to help determine what default settings are with CSS and to make sure that all possible HTML Elements are included in this HTML so as to not miss any possible Elements when designing a site.</p>

  <hr />

  <h2 id="headings">Headings</h2>

  <h1 class="text-h1-xl">h1-xl The quick brown fox jumps over the lazy dog</h1>
  <h1>h1 The quick brown fox jumps over the lazy dog</h1>
  <h2>h2 The quick brown fox jumps over the lazy dog</h2>
  <h3>h3 The quick brown fox jumps over the lazy dog</h3>
  <h4>h4 The quick brown fox jumps over the lazy dog</h4>
  <h5>h5 The quick brown fox jumps over the lazy dog</h5>
  <h6>h6 The quick brown fox jumps over the lazy dog</h6>

  <small><a href="#wrapper">[top]</a></small>
  <hr />


  <h2 id="paragraph">Paragraph</h2>

  <img style="float:right" src="http://placehold.it/250x125" alt="CSS | God's Language" />
  <p>Lorem ipsum dolor sit amet, <a href="#" title="test link">test link</a> adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim diam eget metus. Maecenas ornare tortor. Donec sed tellus eget sapien fringilla nonummy. Mauris a ante. Suspendisse quam sem, consequat at, commodo vitae, feugiat in, nunc. Morbi imperdiet augue quis tellus.</p>
  <img src="http://placehold.it/800x400" alt="CSS | God's Language" />

  <p>Lorem ipsum dolor sit amet, <em>emphasis</em> consectetuer adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim diam eget metus. Maecenas ornare tortor. Donec sed tellus eget sapien fringilla nonummy. Mauris a ante. Suspendisse quam sem, consequat at, commodo vitae, feugiat in, nunc. Morbi imperdiet augue quis tellus.</p>

  <small><a href="#wrapper">[top]</a></small>
  <hr />

  <h2 id="list_types">List Types</h2>

  <h3>Ordered List</h3>
  <ol>
    <li>List Item 1</li>
    <li>List Item 2</li>
    <li>List Item 3</li>
  </ol>

  <h3>Unordered List</h3>
  <ul>
    <li>List Item 1</li>
    <li>List Item 2</li>
    <li>List Item 3</li>
  </ul>

  <small><a href="#wrapper">[top]</a></small>
  <hr />

  <small><a href="#wrapper">[top]</a></small>
  <hr />

  <h2 id="misc">Misc Stuff - abbr, acronym, pre, code, sub, sup, etc.</h2>

  <blockquote>
    "This stylesheet is going to help so freaking much." <cite>Blockquote</cite>
  </blockquote>

  <small><a href="#wrapper">[top]</a></small>
</main>

<?php get_footer(); ?>