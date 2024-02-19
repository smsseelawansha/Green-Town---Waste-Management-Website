// Function to validate the complaint form
function validateForm() {
    // Get the form input values
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var subject = document.getElementById('subject').value;
    var message = document.getElementById('message').value;
  
    // Check if any of the required fields are empty
    if (name === '' || email === '' || subject === '' || message === '') {
      alert('Please fill in all the required fields.');
      return false;
    }
  
    // Check if the email is valid
    var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!email.match(emailRegex)) {
      alert('Please enter a valid email address.');
      return false;
    }
  
    // If all validations pass, the form is valid
    return true;
  }
  
  // Function to handle the form submission event
  function submitForm(event) {
    event.preventDefault(); // Prevent the default form submission
  
    // Validate the form
    if (!validateForm()) {
      return;
    }
  
    // Get the form data
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var subject = document.getElementById('subject').value;
    var message = document.getElementById('message').value;
  
    // Create an object with the complaint data
    var complaintData = {
      name: name,
      email: email,
      subject: subject,
      message: message
    };
  
    // Send the complaint data to the server (replace 'submit_complaint.php' with your server-side script URL)
    fetch('submit_complaint.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(complaintData)
    })
    .then(function(response) {
      // Handle the server response
      if (response.ok) {
        alert('Complaint submitted successfully!');
        // Reset the form after successful submission
        document.getElementById('name').value = '';
        document.getElementById('email').value = '';
        document.getElementById('subject').value = '';
        document.getElementById('message').value = '';
      } else {
        alert('An error occurred while submitting the complaint. Please try again later.');
      }
    })
    .catch(function(error) {
      console.log('Error:', error);
      alert('An error occurred while submitting the complaint. Please try again later.');
    });
  }
  
  // Add an event listener to the form submit event
  document.getElementById('complaint-form').addEventListener('submit', submitForm);
  