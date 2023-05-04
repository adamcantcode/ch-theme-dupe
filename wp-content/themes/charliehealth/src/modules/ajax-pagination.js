import { pagination } from 'paginationjs';
import { gsap } from 'gsap';
import { ScrollToPlugin } from 'gsap/ScrollToPlugin';

gsap.registerPlugin(ScrollToPlugin);

export default function ajaxPagination() {
  const initPagination = () => {
    const bodyClasses = Array.from(document.body.classList);
    var [endpoint] = getEndpoint(bodyClasses);
    renderPagination(endpoint);
  };

  const renderPagination = (endpoint) => {
    console.log(endpoint);
    jQuery('.pagination-container').pagination({
      dataSource: function (done) {
        this.totalNumber = 90;
        console.log(this.totalNumber);
        // Make an AJAX request to the WordPress REST API to get the posts
        jQuery.ajax({
          url: endpoint,
          data: {
            per_page: 6, // Change this to the number of posts to display per page
            page: this.pageNumber,
          },
          success: function (data, textStatus, request) {
            // const totalItems = parseInt(
            //   request.getResponseHeader('X-WP-Total')
            // );
            done(data);
          },
        });
      },
      pageSize: 6,
      pageRange: 2,
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
      callback: function (data, pagination) {
        var html = '';
        jQuery.each(data, function (index, post) {
          html += `<div class="relative grid overflow-hidden border rounded-sm border-card-border">
                <img src="https://images.placeholders.dev/? width=800&height=600&text=FPO" alt="" class="object-cover lg:h-[220px] h-[150px] w-full">
                <div class="grid p-sp-4">
                  <h3><a href="${post.link}" class="stretched-link">${post.title.rendered}</a></h3>
                  <h5>author</h5>
                  <div>tags tags</div>
                </div>
              </div>`;
          jQuery('.posts-container').html(html);
        });
      },
      afterPageOnClick: function () {
        scollToPostsContainer();
      },
      beforeNextOnClick: function () {
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
        e.target.classList.add('opacity-0', 'invisible');
        removeTagActive();
        initPagination();
        scollToPostsContainer();
      });
    }
  };

  const getEndpoint = (bodyClasses, tagID) => {
    let endpoint = `${window.location.origin}/wp-json/wp/v2/posts`;
    let endpointQuery = false;

    if (bodyClasses.includes('category')) {
      endpointQuery = true;
      var categories = bodyClasses.map((str) => str.replace('category-', ''));

      categories.forEach((category) => {
        if (!isNaN(category)) {
          var categoryID = category;
          endpoint += `?categories=${categoryID}`;
        }
      });
      if (tagID) {
        endpoint += `&tags=${tagID}`;
      }
    } else if (bodyClasses.includes('page-template-searchpage')) {
      const params = new URLSearchParams(window.location.search);
      const query = params.get('query');

      endpointQuery = true;
      endpoint += `?search=${query}`;
    }
    return [endpoint, endpointQuery];
  };

  termsClickHandler();
  initPagination();
}
