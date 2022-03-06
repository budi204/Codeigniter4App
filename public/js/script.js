const preview = () => {
  const imgPreview = document.querySelector(".img-preview");

  const readFile = new FileReader();
  readFile.readAsDataURL(cover.files[0]); //cover disini name inputan dari form

  readFile.onload = (act) => {
    imgPreview.src = act.target.result;
  };
};
