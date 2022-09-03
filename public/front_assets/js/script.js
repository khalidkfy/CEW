const swiper = new Swiper('.partners .swiper', {
    // loop: true,

    navigation: {
        nextEl: '.partners .swiper-button-next',
        prevEl: '.partners .swiper-button-prev',
    },
    autoplay: {
        delay: 5000,
    },

    slidesPerView: 1,
    spaceBetween: 10,

    breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: 2,
            spaceBetween: 20
        },
        // when window width is >= 480px
        480: {
            slidesPerView: 1,
            spaceBetween: 30
        },
        // when window width is >= 640px
        768: {
            slidesPerView: 6,
            spaceBetween: 40
        }
    },
});
const swiper_service = new Swiper('.services .swiper', {
    // loop: true,

    navigation: {
        nextEl: '.services .swiper-button-next',
        prevEl: '.services .swiper-button-prev',
    },
    autoplay: {
        delay: 5000,
    },

    slidesPerView: 1,
    spaceBetween: 10,


    breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        // when window width is >= 480px
        480: {
            slidesPerView: 1,
            spaceBetween: 30
        },
        // when window width is >= 768px
        768: {
            slidesPerView: 3,
            spaceBetween: 16
        },
        1200: {
            slidesPerView: 4,
            spaceBetween: 16
        }
    },
});

const certifications = new Swiper('.certifications .swiper', {
    // loop: true,

    autoplay: {
        delay: 5000,
    },

    slidesPerView: 1,
    spaceBetween: 10,

    breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        // when window width is >= 480px
        480: {
            slidesPerView: 1,
            spaceBetween: 30
        },
        // when window width is >= 768px
        768: {
            slidesPerView: 3,
            spaceBetween: 30
        },
        1200: {
            slidesPerView: 4,
            spaceBetween: 30
        }
    },
});


const swiper_product = new Swiper('.products .swiper', {
    // loop: true,
    autoplay: {
        delay: 5000,
    },
    navigation: {
        nextEl: '.products .swiper-button-next',
        prevEl: '.products .swiper-button-prev',
    },

    slidesPerView: 1,
    spaceBetween: 10,

    breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: 2,
            spaceBetween: 20
        },
        // when window width is >= 480px
        480: {
            slidesPerView: 1,
            spaceBetween: 30
        },
        // when window width is >= 640px
        768: {
            slidesPerView: 3,
            spaceBetween: 16
        },
        1200: {
            slidesPerView: 4,
            spaceBetween: 16
        }
    },
});

const swiper_testimonials = new Swiper('.testimonials .swiper', {
    // loop: true,
    autoplay: {
        delay: 5000,
    },
    slidesPerView: 1,
    spaceBetween: 10,
    
    navigation: {
        nextEl: '.services .swiper-button-next',
        prevEl: '.services .swiper-button-prev',
    },
    pagination: {
        el: '.swiper-pagination',
    },
});


let icon = document.querySelector('.mobile_menu_icon');
let icon_toggle = document.querySelector('.mobile_menu_toggle');
let mobile_menu = document.querySelector('.menu');
let overbg = document.querySelector('.overbg');
let close_menu = document.querySelector('.close-menu');
let links = document.querySelectorAll('.menu-item');

links.forEach(link => {
    link.addEventListener('click', () => {
        mobile_menu.classList.remove('active');
    })
});

icon.addEventListener('click', () => {
    icon_toggle.classList.toggle('active');
    mobile_menu.classList.toggle('active');
    overbg.classList.toggle('active');
})

overbg.addEventListener('click', () => {
    icon_toggle.classList.remove('active');
    mobile_menu.classList.remove('active');
    overbg.classList.remove('active');
})

close_menu.addEventListener('click', (e) => {
    icon_toggle.classList.remove('active');
    mobile_menu.classList.remove('active');
    overbg.classList.remove('active');
    e.preventDefault()
})

let h2footer = document.querySelectorAll('.title-footer');

h2footer.forEach(item => {
    item.addEventListener('click', () => {
        item.classList.toggle('active')
        item.nextElementSibling.classList.toggle('active')
    });
});

let link_item = document.querySelectorAll('.link-item');

link_item.forEach(item01 => {
    item01.addEventListener('click', () => {
        if (item01.classList.contains('active')) {
            item01.nextElementSibling.classList.remove('active');
        }
        item01.nextElementSibling.classList.toggle('active');
    });
});

const swiper1 = new Swiper(".mySwiper", {
    loop: true,
    spaceBetween: 0,
    slidesPerView: 3,
    freeMode: true,
    watchSlidesProgress: true,
    direction: 'vertical',
});
const swiper2 = new Swiper(".mySwiper2", {
    loop: true,
    spaceBetween: 0,
    thumbs: {
        swiper: swiper1,
    },
});

document.querySelector('#selector').addEventListener("focus", () => {
    document.querySelector('#dropdownbox').setAttribute("style", "");
});

function onclickdropitem(id) {
    console.log(id);
    document.querySelector('#selector').value = document.querySelector("#" + id + " p").innerHTML;

    document.querySelector('#dropdownbox').setAttribute("style", "display:none");
}

