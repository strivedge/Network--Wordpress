
     
      // Specific to "mortgage" page
    	let tabChangeInterval;

		function changeTab2() {
		  const $tabs = jQuery('.customtabs2').find('.nav-link');
		  const $activeTab = jQuery('.customtabs2 .nav-tabs .active');
		  const currentIndex = $tabs.index($activeTab);
		  const nextIndex = (currentIndex + 1) % $tabs.length;

		  console.log(`Changing2 tab from ${currentIndex} to ${nextIndex}`);
		  $tabs.eq(nextIndex).tab('show');
		}

		function startTabChange() {
		  tabChangeInterval = setInterval(changeTab2, 10000);
		  console.log("Tab change started");
		}

		function stopTabChange() {
		  clearInterval(tabChangeInterval);
		  console.log("Tab change stopped");
		}



	jQuery(document).ready(function($) {

		 function changeTab() {
	      const $tabs = $('.customtabs').find('.nav-link');
	      const $activeTab = $('.customtabs .nav-tabs .active');
	      const currentIndex = $tabs.index($activeTab);
	      const nextIndex = (currentIndex + 1) % $tabs.length;
	  	  console.log(`Changing tab from ${currentIndex} to ${nextIndex}`);	
	      $tabs.eq(nextIndex).tab('show');
	    }
	  
	    // Change tab every 8 seconds
	    setInterval(changeTab, 8000); 

	    function changeTab1() {
	      const $tabs = $('.customtabs1').find('.nav-link');
	      const $activeTab = $('.customtabs1 .nav-tabs .active');
	      const currentIndex = $tabs.index($activeTab);
	      const nextIndex = (currentIndex + 1) % $tabs.length;
	  	  console.log(`Changing1 tab from ${currentIndex} to ${nextIndex}`);	
	      $tabs.eq(nextIndex).tab('show');
	    }
	  
	    // Change tab every 6 seconds
	    setInterval(changeTab1, 6000);

		startTabChange();


	    $('.customtabs2 .nav-tabs').on('mouseenter', function() {
	     console.log("Mouse entered, stopping tab change");
	     stopTabChange();
	    });
		  
		$('.customtabs2 .nav-tabs').on('mouseleave', function() {
		    console.log("Mouse left, starting tab change");
		    startTabChange();
		});



	  $('.customtabs2 .tab-content').on('mouseenter', function() {
	     console.log("Mouse entered, stopping tab change");
	     stopTabChange();
	    });
		  
		$('.customtabs2 .tab-content').on('mouseleave', function() {
		    console.log("Mouse left, starting tab change");
		    startTabChange();
		});


    $(window).on('load', function () {
        AOS.refresh();
    });
    $(function () {
        AOS.init();
    });





    /* Main Menu
    ========================================================*/ 
    jQuery('.mega-menu-item-has-children.mega-menu-flyout').on('click', 'a[href="javascript:void(0);"]', function(){
      jQuery(this).parent().addClass('mega-toggle-on');
      document.querySelector('.NavshoverBg').style.minHeight = '210px';
      document.body.classList.add('megamenu-active');
    });

    /* Client Testimonial
    ========================================================*/
    $('.testimonial').slick({
        arrows: true,
        autoplay: true,
        autoplaySpeed: 1500,
        slidesToShow:1,
        slidesToScroll:1
    });

    /* Footer Menu
    ========================================================*/
    $('.footer-menu').on('click', 'h3', function(){
        $(this).parent().toggleClass('active');
    });


    /* Image Parallax
    ========================================================*/
    $('.img-parallax').each(function(){
      var img = $(this);
      var imgParent = $(this).parent();
      function parallaxImg () {
        var speed = img.data('speed');
        var imgY = imgParent.offset().top;
        var winY = $(this).scrollTop();
        var winH = $(this).height();
        var parentH = imgParent.innerHeight();


        // The next pixel to show on screen      
        var winBottom = winY + winH;

        // If block is shown on screen
        if (winBottom > imgY && winY < imgY + parentH) {
          // Number of pixels shown after block appear
          var imgBottom = ((winBottom - imgY) * speed);
          // Max number of pixels until block disappear
          var imgTop = winH + parentH;
          // Porcentage between start showing until disappearing
          var imgPercent = ((imgBottom / imgTop) * 100) + (50 - (speed * 50));
        }
        img.css({
          top: imgPercent + '%',
          transform: 'translate(-50%, -' + imgPercent + '%)'
        });
      }
      $(document).on({
        scroll: function () {
          parallaxImg();
        }, ready: function () {
          parallaxImg();
        }
      });
    });

    /* Tabbing Content Auto Change
    ========================================================*/

    // function changeTab() {
    //   const $tabs = $('.custom-tabs .nav-tabs').find('.nav-link');
    //   const $activeTab = $('.custom-tabs .nav-tabs .active');
    //   const currentIndex = $tabs.index($activeTab);
    //   const nextIndex = (currentIndex + 1) % $tabs.length;
  
    //   $tabs.eq(nextIndex).tab('show');
    // }
  
    // // Change tab every 8 seconds
    // setInterval(changeTab, 8000);


      


});


