document.addEventListener('DOMContentLoaded', function () {
  const showPasswordCheckbox = document.getElementById('showPassword');
  const passwordInput = document.getElementById('passwordInput');

  showPasswordCheckbox.addEventListener('change', function () {
      // Toggle the type of the password field
      if (showPasswordCheckbox.checked) {
          passwordInput.type = 'text';
      } else {
          passwordInput.type = 'password';
      }
  });
});