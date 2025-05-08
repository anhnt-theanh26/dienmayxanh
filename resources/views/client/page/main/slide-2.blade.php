<section>
    <div class="large-12 columns container my-3 position-relative advertisement-02-hiding">
        <div class="owl-carousel advertisement-02">
            <div class="item">
                <img class="rounded-2"
                    src="//cdnv2.tgdd.vn/mwg-static/dmx/Banner/48/dc/48dc38ebf05b6b72d7b90b5e31651bcc.png" alt="">
            </div>
            <div class="item">
                <img class="rounded-2"
                    src="//cdnv2.tgdd.vn/mwg-static/dmx/Banner/b2/08/b208ab7dfb9093d2aa31c28b1bd481aa.png" alt="">
            </div>
            <div class="item">
                <img class="rounded-2"
                    src="//cdnv2.tgdd.vn/mwg-static/dmx/Banner/ed/20/ed208a64f855550d995959bde0eb55e1.png" alt="">
            </div>
            <div class="item">
                <img class="rounded-2"
                    src="//cdnv2.tgdd.vn/mwg-static/dmx/Banner/56/20/56200e6e71200eeb7b1b479b6104545e.png" alt="">
            </div>
        </div>
        <div class="position-absolute top-0 p-2 close-advertisement-02"
            style="z-index: 10; cursor: pointer; background-color: rgba(255, 255, 255, 0.7); border-radius: 50%; left: 96%;">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg"
                viewBox="0 0 16 16">
                <path
                    d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
            </svg>
        </div>
    </div>
    <script>
        var owl = $('.advertisement-02');
        owl.owlCarousel({
            autoplay: true,
            margin: 10,
            loop: true,
            slideBy: 2,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 2
                }
            }
        })
        $('.close-advertisement-02').click(function () {
            var advertisement02Hiding = document.querySelector('.advertisement-02-hiding');
            advertisement02Hiding.style.display = 'none';
        });
    </script>
</section>