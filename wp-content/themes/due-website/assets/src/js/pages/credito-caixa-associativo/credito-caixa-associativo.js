function accordeon() {
    const accordionTriggers = document.querySelectorAll('[data-toggle="accordion"]');

    const toggleItem = (content, isOpen) => {
        content.style.maxHeight = isOpen ? null : `${content.scrollHeight}px`;
        content.classList.toggle("open", !isOpen);
        content.closest(".duvidas-item").style.paddingBottom = isOpen ? "0" : "32px";
    };

    // Abre o primeiro item ao carregar
    if (accordionTriggers[0]) {
        toggleItem(accordionTriggers[0].nextElementSibling, false);
    }

    accordionTriggers.forEach(trigger => {
        trigger.addEventListener("click", function () {
            document.querySelectorAll(".duvida-response-list.open").forEach(openContent => {
                if (openContent !== this.nextElementSibling) {
                    toggleItem(openContent, true); // Fecha outros itens
                }
            });
            toggleItem(this.nextElementSibling, this.nextElementSibling.classList.contains("open"));
        });
    });

};


function homeResort() {
    var animation = lottie.loadAnimation({
        container: document.getElementById('descubra-lottie-animation'),
        renderer: 'svg',
        loop: true, // Inicialmente, sem loop
        autoplay: false, // A reprodução será controlada manualmente
        path: '/wp-content/themes/due-website/assets/src/lottie/due_infografico.json',

    });

/*     animation.addEventListener('complete', function () {
        animation.playSegments([240, 497], true);
    }); */

    gsap.registerPlugin(ScrollTrigger);

    ScrollTrigger.create({
        trigger: '.descubra',
        start: 'top center',
        once: true,
        onEnter: () => {
            animation.play();
        },
    });
}



function initCredito() {
    accordeon();
    homeResort();
}

export { initCredito };