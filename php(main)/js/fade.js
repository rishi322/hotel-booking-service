// Function to check if an element is in the viewport
function isElementInViewport(element) {
    var rect = element.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight ) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
      
    );
  }

  // Function to handle scroll event
  function handleScroll() {
    var fadeElements = document.getElementsByClassName('fade-scroll');
    
    // Loop through each fade element
    for (var i = 0; i < fadeElements.length; i++) {
      var element = fadeElements[i];
      
      // Check if the element is in the viewport
      if (isElementInViewport(element)) {
        
        $('.fade-scroll').css({
            'opacity': 1,
            'transform': 'translateX(0)'
          });
      }
    }
  }

 
  
  
  // Add scroll event listener
  window.addEventListener('scroll', handleScroll);
  