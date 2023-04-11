// update success

const form = document.querySelector('form');
form.addEventListener('submit', (e) => {
  e.preventDefault();
  const xhr = new XMLHttpRequest();
  xhr.open('POST', form.action, true);
  xhr.onload = () => {
    if (xhr.status === 200) {
      alert('Update successful!');
      location.reload();
    } else {
      alert('Update failed. Please try again.');
    }
  };
  xhr.send(new FormData(form));
});