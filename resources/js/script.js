        function slider_carouselInit() {
            $('.owl-carousel.slider_carousel').owlCarousel({
                dots: false,
                loop: false,
                margin: 15,
                stagePadding: 35,
                autoplay: false,
                nav: true,
                navText: ["<i class='far fa-arrow-alt-circle-left'></i>","<i class='far fa-arrow-alt-circle-right'></i>"/*<i class='far fa-arrow-alt-circle-right'></i>*/],
                autoplayTimeout: 1500,
                autoplayHoverPause: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 3
                    }
                }
            });
        }
        slider_carouselInit();