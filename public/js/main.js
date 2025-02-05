const navbar = document.getElementById('navbar');

    window.addEventListener('scroll', () => {
      if (window.scrollY > 250) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });



// REGISTER VALIDATION

const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const messagePassword = document.getElementById('messagePassword');
const messageUsername = document.getElementById('messageUsername');
const messageEmail = document.getElementById('messageEmail');

function validateUsername() {
  if (username.value.length <= 5) {
    username.classList.remove('valid');
    username.classList.add('invalid');
    messageUsername.innerText = 'Zu kurz';
  } else {
    username.classList.remove('invalid');
    username.classList.add('valid');
    messageUsername.innerText = '';
  }
}

function validateEmail() {
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailPattern.test(email.value)) {
    email.classList.remove('valid');
    email.classList.add('invalid');
    messageEmail.innerText = 'Ungültige Email';
  } else {
    email.classList.remove('invalid');
    email.classList.add('valid');
    messageEmail.innerText = '';
  }
}

function validatePassword() {
  const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
  if (!passwordPattern.test(password.value)) {
    password.classList.remove('valid');
    password.classList.add('invalid');
    messagePassword.innerText = 'Zu schwach';
  } else {
    password.classList.remove('invalid');
    password.classList.add('valid');
    messagePassword.innerText = '';
  }
}

if (username && email && password) {
  username.addEventListener('input', validateUsername);
  email.addEventListener('input', validateEmail);
  password.addEventListener('input', validatePassword);
}

// DELETE ACCOUNT CONFIRM

const deleteAccountBtn = document.getElementById('deleteAccountBtn');

if (deleteAccountBtn) {
  deleteAccountBtn.addEventListener('click', (e) => {
    e.preventDefault();

    const isConfirmed = confirm('Möchtest du deinen Account wirklich löschen?');

    if(isConfirmed) {
      accountDeleteForm.submit();
    }
  })
}
