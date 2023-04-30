import { pagintion } from 'paginationjs';

// import styles bundle
import 'paginationjs/dist/pagination.css';

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
      fetch('/wp-json/wp/v2/posts?per_page=1')
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
    callback: function (pageNumber) {
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
          jQuery('.posts-container').addClass('opacity-0');
          setTimeout(function () {
            jQuery('.posts-container').html(html);
            jQuery('.posts-container').removeClass('opacity-0');
          }, 300);
        });
    },
  });
}
