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

function validateUsername() {
  if (username.value.length <= 5) {
    username.classList.remove('valid');
    username.classList.add('invalid');
  } else {
    username.classList.remove('invalid');
    username.classList.add('valid');
  }
}

function validateEmail() {
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailPattern.test(email.value)) {
    email.classList.remove('valid');
    email.classList.add('invalid');
  } else {
    email.classList.remove('invalid');
    email.classList.add('valid');
  }
}

function validatePassword() {
  const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
  if (!passwordPattern.test(password.value)) {
    password.classList.remove('valid');
    password.classList.add('invalid');
  } else {
    password.classList.remove('invalid');
    password.classList.add('valid');
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
