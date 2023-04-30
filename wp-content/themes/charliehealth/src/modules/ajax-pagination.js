import { pagintion } from 'paginationjs';

// import styles bundle
import 'paginationjs/dist/pagination.css';

export default function ajaxPagination() {
  // Set the endpoint for the REST API
  var endpoint = `${window.location.origin}/wp-json/wp/v2/posts`;
  const postsDataContainer = document.querySelector('.posts-container');
  const postsContainer = document.querySelector('.pagination-container');

  // Set up pagination options
  var options = {
    dataSource: function (done) {
      // Fetch the first page of posts using the REST API
      jQuery.getJSON(
        '/wp-json/wp/v2/posts',
        {
          // per_page: 3,
          page: 1,
        },
        function (data) {
          console.log(data);
          done(data, data.length);
        }
      );
    },
    pageSize: 3,
    callback: function (data, pagination,) {
      // Render the current page of posts
      // console.log(data, pagination);
      var html = '';
      jQuery.each(data, function (index, item) {
        console.log(item);
        html += `<div class="relative grid overflow-hidden border rounded-sm border-card-border">
        <img src="https://images.placeholders.dev/?width=800&height=600&text=FPO" alt="" class="object-cover lg:h-[220px] h-[150px] w-full">
        <div class="grid p-sp-4">
          <h3><a href="${item.link}" class="stretched-link lg:text-h3-lg text-h3">${item.title.rendered}</a></h3>
          <h5>author</h5>
          <div>tags tags</div>
        </div>
      </div>`;
      });
      jQuery('.posts-container').html(html);
    },
  };

  // Initialize pagination
  jQuery('.pagination-container').pagination(options);

  // Handle page clicks
  jQuery(document).on('click', '.paginationjs-page', function (event) {
    console.log('test');
    event.preventDefault();
    var page = jQuery(this).attr('data-num')
    // Fetch the requested page of posts using the REST API
    jQuery.getJSON(
      '/wp-json/wp/v2/posts',
      {
        per_page: 3,
        page: page,
      },
      function (data) {
        // Update the posts container with the new page of posts
        var html = '';
        jQuery.each(data, function (index, item) {
          html += `<div class="relative grid overflow-hidden border rounded-sm border-card-border">
          <img src="https://images.placeholders.dev/?width=800&height=600&text=FPO" alt="" class="object-cover lg:h-[220px] h-[150px] w-full">
          <div class="grid p-sp-4">
            <h3><a href="${item.link}" class="stretched-link lg:text-h3-lg text-h3">${item.title.rendered}</a></h3>
            <h5>author</h5>
            <div>tags tags</div>
          </div>
        </div>`;
        });
        jQuery('.posts-container').html(html);
      }
    );
  });

  // jQuery('.posts-container').pagination({
  //   dataSource: posts,
  //   pageSize: 3,
  //   pageRange: 1,
  //   callback: function (data, pagination) {
  //     var dataHtml = '';
  //     jQuery.each(data, function (index, item) {
  //       console.log(item);
  //       dataHtml += `<div class="relative grid overflow-hidden border rounded-sm border-card-border">
  //             <img src="https://images.placeholders.dev/?width=800&height=600&text=FPO" alt="" class="object-cover lg:h-[220px] h-[150px] w-full">
  //             <div class="grid p-sp-4">
  //               <h3><a href="${item.link}" class="stretched-link lg:text-h3-lg text-h3">${item.title.rendered}</a></h3>
  //               <h5>author</h5>
  //               <div>tags tags</div>
  //             </div>
  //           </div>`;
  //     });
  //     jQuery('.posts-data-container').html(dataHtml);
  //   },
  // });
}
