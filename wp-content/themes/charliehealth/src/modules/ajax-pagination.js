import { pagination } from 'paginationjs';
import { gsap } from 'gsap';
import { ScrollToPlugin } from 'gsap/ScrollToPlugin';

gsap.registerPlugin(ScrollToPlugin);

export default function ajaxPagination() {
  const initPagination = (tagID) => {
    const bodyClasses = Array.from(document.body.classList);
    const postsPerPage = 3;
    var [endpoint] = getEndpoint(bodyClasses, tagID);
    renderPagination(postsPerPage, endpoint, tagID);
  };

  const checkPagination = () => {
    var match = window.location.href.match(/\/page\/(\d+)/);
    if (match) {
      return match[1];
    }
  };

  const renderPagination = (postsPerPage, endpoint, tagID) => {
    jQuery('.pagination-container').pagination({
      dataSource: function (done) {
        fetch(`${endpoint}&_fields=id`)
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
      pageNumber: checkPagination(),
      ulClassName: 'items-center justify-center',
      prevText: `<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none" class="arrow-slider">
      <rect width="50" height="50" rx="25" fill="#ffffff" class="arrow-slider-bg" />
      <path d="M11.9393 26.0607C11.3536 25.4749 11.3536 24.5251 11.9393 23.9393L21.4853 14.3934C22.0711 13.8076 23.0208 13.8076 23.6066 14.3934C24.1924 14.9792 24.1924 15.9289 23.6066 16.5147L15.1213 25L23.6066 33.4853C24.1924 34.0711 24.1924 35.0208 23.6066 35.6066C23.0208 36.1924 22.0711 36.1924 21.4853 35.6066L11.9393 26.0607ZM37 26.5H13V23.5H37V26.5Z" fill="#212984" class="arrow-slider-arrow" />
    </svg>`,
      nextText: `<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none" class="arrow-slider">
      <rect width="50" height="50" rx="25" fill="#ffffff" class="arrow-slider-bg" />
      <path d="M38.0607 26.0607C38.6464 25.4749 38.6464 24.5251 38.0607 23.9393L28.5147 14.3934C27.9289 13.8076 26.9792 13.8076 26.3934 14.3934C25.8076 14.9792 25.8076 15.9289 26.3934 16.5147L34.8787 25L26.3934 33.4853C25.8076 34.0711 25.8076 35.0208 26.3934 35.6066C26.9792 36.1924 27.9289 36.1924 28.5147 35.6066L38.0607 26.0607ZM13 26.5H37V23.5H13V26.5Z" fill="#212984" class="arrow-slider-arrow" />
    </svg>`,
      callback: function (data, pagination) {
        // Add hrefs to pagianted links
        jQuery('.pagination-container .paginationjs-page').each(function (
          index,
          element
        ) {
          var page = jQuery(element).data('num');
          var link = jQuery(element).find('a');
          // Check if on paginated pages already
          if (window.location.href.indexOf('/page/') !== -1) {
            jQuery(link).attr(
              'href',
              window.location.origin + '/blog/page/' + page
            );
          } else {
            jQuery(link).attr('href', window.location.href + '/page/' + page);
          }
        });

        const bodyClasses = Array.from(document.body.classList);
        var [endpoint] = getEndpoint(bodyClasses, tagID);

        endpoint += `&page=${data}&per_page=${postsPerPage}`;

        fetch(endpoint)
          .then(function (response) {
            return response.json();
          })
          .then(function (posts) {
            if (posts.length > 0) {
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
              posts.forEach(function (post) {
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

              noPosts.parentElement.parentElement.remove();
            }
            clickPages();
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
    let endpoint = `${window.location.origin}/wp-json/wp/v2/posts?_embed&_fields=link,title,acf,_links,_embedded&_embed`;

    if (bodyClasses.includes('category')) {
      var categories = bodyClasses.map((str) => str.replace('category-', ''));

      categories.forEach((category) => {
        if (!isNaN(category)) {
          var categoryID = category;
          endpoint += `&categories=${categoryID}`;
        }
      });
      if (tagID) {
        endpoint += `&tags=${tagID}`;
      }
    } else if (bodyClasses.includes('tag')) {
      var categories = bodyClasses.map((str) => str.replace('tag-', ''));

      categories.forEach((tag) => {
        if (!isNaN(tag)) {
          var tagID = tag;
          endpoint += `&tags=${tagID}`;
        }
      });
    } else if (bodyClasses.includes('page-template-searchpage')) {
      const params = new URLSearchParams(window.location.search);
      const query = encodeURIComponent(params.get('query'));

      endpoint += `&search=${query}`;
    } else if (bodyClasses.includes('single-authors')) {
      var author = bodyClasses.map((str) => str.replace('postid-', ''));

      author.forEach((author) => {
        if (!isNaN(author)) {
          var authorID = author;
          endpoint += `&by_author=${authorID}`;
        }
      });
    } else if (bodyClasses.includes('single-medical-reviewer')) {
      var medicalReviewer = bodyClasses.map((str) =>
        str.replace('postid-', '')
      );

      medicalReviewer.forEach((medicalReviewer) => {
        if (!isNaN(medicalReviewer)) {
          var medicalReviewerID = medicalReviewer;
          endpoint = `${window.location.origin}/wp-json/wp/v2/posts?_embed&_fields=link,title,acf,_links,_embedded&_embed`;
          endpoint += `&medical_reviewer=${medicalReviewerID}`;
        }
      });
    } else if (bodyClasses.includes('page-template-page-press')) {
      endpoint = `${window.location.origin}/wp-json/wp/v2/press?_embed&_fields=link,title,acf,_links,_embedded&_embed`;
    }
    return [endpoint, tagID];
  };

  const renderHTML = (post, html) => {
    var imageUrl = `${window.location.origin}/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp`;
    var imageAlt = `Featured image for ${post.title.rendered}`;

    /** NOTE Handle images */
    // Make sure embeded exists
    if (post._embedded) {
      // Check for featured image
      if (post._embedded['wp:featuredmedia']) {
        // Check for cropped image size
        if (
          post._embedded['wp:featuredmedia'][0].media_details.sizes[
            'card-thumb'
          ]
        ) {
          // Use card-thumb size
          imageUrl =
            post._embedded['wp:featuredmedia'][0].media_details.sizes[
              'card-thumb'
            ].source_url;
          // Check for alt text
          if (post._embedded['wp:featuredmedia'][0].alt_text) {
            imageAlt = post._embedded['wp:featuredmedia'][0].alt_text;
          } else {
            imageAlt = `Featured image for ${post.title.rendered}`;
          }
        } else {
          // Use orignal size
          imageUrl = post._embedded['wp:featuredmedia'][0].source_url;
        }
      }
    }

    if (post._embedded['wp:term']) {
      var cats = post._embedded['wp:term'][0];
    }
    if (post._embedded['wp:term']) {
      var tags = post._embedded['wp:term'][1];
    }
    html = `<div class="relative bg-white rounded-lg group">
              <div class="lg:h-[167px] h-[150px] overflow-hidden rounded-t-lg">
                <img src="${imageUrl}" alt="${imageAlt}"  class="object-cover w-full h-full transition-all duration-300 rounded-t-lg group-hover:scale-105">
              </div>
              <div class="grid bg-white rounded-b-lg p-sp-4">
                <h3 class="text-h4-base"><a href="${post.link}" class="block stretched-link">${post.title.rendered}</a></h3>
                <p>${post.acf.by_author.post_title}</p>
              </div>`;
    if (tags) {
      html += `${tags
        .map(
          (tag) =>
            `<div class="absolute rounded-t-lg top-sp-4 left-sp-4"><a href="${tag.link}" class="relative inline-block no-underline rounded-pill px-base5-3 py-base5-2 text-primary bg-white group-hover:bg-white-hover border border-white z-[6] text-h5-base">${tag.name}</a></div>`
        )
        .join('')}`;
    }
    html += `</div><!--end three-->`;
    return html;
  };

  const clickPages = () => {
    jQuery(
      '#postsContainer .paginationjs-prev, #postsContainer .paginationjs-next, #postsContainer .paginationjs-page'
    ).on('click', function () {
      jQuery('.posts-container').addClass('opacity-0 scale-[0.99]');
    });
  };

  termsClickHandler();
  initPagination();
}
