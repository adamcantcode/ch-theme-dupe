import { pagination } from 'paginationjs';
import { gsap } from 'gsap';
import { ScrollToPlugin } from 'gsap/ScrollToPlugin';

gsap.registerPlugin(ScrollToPlugin);

export default function ajaxPaginationSearch() {
  const initPagination = (tagID) => {
    const bodyClasses = Array.from(document.body.classList);
    const postsPerPage = 6;
    var [endpoint] = getEndpoint(bodyClasses, tagID);
    renderPagination(postsPerPage, endpoint, tagID);
  };

  const renderPagination = (postsPerPage, endpoint, tagID) => {
    jQuery('.pagination-container').pagination({
      dataSource: function (done) {
        fetch(`${endpoint}`)
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
            done(data);
          });
      },
      pageSize: 1,
      pageRange: 2,
      ulClassName: 'items-center justify-center',
      prevText: `<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none" class="arrow-slider">
      <rect width="50" height="50" rx="25" fill="#ffffff" class="arrow-slider-bg" />
      <path d="M11.9393 26.0607C11.3536 25.4749 11.3536 24.5251 11.9393 23.9393L21.4853 14.3934C22.0711 13.8076 23.0208 13.8076 23.6066 14.3934C24.1924 14.9792 24.1924 15.9289 23.6066 16.5147L15.1213 25L23.6066 33.4853C24.1924 34.0711 24.1924 35.0208 23.6066 35.6066C23.0208 36.1924 22.0711 36.1924 21.4853 35.6066L11.9393 26.0607ZM37 26.5H13V23.5H37V26.5Z" fill="#212984" class="arrow-slider-arrow" />
      <rect x="0.5" y="0.5" width="49" height="49" rx="24.5" stroke="#2A2D4F" stroke-opacity="0.4" />
    </svg>`,
      nextText: `<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none" class="arrow-slider">
      <rect width="50" height="50" rx="25" fill="#ffffff" class="arrow-slider-bg" />
      <path d="M38.0607 26.0607C38.6464 25.4749 38.6464 24.5251 38.0607 23.9393L28.5147 14.3934C27.9289 13.8076 26.9792 13.8076 26.3934 14.3934C25.8076 14.9792 25.8076 15.9289 26.3934 16.5147L34.8787 25L26.3934 33.4853C25.8076 34.0711 25.8076 35.0208 26.3934 35.6066C26.9792 36.1924 27.9289 36.1924 28.5147 35.6066L38.0607 26.0607ZM13 26.5H37V23.5H13V26.5Z" fill="#212984" class="arrow-slider-arrow" />
      <rect x="0.5" y="0.5" width="49" height="49" rx="24.5" stroke="#2A2D4F" stroke-opacity="0.4" />
    </svg>`,
      callback: function (data, pagination) {
        jQuery('.pagination-container .paginationjs-page').each(function (
          index,
          element
        ) {
          var page = jQuery(element).data('num');
          var link = jQuery(element).find('a');
          jQuery(link).attr('href', window.location.href + '/page/' + page);
        });

        const bodyClasses = Array.from(document.body.classList);
        var [endpoint] = getEndpoint(bodyClasses, tagID);

        jQuery('.posts-container').addClass('opacity-0 scale-[0.99]');

        endpoint += `&page=${data}&per_page=${postsPerPage}`;
        console.log(endpoint);

        fetch(endpoint)
          .then(function (response) {
            return response.json();
          })
          .then(function (posts) {
            if (posts.results.length > 0) {
              const noPosts = document.querySelector('.no-posts-js');
              const pagination = document.querySelector(
                '.pagination-container'
              );
              const postsContainer = document.querySelector('.posts-container');

              pagination.classList.remove('noshow');
              postsContainer.classList.remove('noshow');

              noPosts.classList.add('opacity-0');
              noPosts.classList.add('invisible');
              noPosts.classList.add('absolute');
              var html = '';
              posts.results.forEach(function (post) {
                html += renderHTML(post, html);
              });
              jQuery('.posts-container').html(html);
              jQuery('.posts-container').removeClass('opacity-0 scale-[0.99]');
            } else {
              const noPosts = document.querySelector('.no-posts-js');
              const pagination = document.querySelector(
                '.pagination-container'
              );
              const postsContainer = document.querySelector('.posts-container');

              pagination.classList.add('noshow');
              postsContainer.classList.add('noshow');

              noPosts.classList.remove('opacity-0');
              noPosts.classList.remove('invisible');
              noPosts.classList.remove('absolute');
            }
          });
      },
      afterPageOnClick: function () {
        scollToPostsContainer();
      },
      afterNextOnClick: function () {
        scollToPostsContainer();
      },
      afterPreviousOnClick: function () {
        scollToPostsContainer();
      },
    });
  };

  const scollToPostsContainer = () => {
    // TODO update scroll to for press, different anchor
    gsap.to(window, {
      duration: 1,
      ease: 'Power2.easeInOut',
      scrollTo: '#postsContainer',
      scrollTo: {
        y: '#postsContainer',
        offsetY: (self) => document.querySelector('header').offsetHeight,
      },
    });
  };

  const removeTagActive = (tags = document.querySelectorAll('.js-tag-id')) => {
    tags.forEach((tag) => {
      tag.classList.remove('active');
    });
  };

  const termsClickHandler = () => {
    var tags = document.querySelectorAll('.js-tag-id');
    var reset = document.querySelector('.js-reset');
    tags.forEach((tag) => {
      tag.addEventListener('click', (e) => {
        var tagID = e.target.getAttribute('data-tag-id');

        removeTagActive();
        e.target.classList.add('active');
        reset.classList.remove('opacity-0', 'invisible');
        initPagination(tagID);
        scollToPostsContainer();
      });
    });

    if (reset) {
      reset.addEventListener('click', (e) => {
        reset.classList.add('opacity-0', 'invisible');
        removeTagActive();
        initPagination();
        scollToPostsContainer();
      });
    }
  };

  const getEndpoint = (bodyClasses, tagID) => {
    const params = new URLSearchParams(window.location.search);
    const query = encodeURIComponent(params.get('query'));

    const endpoint = `${window.location.origin}/wp-json/search-by-title/v1/search?term=${query}`;
    return [endpoint, tagID];
  };

  const renderHTML = (post, html) => {
    var imageUrl =
      'https://images.placeholders.dev/?width=800&height=600&text=FPO';
    var imageAlt = `Featured image for ${post.title.rendered}`;

    if (post.tags) {
      var tags = post.tags;
    }
    html = `<div class="relative grid overflow-hidden border rounded-sm border-card-border hover:shadow-lg duration-300">
                <img src="${
                  post.featured_media ? post.featured_media : imageUrl
                }" alt="${imageAlt}" class="object-cover lg:h-[220px] h-[150px] w-full">
                <div class="grid p-sp-4">
                  <h3><a href="${post.link}" class="stretched-link">${
      post.title
    }</a></h3>
                  <h5 class="mb-sp-4">${post.acf.by_author.post_title}</h5>
                  <div class="grid justify-start grid-flow-col gap-sp-4 items-end">`;
    if (tags) {
      html += `${tags
        .map(
          (tag) =>
            `<a href="${window.location.origin}/post-tags/${tag.slug}" class="px-sp-4 py-sp-3 no-underline rounded-lg text-h6 bg-tag-gray z-20 relative inline-block hover:bg-bright-teal">${tag.name}</a>`
        )
        .join('')}`;
    }
    html += `</div>
                  </div>
                  </div>`;
    return html;
  };

  termsClickHandler();
  initPagination();
}
