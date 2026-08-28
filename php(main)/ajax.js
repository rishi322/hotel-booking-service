
$(document).ready(function(e) {
  
    // Handle form submission
    $('#insert').submit(function(e) {
 // Prevent the form from submitting normally
        e.preventDefault();
      // Get the form data
      var formData = $(this).serialize();
  
      // Send the form data to the PHP script using Ajax
      $.ajax({
        type: 'POST',
        url: 'add-hotel.php', // Replace with your PHP script URL
        data: formData,
        success: function(response) {
          // Handle the response from the PHP script
         
          console.log(response.status);
          if (response.status == "success"){
            document.getElementById("alt1").innerHTML = `<div class="sticky" role="alert">
            Hotel Added Successfully</div>`;
          } else {
            document.getElementById("alt1").innerHTML = `<div class="alert alert-danger" role="alert">
           Failed to Add Hotel! Try Again... </div>`;
          }
        // Log the response to the browser console
        }
      });
    });
  });