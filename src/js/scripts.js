
/**
 * GutenDevTheme scripts (footer)
 * This file contains any js scripts you want added to the theme's footer. 
 */

// *********************** START CUSTOM JS *********************************

// // grab element for Headroom
// var headroomElement = document.querySelector("#c-page-header");
// console.log(headroomElement);

// // get height of element for Headroom
// var headerHeight = headroomElement.offsetHeight; 
// console.log(headerHeight);

// // construct an instance of Headroom, passing the element
// var headroom = new Headroom(headroomElement, {
//   "offset": headerHeight,
//   "tolerance": 5,
//   "classes": {
//     "initial": "animate__animated",
//     "pinned": "animate__slideInDown",
//     "unpinned": "animate__slideOutUp"
//   }
// });
// headroom.init();

// *********************** END CUSTOM JS *********************************

// TODO:only fire on timeline page!!
// (function () {
//   // VARIABLES
//   const timeline = document.querySelector(".timeline ol"),
//     elH = document.querySelectorAll(".timeline li > div"),
//     arrows = document.querySelectorAll(".timeline .arrows .arrow"),
//     arrowPrev = document.querySelector(".timeline .arrows .arrow__prev"),
//     arrowNext = document.querySelector(".timeline .arrows .arrow__next"),
//     firstItem = document.querySelector(".timeline li:first-child"),
//     lastItem = document.querySelector(".timeline li:last-child"),
//     xScrolling = 500,
//     disabledClass = "disabled";

//   // START
//   window.addEventListener("load", init);

//   function init() {
//     // setEqualHeights(elH);
//     animateTl(xScrolling, arrows, timeline);
//     setSwipeFn(timeline, arrowPrev, arrowNext);
//     setKeyboardFn(arrowPrev, arrowNext);
//   }

//   // SET EQUAL HEIGHTS
//   function setEqualHeights(el) {
//     let counter = 0;
//     for (let i = 0; i < el.length; i++) {
//       const singleHeight = el[i].offsetHeight;

//       if (counter < singleHeight) {
//         counter = singleHeight;
//       }
//     }

//     for (let i = 0; i < el.length; i++) {
//       el[i].style.height = `${counter}px`; 
      
//     }
//   }


//   // CHECK IF AN ELEMENT IS IN VIEWPORT
//   // http://stackoverflow.com/questions/123999/how-to-tell-if-a-dom-element-is-visible-in-the-current-viewport
//   function isElementInViewport(el) {
//     const rect = el.getBoundingClientRect();
//     return (
//       rect.top >= 0 &&
//       rect.left >= 0 &&
//       rect.bottom <=
//         (window.innerHeight || document.documentElement.clientHeight) &&
//       rect.right <= (window.innerWidth || document.documentElement.clientWidth)
//     );
//   }

//   // SET STATE OF PREV/NEXT ARROWS
//   function setBtnState(el, flag = true) {
//     if (flag) {
//       el.classList.add(disabledClass);
//     } else {
//       if (el.classList.contains(disabledClass)) {
//         el.classList.remove(disabledClass);
//       }
//       el.disabled = false;
//     }
//   }

//   // ANIMATE TIMELINE
//   function animateTl(scrolling, el, tl) {
//     let counter = 0;
//     for (let i = 0; i < el.length; i++) {
//       el[i].addEventListener("click", function () {
//         // if (!arrowPrev.disabled) {
//         //   arrowPrev.disabled = true;
//         // }
//         // if (!arrowNext.disabled) {
//         //   arrowNext.disabled = true;
//         // }
//         const sign = this.classList.contains("arrow__prev") ? "" : "-";
//         if (counter === 0) {
//           tl.style.transform = `translateX(-${scrolling}px)`;
//         } else {
//           const tlStyle = getComputedStyle(tl);
//           // add more browser prefixes if needed here
//           const tlTransform =
//             tlStyle.getPropertyValue("-webkit-transform") ||
//             tlStyle.getPropertyValue("transform");
//           const values =
//             parseInt(tlTransform.split(",")[4]) +
//             parseInt(`${sign}${scrolling}`);
//           tl.style.transform = `translateX(${values}px)`;
//         }

//         setTimeout(() => {
//           isElementInViewport(firstItem)
//             ? setBtnState(arrowPrev)
//             : setBtnState(arrowPrev, false);
//           isElementInViewport(lastItem)
//             ? setBtnState(arrowNext)
//             : setBtnState(arrowNext, false);
//         }, 1100);

//         counter++;
//       });
//     }
//   }

