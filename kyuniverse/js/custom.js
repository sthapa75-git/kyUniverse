// JavaScript: Session Management

// Wait for the DOM to fully load
document.addEventListener('DOMContentLoaded', () => {
    // Select the authentication link in the header
    const authLink = document.getElementById('auth-link');
  
    // Check if the user is logged in by looking for a stored username
    const isLoggedIn = localStorage.getItem('username');
  
    if (isLoggedIn) {
      // If logged in, show "Sign Out" link
      authLink.innerHTML = '<i class="fa fa-sign-out" aria-hidden="true"></i> Sign Out';
      authLink.href = '#'; // Prevent default navigation
      authLink.addEventListener('click', () => {
        // Clear the username from localStorage to log the user out
        localStorage.removeItem('username');
        alert('You have signed out.');
        window.location.reload(); // Reload the page to reflect the logged-out state
      });
    } else {
      // If not logged in, show "Sign In" link
      authLink.innerHTML = '<i class="fa fa-sign-in" aria-hidden="true"></i> Sign In';
      authLink.href = 'signin.html'; // Redirect to the login page
    }
  });
  