/* Marquee Content
========================================================*/
const root = document.documentElement;
const marqueeContent_1 = document.querySelector(`ul.marqueeSlide_1`);
const marqueeContent_2 = document.querySelector(`ul.marqueeSlide_2`);
const marqueeElementsDisplayedone = getComputedStyle(root).getPropertyValue("--marquee-elements-displayed-one");
const marqueeElementsDisplayedtwo = getComputedStyle(root).getPropertyValue("--marquee-elements-displayed-two");

if (marqueeContent_1) {
	root.style.setProperty("--marquee-elements-one", marqueeContent_1.children.length);
	root.style.setProperty("--marquee-elements-two", marqueeContent_1.children.length);

	for (let i = 0; i < marqueeElementsDisplayedone * 2; i++) {
		marqueeContent_1.appendChild(marqueeContent_1.children[i % marqueeContent_1.children.length].cloneNode(true));
	}
}
if (marqueeContent_2) {
	for (let i = 0; i < marqueeElementsDisplayedtwo * 2; i++) {
	  marqueeContent_2.appendChild(marqueeContent_2.children[i % marqueeContent_2.children.length].cloneNode(true));
	}
}


/* Menu Hover add and remove Class
========================================================*/
document.querySelectorAll('.mega-menu-item-has-children').forEach(function(items) {
    items.addEventListener('mouseenter', function() {
        document.body.classList.add('megamenu-active');
    });

    items.addEventListener('mouseleave', function() {
        document.body.classList.remove('megamenu-active');
    });
});

/* Sticky Header Class
========================================================*/ 
window.addEventListener('scroll', function() {
    if (window.scrollY > 120) {
        document.body.classList.add('stickyHeader');
    } else {
        document.body.classList.remove('stickyHeader');
    }
});

/* Menu Hover
========================================================*/
var Header = document.querySelector('.site-header-wrap'); 
document.querySelectorAll('.mega-menu-item-has-children.mega-menu-flyout').forEach(function(item) {
    var subMenu = item.querySelector('ul.mega-sub-menu');
    var subMenuHeight = subMenu.offsetHeight;
    // Remove the second declaration of Header inside the forEach loop

    item.addEventListener('mouseenter', function() {
        document.querySelector('.NavshoverBg').style.height = (subMenuHeight + Header.offsetHeight) + 'px';
        document.querySelector('.NavshoverBg').style.minHeight = (Header.offsetHeight + 210) + 'px';
    });

    item.addEventListener('mouseleave', function() {
      document.querySelector('.NavshoverBg').style.height = '0px';
      document.querySelector('.NavshoverBg').style.minHeight = '0px';
    });
});

/* Image Parallax
========================================================*/
function ImageAnimation(imgSelector, divSelector, imgTransformY, divtransformY) {
    gsap.utils.toArray(imgSelector).forEach((box) => {
      gsap.set(box, {
        y: imgTransformY,

      });
      gsap.to(box, {
        ease: 'power1.out',
        scrollTrigger: {
          trigger: box,
          markers: false,
          scrub: 3,
          start: "0% 100%",
          end: "100% 50%",
        },
        y: 0,
      });
    });
    gsap.utils.toArray(divSelector).forEach((box) => {
      gsap.set(box, {
        y: divtransformY,
        ease: 'power1.out',
      });
      gsap.to(box, {
        scrollTrigger: {
          trigger: box,
          markers: false,
          scrub: 1,
          start: "0 100%",
          end: "100% 50%"
        },
        ease: 'power1.out',
        y: 0,
      });
    });
  }
  ImageAnimation(".image_cont1 img", ".image_cont1", -200, 100);
  ImageAnimation(".image_cont2 img", ".image_cont2", -200, 50);
  ImageAnimation(".image_cont3 img", ".image_cont3", -200, 0);
  ImageAnimation(".calltoAction__image .image_cont img", ".calltoAction__image .image_cont", 100, 0);
