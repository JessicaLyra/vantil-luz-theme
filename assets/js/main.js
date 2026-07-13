document.addEventListener('DOMContentLoaded',()=>{

    // FAQ
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item=>{

        const button = item.querySelector('.faq-question');

        if(button){

            button.addEventListener('click',()=>{

                const isOpen = item.classList.contains('active');

                faqItems.forEach(faq=>{
                    faq.classList.remove('active');
                });

                if(!isOpen){
                    item.classList.add('active');
                }

            });

        }

    });


    // Header scroll
    const header = document.querySelector('.site-header');

    if(header){

        const handleScroll = ()=>{

            if(window.scrollY > 20){
                header.classList.add('scrolled');
            }else{
                header.classList.remove('scrolled');
            }

        };

        handleScroll();

        window.addEventListener('scroll',handleScroll);

    }


    // Menu mobile
    const button = document.querySelector('.menu-toggle');
    const menu = document.querySelector('.nav-menu');

    if(button && menu){

        button.addEventListener('click',()=>{

            menu.classList.toggle('active');

            button.setAttribute(
                'aria-expanded',
                menu.classList.contains('active')
            );

        });

    }

    // Navegação por âncoras
    document.addEventListener('click', (event) => {
        const link = event.target.closest('a[href]');

        if (!link) {
            return;
        }

        const href = link.getAttribute('href');

        if (!href || !href.includes('#')) {
            return;
        }

        try {
            const url = new URL(href, window.location.href);

            if (url.origin !== window.location.origin || !url.hash) {
                return;
            }

            const targetId = url.hash.substring(1);
            const target = document.getElementById(targetId);

            if (!target) {
                return;
            }

            event.preventDefault();

            const offsetTop = target.getBoundingClientRect().top + window.scrollY - (header ? header.offsetHeight + 24 : 24);

            window.scrollTo({
                top: offsetTop,
                behavior: 'smooth'
            });

            if (menu && menu.classList.contains('active')) {
                menu.classList.remove('active');
                button?.setAttribute('aria-expanded', 'false');
            }

            history.pushState(null, '', url.hash);
        } catch (error) {
            console.warn('Erro ao navegar para âncora:', error);
        }
    });


    // Animações AOS
    if(typeof AOS !== 'undefined'){

        AOS.init({
            once:true,
            duration:800,
            easing:'ease-out-cubic'
        });

    }


});