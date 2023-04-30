import { pagintion } from 'paginationjs';

// import styles bundle
// import 'paginationjs/dist/pagination.css';

export default function ajaxPagination() {
  // Set the endpoint for the REST API
  var endpoint = `${window.location.origin}/wp-json/wp/v2/posts`;
  const postsDataContainer = document.querySelector('.posts-container');
  const postsContainer = document.querySelector('.pagination-container');

  // Set the number of posts to display per page
  var postsPerPage = 3;

  // Initialize the Pagination.js plugin
  jQuery('.pagination-container').pagination({
    dataSource: function (done) {
      // Get the total number of posts
      fetch('/wp-json/wp/v2/posts')
        .then(function (response) {
          return response.headers.get('X-WP-Total');
        })
        .then(function (totalPosts) {
          // Calculate the number of pages needed to display all posts
          var numPages = Math.ceil(totalPosts / postsPerPage);

          // Return an array of page numbers to be used as the data source for Pagination.js
          var data = [];
          for (var i = 1; i <= numPages; i++) {
            data.push(i);
          }
          console.log(data);
          done(data);
        });
    },
    pageSize: 1, // We only want to show one page number at a time
    pageRange: 2, // We want to show two additional page numbers on either side of the current page
    ulClassName: 'items-center justify-center',
    prevText: `<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
    <rect width="50" height="50" rx="25" fill="#ffffff" />
    <path d="M11.9393 26.0607C11.3536 25.4749 11.3536 24.5251 11.9393 23.9393L21.4853 14.3934C22.0711 13.8076 23.0208 13.8076 23.6066 14.3934C24.1924 14.9792 24.1924 15.9289 23.6066 16.5147L15.1213 25L23.6066 33.4853C24.1924 34.0711 24.1924 35.0208 23.6066 35.6066C23.0208 36.1924 22.0711 36.1924 21.4853 35.6066L11.9393 26.0607ZM37 26.5H13V23.5H37V26.5Z" fill="#212984" />
    <rect x="0.5" y="0.5" width="49" height="49" rx="24.5" stroke="#2A2D4F" stroke-opacity="0.4" />
  </svg>`,
    nextText: `<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
    <rect width="50" height="50" rx="25" fill="#ffffff" />
    <path d="M38.0607 26.0607C38.6464 25.4749 38.6464 24.5251 38.0607 23.9393L28.5147 14.3934C27.9289 13.8076 26.9792 13.8076 26.3934 14.3934C25.8076 14.9792 25.8076 15.9289 26.3934 16.5147L34.8787 25L26.3934 33.4853C25.8076 34.0711 25.8076 35.0208 26.3934 35.6066C26.9792 36.1924 27.9289 36.1924 28.5147 35.6066L38.0607 26.0607ZM13 26.5H37V23.5H13V26.5Z" fill="#212984" />
    <rect x="0.5" y="0.5" width="49" height="49" rx="24.5" stroke="#2A2D4F" stroke-opacity="0.4" />
  </svg>`,
    callback: function (pageNumber) {
      jQuery('.posts-container').addClass('opacity-0');
      // When the user clicks on a page number, fetch the corresponding posts using the REST API
      // var offset = (pageNumber - 1) * postsPerPage;
      fetch(`/wp-json/wp/v2/posts?page=${pageNumber}&per_page=${postsPerPage}`)
        .then(function (response) {
          return response.json();
        })
        .then(function (posts) {
          // Create a string of HTML for each post, and append them to the posts-list div
          var html = '';
          posts.forEach(function (post) {
            html += `<div class="relative grid overflow-hidden border rounded-sm border-card-border">
              <img src="https://images.placeholders.dev/? width=800&height=600&text=FPO" alt="" class="object-cover lg:h-[220px] h-[150px] w-full">
              <div class="grid p-sp-4">
                <h3><a href="${post.link}" class="stretched-link lg:text-h3-lg text-h3">${post.title.rendered}</a></h3>
                <h5>author</h5>
                <div>tags tags</div>
              </div>
            </div>`;
          });
          jQuery('.posts-container').html(html);
          jQuery('.posts-container').removeClass('opacity-0');
        });
    },
  });
}
