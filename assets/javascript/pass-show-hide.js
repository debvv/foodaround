const pswrdField = document.querySelector(".form input[type='password']"), 
// querySelector() Document метод querySelector() возвращает первый элемент ( Element ) документа,
// который соответствует указанному селектору или группе селекторов. 
toggleIcon = document.querySelector(".form .field i");

toggleIcon.onclick = () =>{ 
  // Свойство onclick возвращает обработчик события click на текущем элементе.
  if(pswrdField.type === "password"){
    pswrdField.type = "text";
    toggleIcon.classList.add("active"); 
    // add() Этот метод используется для добавления класса к элементу.
  }else{
    pswrdField.type = "password";
    toggleIcon.classList.remove("active"); 
    // remove() Метод используется для удаления класса у элемента.
  }
}