//   // ADD SWIPE SUPPORT FOR TOUCH DEVICES
//   function setSwipeFn(tl, prev, next) {
//     const hammer = new Hammer(tl);
//     hammer.on("swipeleft", () => next.click());
//     hammer.on("swiperight", () => prev.click());
//   }

//   // ADD BASIC KEYBOARD FUNCTIONALITY
//   function setKeyboardFn(prev, next) {
//     document.addEventListener("keydown", (e) => {
//       if (e.which === 37 || e.which === 39) {
//         const timelineOfTop = timeline.offsetTop;
//         const y = window.pageYOffset;
//         if (timelineOfTop !== y) {
//           window.scrollTo(0, timelineOfTop);
//         }
//         if (e.which === 37) {
//           prev.click();
//         } else if (e.which === 39) {
//           next.click();
//         }
//       }
//     });
//   }
// })();

// let smoother = ScrollSmoother.create();
// smoother.effects(".smooth", {speed: 0.9, lag: 0.3});



// *********************** START CUSTOM JQUERY DOC READY SCRIPTS *******************************
jQuery( document ).ready(function( $ ) {


 


  $(".c-header-search, .c-slide-close").click(function(){
    $("#slide-search").slideToggle("fast")
});







  
  // $('.jarallax-contain').jarallax({
  //   speed: 0.8,
  //   imgSize: 'contain',
  // });
  // modal menu init ----------------------------------
  // var modal_menu = jQuery("#c-modal-nav-button").animatedModal({
  //   modalTarget: 'modal-navigation',
  //   animatedIn: 'slideInDown',
  //   animatedOut: 'slideOutUp',
  //   animationDuration: '0.40s',
  //   color: '#dedede',
  //   afterClose: function() {
  //     $( 'body, html' ).css({ 'overflow': '' });
  //   }
  // });

  // // get last and current hash + update on hash change
  // var currentHash = function() {
  //   return location.hash.replace(/^#/, '')
  // }
  // var last_hash
  // var hash = currentHash()
  // $(window).bind('hashchange', function(event) {
  //   last_hash = hash;
  //   hash = currentHash();
  // });

  // enable back/foward to close/open modal --------------------------
  // $("#c-modal-nav-button").on('click', function(){ window.location.href = ensureHash("#menu"); });
  // function ensureHash(newHash) {
  //   if (window.location.hash) {
  //     return window.location.href.substring(0, window.location.href.lastIndexOf(window.location.hash)) + newHash;
  //   }
  //   return window.location.hash + newHash;
  // }
  // // if back button is pressed, close the modal
  // $(window).on('hashchange', function (event) {
  //   if (last_hash == 'menu' && hash == '') {
  //     modal_menu.close();
  //     history.replaceState('', document.title, window.location.pathname);
  //   } // if forward button, open the modal
  //   else if (window.location.hash == "#menu"){
  //     modal_menu.open();
  //   }
  // });

  // // if close button is clicked, clear the #menu hash added above
  // $('.close-modal-navigation').on('click', function (e) {
  //   history.replaceState('', document.title, window.location.pathname);
  // });

  // // close modal menu if esc key is used ------------------------
  // $(document).keyup(function(ev){
  //   if(ev.keyCode == 27 && hash == 'menu') {
  //     window.history.back();
  //   }
  // });

  // $('#mobile-nav').hcOffcanvasNav({
  //   disableAt: 1024,
  //   customToggle: $('.toggle'),
  //   levelTitles: true,
  //   position: 'top',
  //   levelTitleAsBack: true
  // });

  // Magnific as menu popup
  // MENU POPUP
  // $('#c-modal-nav-button').magnificPopup({
  //   type: 'inline',
  //   removalDelay: 700, //delay removal by X to allow out-animation
  //   showCloseBtn: false,
  //   closeOnBgClick: false,
  //   autoFocusLast: false,
  //   fixedContentPos: false, 
  //   fixedContentPos: true,
  //   callbacks: {
  //     beforeOpen: function() {
  //        this.st.mainClass = 'mfp-move-from-side menu-popup';
  //        $('body').addClass('mfp-active');
  //     },
  //     open: function() { 
  //       $('#close-modal, .close-modal-navigation').on('click',function(event){
  //         event.preventDefault();
  //         $.magnificPopup.close(); 
  //       }); 
  //   },
  //   beforeClose: function() {
  //   $('body').removeClass('mfp-active');
  // }
  //   },
  //   midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
  // });

});
// *********************** END CUSTOM JQUERY DOC READY SCRIPTS *********************************
