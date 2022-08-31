

jQuery(document).ready(() => {
    // Load more logic
    let loadmore = $('.ajax-blog-list');
    if (loadmore.length > 0) {
        let loading = false;
        let finished = false;
        let pageNo = 2;
        let featuredPostId = loadmore.attr('data-featured');

        loadmore.find('.articles-list__load-more').on('click', () => {

            if (finished === false && loading === false) {
                loading = true;
                loadmore.find('.work-loadmore').show();
                loadmore.find('.articles-list__load-more').hide();

                $.ajax({
                    url: `${window.blog_list_vars.admin_url}admin-ajax.php`,
                    type: 'POST',
                    data: `action=infinite_scroll&post_id=${featuredPostId}&page_no=${pageNo}`,
                    success: function (html) {
                        loadmore.find('.articles-list__container').append(html);
                        pageNo++;

                        if (pageNo > window.blog_list_vars.max_pages) {
                            finished = true;
                            loadmore.find('.articles-list__actions').hide();
                        } else {
                            loadmore.find('.articles-list__load-more').show();
                        }

                        loadmore.find('.work-loadmore').hide();
                        loading = false;
                    },
                });
            }
        });
    }
});

