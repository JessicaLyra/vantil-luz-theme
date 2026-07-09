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


    // Animações AOS
    if(typeof AOS !== 'undefined'){

        AOS.init({
            once:true,
            duration:800,
            easing:'ease-out-cubic'
        });

    }


});