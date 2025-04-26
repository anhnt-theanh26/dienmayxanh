<script>
    let searchInput = document.querySelector('input[name="search"]');
    if (searchInput) {
        let debounceTimer;
        searchInput.addEventListener('input', function() {
            clearTimeout(debounceTimer)
            debounceTimer = setTimeout(() => {
                keyword = searchInput.value.trim();
                if (keyword == '') {
                    keyword = ' ';
                }
                $.ajax({
                        url: '/admin/' + tableName + '/' + keyword + '/search',
                        type: 'GET',
                        data: {
                            status: status
                        }
                    })
                    .done((response) => {
                        console.log(tableName)
                        RenderListSearch(response);
                    })
            }, 100);
        });
    
        function RenderListSearch(response) {
            if ($("#search")) {
                $("#search").empty();
                $("#search").html(response);
            }
        }
    }

</script>
