IDbook = extractParamsFromUrl("id");

if (!IDbook) {
  displayError("Book not found");
}

fetch(urlAPI + "single.php?id=" + IDbook)
  .then((reponse) => reponse.json())
  .then((response) => putValueInput(response[0]));

const putValueInput = (book) => {
  const author_input = document.getElementById("author");
  author_input.value = book.author;

  const title_input = document.getElementById("title");
  title_input.value = book.title;
};

const editBook_form = document.getElementById("editBook");

editBook_form.addEventListener("submit", function (event) {
  event.preventDefault();
  const dataForm = getValue();
  dataForm.idBook = IDbook;
  console.log(dataForm);
  postData(dataForm, "update.php");
  //postData(dataForm);
});
