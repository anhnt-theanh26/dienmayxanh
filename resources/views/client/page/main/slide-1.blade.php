<section>
    <div class="large-12 columns container my-3 position-relative advertisement-01-hiding">
        <div class="owl-carousel advertisement-01">
            <div class="item">
                <img class="rounded-2"
                    src="//cdnv2.tgdd.vn/mwg-static/dmx/Banner/8d/5d/8d5d47656d21928591d948390fd158fa.png" alt="">
            </div>
        </div>
        <div class="position-absolute top-0 p-2 close-advertisement-01"
            style="z-index: 10; cursor: pointer; background-color: rgba(255, 255, 255, 0.7); border-radius: 50%; left: 96%;">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg"
                viewBox="0 0 16 16">
                <path
                    d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
            </svg>
        </div>
    </div>
    <script>
        var owl = $('.advertisement-01');
        owl.owlCarousel({
            margin: 10,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
        $('.close-advertisement-01').click(function () {
            var advertisement02Hiding = document.querySelector('.advertisement-01-hiding');
            advertisement02Hiding.style.display = 'none';
        });
    </script>
</section>