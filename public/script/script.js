function previewImage() {
  const poster = document.querySelector('#attachment')
  const imagePreview = document.querySelector('#image-preview')
  const posterLabel = document.querySelector('.custom-file-label');

  posterLabel.textContent = poster.files[0].name;

  const imageFile = new FileReader();
  imageFile.readAsDataURL(attachment.files[0])

  imageFile.onload = (e) => imagePreview.src = e.target.result
}